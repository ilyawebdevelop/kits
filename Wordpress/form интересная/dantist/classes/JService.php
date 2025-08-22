<?
class JService extends JRender{

    
    const POST_TYPE = "services";

    function __construct($params = []){
        parent::__construct($params);
    }

    function getServices(int $postId = 0, $params = []){

        $serviceList = new JPost();
        $serviceList->setParam("orderby", "menu_order post_parent");
        $serviceList->setParam("order", "ASC");
        $serviceList->setParam("post_status", "publish");
        $serviceList->setParam("post_type", self::POST_TYPE);

        // 
        if(!empty($params["post__in"]))  
            $serviceList->setParam("post__in", $params["post__in"]);
        if(!empty($params["posts_per_page"])) 
            $serviceList->setParam("posts_per_page", $params["posts_per_page"]);
        else
            $serviceList->setParam("posts_per_page", "-1");

        $serviceList->setProperty("info-service");
        if($postId > 0) $serviceList->setParam("post_parent", $postId);
        $serviceList->setQuery();
        $serviceList->all();

        if(!empty($params["only-first-lvl"]) && $params["only-first-lvl"])
            return $serviceList->formatPosts($params["only-first-lvl"]);

        return $serviceList->formatPosts(($postId > 0));

    }

    function getService(int $postId){

        $service = new JPost();
        $service->setParam("p", $postId);
        $service->setParam("post_status", "publish");
        $service->setParam("posts_per_page", "1");
        $service->setParam("post_type", self::POST_TYPE);
        $service->setProperty("info-service");
        $service->setQuery();
        $a_Service = $service->first();
        $a_Service = $service->formatPosts(true);
       // $a_Service["children_post"] = $this->getServices($postId);

        return $a_Service?reset($a_Service):[];
    }

    function render(){
        global $post;

        $services =  $this->getServices();
        $baseInfo = get_field("base-info", $post->ID);
        $promo = [];
        if(!empty($baseInfo["stock"])):
            $objPromo = new JStock();
            $promo = $objPromo->getPromotions(0, [
                "post__in" => $baseInfo["stock"]
            ]);
        endif;
        $this->renderBreadCrumbs();

        JRender::viewInclude("service-list", [
            "services" => $services,
            "base-info" => $baseInfo,
            "stock" => $promo
        ]);

        JRender::viewInstagram();
    }


    function renderDetail(){
        global $post;
        $this->renderBreadCrumbs();
        $serv = $this->getService($post->ID);

        
        // echo "<pre>";
        // print_r($serv);
        // echo "</pre>";

    }



}