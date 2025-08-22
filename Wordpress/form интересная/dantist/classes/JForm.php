<? 
class JForm{

    public static function formId(){
        return "form-" . md5(serialize(rand(1, 1000)));
    }

    public static function fieldsForm(){
        return $_REQUEST["fields"]?:[];   
    }

    public static function checkFields($fields){

        $fieldsError = [];

        foreach($fields as $nameField => $ar_field):
            if(
                $ar_field["required"] == true && 
                (
                    is_array($ar_field["value"])
                        ? count($ar_field["value"]) < 1
                        : (int)mb_strlen($ar_field["value"]) < 2
                )
            )  $fieldsError[$nameField] = "Поле \"" . $ar_field["name"] . "\" слишком короткое";
        endforeach;

        return $fieldsError;

    }

    public static function shapingBodyLetter($fields){
        $mess = "
        <html>
            <head>
            <title>Новое письмо из формы обратной связи</title>
            </head>
            <body>
                <p style=\"font-size: 22px;\"><b>Письмо из формы обратной связи</b></p>
                <hr style=\"width: 455px;margin-left: 0;\">
                <table>
        ";

        $page = false;
        foreach($fields as $field_name => $ar_field) {
            if ($field_name == 'page') {
                if (is_array($ar_field["value"]))
                    $page = htmlspecialchars(implode(', ', $ar_field["value"]));
                else
                    $page = htmlspecialchars($ar_field["value"]);
            }
        }

        if ($page) {
            $parts = parse_url($page);
            parse_str($parts['query'], $query);

            $source = ['name' => 'Источник заявки', 'value' => 'SEO'];
            $source_queries = get_field('query_vars', 'options');
            if ($source_queries) {
                foreach($source_queries as $item) {
                    if (isset($query[$item['name']]) && $query[$item['name']] == $item['value']) {
                        $source['value'] = $item['title'];
                    }
                }
            }

            $fields = ['source' => $source] + $fields;
        }

        foreach($fields as $field_name => $ar_field):
            $mess .= " 
            <tr>
                <th style=\"width: 200px; font-weight: 400;\" align=\"left\">" . htmlspecialchars($ar_field["name"]) . ": </th>
                <th align=\"left\">" . htmlspecialchars((is_array($ar_field["value"]) ? implode(', ', $ar_field["value"]) : $ar_field["value"])) . "</th>
            </tr>\n";
        endforeach;

        $mess .= "
                </table>
            </body>
        </html>
        ";

        return $mess;
    }

    public static function sendMail($letter, $subject = ""){
        $settings   = get_field("settings", "options");

        $to         = $settings["send_email"];
        $sendEmails = $settings["send_emails"];

        if (!empty($_POST['mailto'])) {
            $to = $_POST['mailto'];
        }

		$bcc = "";
		if(!empty($sendEmails)):
			$mails = [];
			foreach($sendEmails as $mailLetters):
				$mails[] = $mailLetters["email"];
			endforeach;
			$bcc = implode(", ", $mails);
		endif;

		$subject = $subject?: 'Заявка из формы обратной связи';

		$headers = "Content-type: text/html; charset = utf-8\r\n";
		$headers .= "From: mail@". $_SERVER["SERVER_NAME"] . "\r\n";
		$headers .= "Reply-To: $to" . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
		$headers .= "Bcc: $bcc\r\n";

        return mail($to, $subject, $letter, $headers);
    }

    public static function insertPostMail($letter, $subject = ""){
        date_default_timezone_set("Europe/Moscow");
        $subject = $subject?: 'Заявка из формы обратной связи';

        $post_data = array(
			'post_title'    => wp_strip_all_tags( $subject . " / " . date("d.m.y H:i", time())),
			'post_content'  => $letter,
			'post_author'   => 1,
			'post_type'     => 'message_mail',
		);

		return wp_insert_post( $post_data );
    }

    public static function send(){


        $result = [
            "error" => false,
            "errors" => [],
            "success" => true,
            "original-request" => $_REQUEST,
            "fields" => self::fieldsForm()
        ];

        if (!empty($_REQUEST['recaptcha_token'])) {
            $data = array('secret' => get_field('recaptcha_secret_key', 'options'), 'response' => $_REQUEST['recaptcha_token']);

            $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $result['recaptcha'] = json_decode(curl_exec($ch));
            curl_close($ch);
        }

        if (get_field('recaptcha_secret_key', 'options') && empty($_REQUEST['recaptcha_token'])) {
            $result["success"] = false;
            $result["recaptcha"] = false;
        }

        if($errorFields = self::checkFields($result["fields"])):
            $result["error"] = true;
            $result["success"] = false;
            $result["errors"] = $errorFields;
        endif;

        if($result["success"]):

            $subject = "";
            if( $result["original-request"]["type"] == "review")
                $subject = "Новый отзыв на сайте";
            $letter = self::shapingBodyLetter($result["fields"]);
            self::sendMail($letter, $subject);
            self::insertPostMail($letter, $subject);
        endif;

        echo json_encode($result);
    }

    public static function getForm(){
        $result = [
            "error" => false,
            "errors" => [],
            "success" => true,
            "original-request" => $_REQUEST
        ];

        ob_start();
        self::form($result["original-request"]["template"]?:"modal", $result["original-request"]);
        $result["html"] = ob_get_contents();
        ob_end_clean();

        echo json_encode($result);
    }

    public static function form($name, $args){

        $args["form_id"] = self::formId();
        //$args["page"] = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        self::getTemplateForm($name, $args);

    }

    public static function getTemplateForm($template, $args){
        $path = "form/" . $template;
        get_template_part($path, null, $args);
    }
}
