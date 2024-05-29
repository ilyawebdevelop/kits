<?
class JRender extends JPost{

    public $typeHeader = "";
    public $typeFooter = "";
    public $content = "";

    function __construct($params = []){

        $this->typeHeader = isset($params["typeHeader"]) ? $params["typeHeader"]: "";
        $this->typeFooter = isset($params["typeFooter"]) ? $params["typeFooter"]: "";

    }

    function getHeader(){
        ob_start();
        get_header($this->typeHeader);
    }

    function getFooter(){
        get_footer($this->typeFooter);
        $this->content = ob_get_contents();
        ob_end_clean();
        $this->replacePageShortCode();
    }

    function replacePageShortCode(){

        $shortCodes = get_field("SHORT_CODES", "option");

        if(isset($shortCodes) && !empty($shortCodes)):

            $healthy = array();
            $yummy   = array();
    
            foreach($shortCodes as $shortCode):
                $healthy[] = "#" . $shortCode["CODE"] . "#";
                $yummy[] = $shortCode["VALUE"];
            endforeach;
    
            echo str_replace($healthy, $yummy, $this->content);

        else:
            echo $this->content;
        endif;

    }

    function renderBreadCrumbs(){
        $jb = new JBreadcrumbs;
        $arBread = $jb->get_crumbs( "/", [], []);
        get_template_part( 'partials/breadcrumbs', "", $arBread);
    }

    public static function getContentOption($name){
        return get_field($name, 'option');
    }

    public static function getDataReviews($filter = []){

        $params = [
            "count" => "42",
            "page" => (get_query_var('paged')) ? get_query_var('paged') : 1,
        ];

        $JCacheData = new JCacheData(md5(serialize(["reviews", $params])));

        $JCacheData->setCacheOff();

        if($getDataFromCache = $JCacheData->initCacheData()):
            return $JCacheData->getCacheData();
        endif; 

        $reviews = new JReview($params);
        $reviews = $reviews->getReviews(0, $filter);

        $JCacheData->updateCacheData($reviews);

        return $reviews;
    }

    public static function getDataPromo(){

        $params = [
            "count" => 10,
            "page" => (get_query_var('paged')) ? get_query_var('paged') : 1,
        ];

        $JCacheData = new JCacheData(md5(serialize(["promo", $params])));

       $JCacheData->setCacheOff();

        if($getDataFromCache = $JCacheData->initCacheData()):
            return $JCacheData->getCacheData();
        endif; 

        $objPromo = new JStock($params);
        $promo = $objPromo->getPromotions();

        $JCacheData->updateCacheData($promo);

        return $promo;
    }

    public static function getDataArticles(){

        $params = [
            "count" => 10,
            "page" => (get_query_var('paged')) ? get_query_var('paged') : 1,
        ];

        $JCacheData = new JCacheData(md5(serialize(["articles", $params])));

       $JCacheData->setCacheOff();

        if($getDataFromCache = $JCacheData->initCacheData()):
            return $JCacheData->getCacheData();
        endif; 

        $objArticles = new JArticle($params);
        $articles = $objArticles->getArticles();

        $JCacheData->updateCacheData($articles);

        return $articles;
    }

    public static function getDataRecommendations(){

        $params = [
            "count" => 10,
            "page" => (get_query_var('paged')) ? get_query_var('paged') : 1,
        ];

        $JCacheData = new JCacheData(md5(serialize(["recommendations", $params])));

       $JCacheData->setCacheOff();

        if($getDataFromCache = $JCacheData->initCacheData()):
            return $JCacheData->getCacheData();
        endif; 

        $objRecommendations = new JRecommendation($params);
        $recommendations = $objRecommendations->getRecommendations();

        $JCacheData->updateCacheData($recommendations);

        return $recommendations;
    }

    public static function getDataInstagramPosts(){
        $settings = get_field("settings", "options");

        $JCacheData = new JCacheData($settings["token-instagram"]);

        //$JCacheData->setCacheOff();

        if($getDataFromCache = $JCacheData->initCacheData()):
            return $JCacheData->getCacheData();
        endif;
      

      
        $objInst = new JInstargram($settings["token-instagram"]);
        $posts = $objInst->getInstagramPosts();

		$JCacheData->updateCacheData($posts);

        return $posts;


    }

