<?
class JStock extends JRender{

    
    const POST_TYPE = "stock";

    function __construct($params = []){
        parent::__construct($params);
        $this->maxCount = isset($params["count"])?$params["count"]:10;
        $this->page = isset($params["page"])?$params["page"]:1;
    }

    public static function ajaxShowMore(){
        if(isset($_POST["is-show-more"]) && $_POST["is-show-more"] == 'promotions'):

            $content = ob_get_contents();
	        ob_end_clean();

            list(, $itemsContainer) = explode('<!-- ajax-stock-items -->', $content);
            list(, $paginationContainer) = explode('<!-- ajax-stock-pagination -->', $content);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                "items" => $itemsContainer,
                "pagination" => $paginationContainer
            ]);

            die();
        endif;
    }

    function getPromotions(int $postId = 0, $params = []){

        $stockList = new JPost();
        $stockList->setParam("orderby", "id");
        $stockList->setParam("order", "desc");
        $stockList->setParam("post_status", "publish");
        $stockList->setParam("post_type", self::POST_TYPE);

        if(!empty($params["post__in"]))  
            $stockList->setParam("post__in", $params["post__in"]);

        if(!empty($params["posts_per_page"])) 
            $stockList->setParam("posts_per_page", $params["posts_per_page"]);
        else
            $stockList->setParam("posts_per_page", $this->maxCount);

        $stockList->setParam("paged", $this->page);

        $stockList->setProperty("base-info");
        if($postId > 0) $stockList->setParam("post_parent", $postId);
        $stockList->setQuery();
        $stockList->all();
        $stockList->pagination();
        return $stockList->formatPosts(($postId > 0));

    }


    function renderDetailStock(){
        global $post;
        $this->renderBreadCrumbs();
        $serv = $this->getStock($post->ID);

        
        echo "<pre>";
        print_r($serv);
        echo "</pre>";
    }

    function getStock(int $postId){

        $stock = new JPost();
        $stock->setParam("p", $postId);
        $stock->setParam("post_status", "publish");
        $stock->setParam("posts_per_page", "1");
        $stock->setParam("post_type", self::POST_TYPE);
        $stock->setQuery();
        $a_Stock = $stock->first();
        $a_Stock = $stock::formatPost($a_Stock);
        return $a_Stock;
    }

}