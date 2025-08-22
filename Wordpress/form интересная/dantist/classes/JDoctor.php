<?
class JDoctor extends JRender{


    const POST_TYPE = "doctors";

    function __construct($params = []){
        parent::__construct($params);
    }

    public static function getSpec($postId){
        $objTaxes = get_the_terms($postId, 'speciality_doctors');
        if(empty($objTaxes)) return [];
        $taxes = [];

        foreach($objTaxes as $tax) $taxes[] = [
            "id" => $tax->term_id,
            "name" => $tax->name,
        ];
        return reset($taxes);
    }

    public static function getSpecAll(){
        $objPost = new JPost;

        $params["taxonomy"] = ["speciality_doctors"];
        $taxes = $objPost->getCategories($params);

        if(empty($taxes)) return false;
        $tmpTaxes = [];
        foreach($taxes as $tax):
           // $tax["rating"] = get_field("base-rating", "category_" . $tax["id"]);
          //  $tax["icon"] = get_field("icon", "category_" . $tax["id"]);
          //  $tax["link"] = get_field("link", "category_" . $tax["id"]);
            $tmpTaxes[] = $tax;
        endforeach;

        return $tmpTaxes;
    }

    function getDoctors(int $postId = 0,  $params = []){

        $doctorList = new JPost();
        $doctorList->setParam("orderby", "menu_order post_parent");
        $doctorList->setParam("order", "ASC");
        $doctorList->setParam("post_status", "publish");
        if(!empty($params["post__in"]))
            $doctorList->setParam("post__in", $params["post__in"]);
        if(!empty($params["posts_per_page"]))
            $doctorList->setParam("posts_per_page", $params["posts_per_page"]);
        else
            $doctorList->setParam("posts_per_page", "-1");
        $doctorList->setParam("post_type", self::POST_TYPE);

        $doctorList->setProperty("base-info");
        if($postId > 0) $doctorList->setParam("post_parent", $postId);
        $doctorList->setQuery();
        $doctorList->all();

        return $doctorList->formatPosts(($postId > 0));

    }


    function getDoctor(int $postId){

        $doctor = new JPost();
        $doctor->setParam("p", $postId);
        $doctor->setParam("post_status", "publish");
        $doctor->setParam("posts_per_page", "1");
        $doctor->setParam("post_type", self::POST_TYPE);
        $doctor->setProperty("info-doctor");
        $doctor->setProperty("base-info");
        $doctor->setQuery();
        $a_Doctors = $doctor->first();

        $a_Doctors = $doctor->formatPosts(true);
        return $a_Doctors?reset($a_Doctors):[];
    }

}
