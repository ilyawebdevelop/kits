<?
class JReview extends JRender{


    const POST_TYPE = "reviews";

    function __construct($params = []){
        parent::__construct($params);
        $this->maxCount = isset($params["count"])?$params["count"]:10;
        $this->page = isset($params["page"])?$params["page"]:1;
    }


    public static function ajaxShowMore(){
        if(isset($_POST["is-show-more"]) && $_POST["is-show-more"] == 'reviews'):

            $content = ob_get_contents();
	        ob_end_clean();

            list(, $itemsContainer) = explode('<!-- ajax-review-items -->', $content);
            list(, $paginationContainer) = explode('<!-- ajax-review-pagination -->', $content);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                "items" => $itemsContainer,
                "pagination" => $paginationContainer
            ]);

            die();
        endif;
    }

    public static function getTax($postId){
        $objTaxes = get_the_terms($postId, 'type_reviews');
        if(empty($objTaxes)) return [];
        $taxes = [];

        foreach($objTaxes as $tax) $taxes[] = [
            "id" => $tax->term_id,
            "name" => $tax->name,
        ];

        $tax = reset($taxes);
        $tax["icon"] = get_field("icon", "category_" . $tax["id"]);

        return $tax;
    }

    public static function getReviewsTaxes($params = []){
        $objPost = new JPost;

        $params["taxonomy"] = ["type_reviews"];
        $taxes = $objPost->getCategories($params);

        if(empty($taxes)) return false;
        $tmpTaxes = [];
        foreach($taxes as $tax):
            $tax["static_count"] = get_field("static-count", "category_" . $tax["id"]);
            $tax["rating"] = get_field("base-rating", "category_" . $tax["id"]);
            $tax["icon"] = get_field("icon", "category_" . $tax["id"]);
            $tax["link"] = get_field("link", "category_" . $tax["id"]);
            $tmpTaxes[] = $tax;
        endforeach;

        return $tmpTaxes;
    }

    function getReviews(int $postId = 0, $params = []){

        $reviewList = new JPost();
        $reviewList->setParam("orderby", "post__in");
        $reviewList->setParam("order", "asc");
        $reviewList->setParam("post_status", "publish");


        if(!empty($params["post__in"]))
            $reviewList->setParam("post__in", $params["post__in"]);

        if(!empty($params["posts_per_page"]))
            $reviewList->setParam("posts_per_page", $params["posts_per_page"]);
        else
            $reviewList->setParam("posts_per_page", $this->maxCount);

        $reviewList->setParam("paged", $this->page);
        $reviewList->setParam("post_type", self::POST_TYPE);

        $reviewList->setProperty("IMAGE");
        $reviewList->setProperty("RATING");
        $reviewList->setProperty("link-youtube");
        $reviewList->setProperty("TEXT");
        $reviewList->setProperty("date");

        if($postId > 0) $reviewList->setParam("post_parent", $postId);
        $reviewList->setQuery();
        $reviewList->all();
        $reviewList->pagination();
        return $reviewList->formatPosts(($postId > 0));

    }

    function getModalReview($id){

        $reviews = $this->getReviews(0, ["post__in" => [$id], "posts_per_page" => 1]);
        $review = is_array($reviews) ? reset($reviews): [];

        if(empty($review)) return false;

        $review["tax"] = $this->getTax($id);

        return $review;
    }


    function getReview(int $postId){

        $review = new JPost();
        $review->setParam("p", $postId);
        $review->setParam("post_status", "publish");
        $review->setParam("posts_per_page", "1");
        $review->setParam("post_type", self::POST_TYPE);
        $review->setQuery();
        $a_Reviews = $review->first();
        $a_Reviews = $review::formatPost($a_Reviews);
       // $a_Reviews["children_post"] = $this->getReviews($postId);

        return $a_Reviews;
    }

}
