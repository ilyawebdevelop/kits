<?
class JArticle extends JRender{

    
    const POST_TYPE = "articles";

    function __construct($params = []){
        parent::__construct($params);
        $this->maxCount = isset($params["count"])?$params["count"]:10;
        $this->page = isset($params["page"])?$params["page"]:1;
    }


    public static function ajaxShowMore(){
        if(isset($_POST["is-show-more"]) && $_POST["is-show-more"] == 'articles'):

            $content = ob_get_contents();
	        ob_end_clean();

            list(, $itemsContainer) = explode('<!-- ajax-articles-items -->', $content);
            list(, $paginationContainer) = explode('<!-- ajax-articles-pagination -->', $content);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                "items" => $itemsContainer,
                "pagination" => $paginationContainer
            ]);

            die();
        endif;
    }


    function getArticles(int $postId = 0, $params = []){

        $articleList = new JPost();
        $articleList->setParam("orderby", "id");
        $articleList->setParam("order", "desc");
        $articleList->setParam("post_status", "publish");
        if(!empty($params["post__in"]))  
            $articleList->setParam("post__in", $params["post__in"]);

        if(!empty($params["post__not_in"]))  
            $articleList->setParam("post__not_in", $params["post__not_in"]);

        if(!empty($params["posts_per_page"])) 
            $articleList->setParam("posts_per_page", $params["posts_per_page"]);
        else
            $articleList->setParam("posts_per_page", $this->maxCount);

        $articleList->setParam("paged", $this->page);
        $articleList->setParam("post_type", self::POST_TYPE);
        $articleList->setProperty("base-info");
        if($postId > 0) $articleList->setParam("post_parent", $postId);
        $articleList->setQuery();
        $articleList->all();
        $articleList->pagination();
        return $articleList->formatPosts(($postId > 0));

    }

    function getArticle(int $postId){

        $article = new JPost();
        $article->setParam("p", $postId);
        $article->setParam("post_status", "publish");
        $article->setParam("posts_per_page", "1");
        $article->setParam("post_type", self::POST_TYPE);
        $article->setProperty("base-info");
        $article->setProperty("content");
        $article->setQuery();
        $a_Articles = $article->first();
        $a_Articles = $article::formatPost($a_Articles);
        $a_Articles["props"] = $article->getProperties($postId);
        return $a_Articles;
    }

    function renderArticle(){
        global $post;

        $articles = $this->getArticles(0, [
            "posts_per_page" => 6,
            "post__not_in" => [$post->ID]
        ]);
        $article = $this->getArticle($post->ID);

        $this->renderBreadCrumbs();
        JRender::viewInclude("top-blog", [
            "title" => $article["title"],
            "base-info" => $article["props"]["base-info"],
        ]);
        JRender::viewInclude("detail-blog", [
            "title" => $article["title"],
            "content" => $article["props"]["content"],
            "author-caption" => "Автор статьи:",
        ]);
        JRender::viewInclude("slider-blog", [
            "items" => $articles,
            "title" => "вы также можете почитать:"
        ]);
        JRender::viewInstagram();
    }

   

}
