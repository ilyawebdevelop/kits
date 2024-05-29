<?
class JClinic{
    private $postType = "clinics";
    private static $instances = [];
    private $clinicData = [];
    private $clinics = [];
    private $clinicId = 0;

    protected function __construct() { }


    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a JClinic.");
    }


    public static function getInstance(): JClinic
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function setClinicId($clinicId = 0){
        return $this->clinicId = $clinicId;
    }

    public function getClinicId(){
        return $this->clinicId;
    }

    public function setClinic($clinicData = []){
        return $this->clinicData = $clinicData;
    }

    public function setClinics($clinics = []){
        return $this->clinics = $clinics;
    }

    public function getClinics(){
        return $this->clinics;
    }

    public function getClinic(){
        return $this->clinicData;
    }

    public function init(){

        $this->checkClinicId();
        $this->choiceClinic();
  
    }

    private function checkClinicId(){

        if(!empty($_COOKIE["clinikId"]))
            $this->setClinicId((int)$_COOKIE["clinikId"]);

        if(!empty($_GET["chioce-clinik"]) && (int)$_GET["chioce-clinik"] > 0):
            $this->setClinicId((int)$_GET["chioce-clinik"]);
            setcookie("clinikId", (int)$_GET["chioce-clinik"], time()+121600, "/", $_SERVER["SERVER_NAME"]);
        endif;
    }

    private function getAllClinicsDb(){
        $objPost = new JPost();
        $objPost->setParam("orderby", "id");
        $objPost->setParam("order", "desc");
        $objPost->setParam("post_status", "publish");
        $objPost->setParam("post_type", $this->postType);

        $objPost->setProperty("is-main");
        $objPost->setProperty("base-info");
        $objPost->setProperty("phones");
        $objPost->setProperty("contacts");
        $objPost->setQuery();
        $objPost->all();

        return $objPost->formatPosts(true);
    }

    private function choiceClinic(){

        $clinics = $this->getAllClinicsDb();

        $this->setClinics($clinics);

        if((int)$this->getClinicId() > 0 && isset($clinics[$this->getClinicId()])) 
            $this->setClinic($clinics[$this->getClinicId()]);

        if(empty($this->getClinic())):
            foreach($clinics as $clinic):
                if(!!$clinic["props"]["is-main"])
                    $this->setClinic($clinic);
            endforeach;
        endif;


        if(empty($this->getClinic()))
            $this->setClinic(reset($clinics));

        if(!empty($this->getClinic()))
            $this->setClinicId($this->getClinic()["id"]);


    }

}