    public static function viewInstagram(){
        $args["layout"] = "instagram";
        $args["posts"] = self::getDataInstagramPosts();
        self::setPart($args);
    }

    public static function prepareArray($array){
        switch($array["layout"]):
            case "main-screen-reverse":
                global $post;
                $array["base-info"] = get_field("base-info", $post->ID);
                break;
            case "reviews":
                $filter = [];
                if(!empty($array["linking-reviews"])):
                    $filter["post__in"] = $array["linking-reviews"];
                endif;

                $array["items"] = self::getDataReviews($filter);
             
                break;
            case "list-promo":
                $array["items"] = self::getDataPromo();
                break;
            case "list-articles":
                $array["items"] = self::getDataArticles();
                break;
            case "list-recommendations":
                $array["items"] = self::getDataRecommendations();
                break;
            case "services":
                $objServices = new JService;
                $services = $objServices->getServices(0, [
                    "post__in" => $array["linking-services"]?:false,
                    "posts_per_page" => 10,
                    "only-first-lvl" => (isset($array["out-type"]) && $array["out-type"] == "expаnded")
                ]);
                $array["services"] = $services;
                break;

            case "doctors":

                $objDoctor = new JDoctor;
                $doctors = $objDoctor->getDoctors(0, [
                    "post__in" => $array["linking-doctors"]?:false,
                    "posts_per_page" => 24
                ]);
                $array["doctors"] = $doctors;
                break;

            case "stock":

                $objStock = new JStock;
                $promotions = $objStock->getPromotions(0, [
                    "post__in" => $array["linking-stock"]?:false,
                    "posts_per_page" => 6
                ]);
                $array["promotions"] = $promotions;
                break;
            case "instagram":
                $array["posts"] = self::getDataInstagramPosts();
                break;

            case "works":

                $objOurwork = new JOurWork;
                $works = $objOurwork->getWorks(0, [
                   "post__in" => $array["linking-works"]?:false,
                   // "posts_per_page" => 6
                ]);
                $array["works"] = $works;
                break;

            case "ratings":
                $array['items'] = JReview::getReviewsTaxes(["include" => [5,6,8,7], "get" => "all"]);
                break;
            case "link-prices":
                $objPrice = new JPrice;
                $prices = $objPrice->getPrices(0, [
                    "post__in" => $array["shoice-price"]?:false,
                    "posts_per_page" => 1
                 ]);

                $array["p"] = is_array($prices)? reset($prices):[] ;
                break;

            case "tabs-price":
                $objPrice = new JPrice;
                $prices = $objPrice->getPrices();
                $array["items"] = $prices;
                break;
            case "advantages":
            case "implants_systems":
            // case "logos":
            case "education":
                $array = self::getContentOption($array["layout"]);
                break;
            // case "map":
            // case "contacts":
            //     $array = self::infoCompany();
            //     break;
        endswitch;
 
        return $array;
    }

    public static function setPart($args){
        $layout = $args["layout"];
        $args = self::prepareArray($args);

        $path = "constructor/" . $layout;
        get_template_part($path, null, $args);
    }
    

    public static function viewInclude($template, $args = []){
        $path = "include/" . $template;
        get_template_part($path, null, $args);
    }
    

    public static function viewServicesTopMenu(){
        $objServices = new JService;
        $services = $objServices->getServices(0, []);
        $args["services"] = $services;
        self::viewInclude("services-top-menu", $args);
    }

    public static function viewServicesBottomMenu(){
        $objServices = new JService;
        $services = $objServices->getServices(0, []);
        $args["services"] = $services;
        self::viewInclude("services-bottom-menu", $args);
    }


    public static function viewSectionMenu(){
        $pagesMenu = self::getContentOption("pages-menu");
        self::viewInclude("section-menu", $pagesMenu);
    }

    public static function viewSectionBottomMenu(){
        $pagesMenu = self::getContentOption("pages-menu");
        $pagesMenu["items"] = array_chunk($pagesMenu["items"], 6);
        self::viewInclude("section-bottom-menu", $pagesMenu);
    }

    public static function viewTopMenu(){
        $pagesMenu = self::getContentOption("pages-menu");
        self::viewInclude("top-menu", $pagesMenu);
    }


}
