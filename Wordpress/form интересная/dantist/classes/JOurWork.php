<?
class JOurWork extends JRender{

    
    const POST_TYPE = "doctor_works";

    function __construct($params = []){
        parent::__construct($params);
    }



    function getWorks(int $postId = 0,  $params = []){

        $worksList = new JPost();
        $worksList->setParam("orderby", "menu_order post_parent");
        $worksList->setParam("order", "ASC");
        $worksList->setParam("post_status", "publish");
        if(!empty($params["post__in"]))  
            $worksList->setParam("post__in", $params["post__in"]);
            $worksList->setParam("orderby", "post__in");
            $worksList->setParam("order", "ASC");
        if(!empty($params["posts_per_page"])) 
            $worksList->setParam("posts_per_page", $params["posts_per_page"]);
        else
            $worksList->setParam("posts_per_page", "-1");
        $worksList->setParam("post_type", self::POST_TYPE);

        $worksList->setProperty("base-info");
        if($postId > 0) $worksList->setParam("post_parent", $postId);
        $worksList->setQuery();
        $worksList->all();

        return $worksList->formatPosts(($postId > 0));

    }

}