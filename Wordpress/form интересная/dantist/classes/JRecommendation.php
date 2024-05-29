<?
class JRecommendation extends JRender{

    
    const POST_TYPE = "recommendations";

    function __construct($params = []){
        parent::__construct($params);
        $this->maxCount = isset($params["count"])?$params["count"]:10;
        $this->page = isset($params["page"])?$params["page"]:1;
    }


    public static function ajaxShowMore(){
        if(isset($_POST["is-show-more"]) && $_POST["is-show-more"] == 'recommendations'):
            $content = ob_get_contents();
	        ob_end_clean();

            list(, $itemsContainer) = explode('<!-- ajax-recommendations-items -->', $content);
            list(, $paginationContainer) = explode('<!-- ajax-recommendations-pagination -->', $content);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                "items" => $itemsContainer,
                "pagination" => $paginationContainer
            ]);

            die();
        endif;
    }


    function getRecommendations(int $postId = 0, $params = []){
        $recommendationList = new JPost();
        $recommendationList->setParam("orderby", "menu_order");
        $recommendationList->setParam("order", "asc");
        $recommendationList->setParam("post_status", "publish");
        
        if(!empty($params["post__in"]))  
            $recommendationList->setParam("post__in", $params["post__in"]);

        if(!empty($params["post__not_in"]))  
            $recommendationList->setParam("post__not_in", $params["post__not_in"]);

        if(!empty($params["posts_per_page"])) 
            $recommendationList->setParam("posts_per_page", $params["posts_per_page"]);
        else
            $recommendationList->setParam("posts_per_page", $this->maxCount);

        $recommendationList->setParam("paged", $this->page);
        $recommendationList->setParam("post_type", self::POST_TYPE);
        $recommendationList->setProperty("base-info");
        if($postId > 0) $recommendationList->setParam("post_parent", $postId);
        $recommendationList->setQuery();
        $recommendationList->all();
        $recommendationList->pagination();
        return $recommendationList->formatPosts(($postId > 0));

    }

    function getRecommendation(int $postId){

        $recommendation = new JPost();
        $recommendation->setParam("p", $postId);
        $recommendation->setParam("post_status", "publish");
        $recommendation->setParam("posts_per_page", "1");
        $recommendation->setParam("post_type", self::POST_TYPE);
        $recommendation->setProperty("base-info");
        $recommendation->setProperty("content");
        $recommendation->setQuery();
        $a_Recommendations = $recommendation->first();
        $a_Recommendations = $recommendation::formatPost($a_Recommendations);
        $a_Recommendations["props"] = $recommendation->getProperties($postId);
        return $a_Recommendations;
    }

    function renderRecommendation(){
        global $post;

        $recommendations = $this->getRecommendations(0, [
            "posts_per_page" => 6,
            "post__not_in" => [$post->ID]
        ]);
        $recommendation = $this->getRecommendation($post->ID);

        $this->renderBreadCrumbs();
        JRender::viewInclude("top-blog", [
            "title" => $recommendation["title"],
            "base-info" => $recommendation["props"]["base-info"],
        ]);
        JRender::viewInclude("detail-blog", [
            "title" => $recommendation["title"],
            "content" => $recommendation["props"]["content"],
            "author-caption" => "Автор рекомендации:",
        ]);
        JRender::viewInclude("slider-blog", [
            "items" => $recommendations,
            "title" => "еще рекомендации:"
        ]);
        JRender::viewInstagram();
    }
}
