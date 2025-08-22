<?
class JPrice extends JRender{

    
    const POST_TYPE = "prices";

    function __construct($params = []){
        parent::__construct($params);
    }

    function getPrices(int $postId = 0, $params = []){

        $priceList = new JPost();
        $priceList->setParam("orderby", "menu_order post_parent");
        $priceList->setParam("order", "ASC");
        $priceList->setParam("post_status", "publish");
        if(!empty($params["post__in"]))  
            $priceList->setParam("post__in", $params["post__in"]);
        if(!empty($params["posts_per_page"])) 
            $priceList->setParam("posts_per_page", $params["posts_per_page"]);
        else
            $priceList->setParam("posts_per_page", "-1");

        $priceList->setParam("post_type", self::POST_TYPE);
        $priceList->setProperty("price");
        if($postId > 0) $priceList->setParam("post_parent", $postId);
        $priceList->setQuery();
        $priceList->all();

        return $priceList->formatPosts(($postId > 0));

    }


   
    function getPrice(int $postId){

        $price = new JPost();
        $price->setParam("p", $postId);
        $price->setParam("post_status", "publish");
        $price->setParam("posts_per_page", "1");
        $price->setParam("post_type", self::POST_TYPE);
        $price->setQuery();
        $a_Prices = $price->first();
        $a_Prices = $price::formatPost($a_Prices);
        return $a_Prices;
    }

}