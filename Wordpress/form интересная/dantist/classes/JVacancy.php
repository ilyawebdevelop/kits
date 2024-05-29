<?
class JVacancy extends JRender{

    
    const POST_TYPE = "vacancies";

    function __construct($params = []){
        parent::__construct($params);
    }

    function renderVacancies(){
        $this->renderBreadCrumbs();
        $serv =  $this->getVacancies();

        echo "<pre>";
        print_r($serv);
        echo "</pre>";

    }

    function getVacancies(int $postId = 0){

        $vacancyList = new JPost();
        $vacancyList->setParam("orderby", "menu_order post_parent");
        $vacancyList->setParam("order", "ASC");
        $vacancyList->setParam("post_status", "publish");
        $vacancyList->setParam("posts_per_page", "-1");
        $vacancyList->setParam("post_type", self::POST_TYPE);
        if($postId > 0) $vacancyList->setParam("post_parent", $postId);
        $vacancyList->setQuery();
        $vacancyList->all();

        return $vacancyList->formatPosts(($postId > 0));

    }


    function renderDetailVacancyList(){
        global $post;
        $this->renderBreadCrumbs();
        $serv = $this->getVacancy($post->ID);

        
        echo "<pre>";
        print_r($serv);
        echo "</pre>";
    }

    function getVacancy(int $postId){

        $vacancy = new JPost();
        $vacancy->setParam("p", $postId);
        $vacancy->setParam("post_status", "publish");
        $vacancy->setParam("posts_per_page", "1");
        $vacancy->setParam("post_type", self::POST_TYPE);
        $vacancy->setQuery();
        $a_Vacancies = $vacancy->first();
        $a_Vacancies = $vacancy::formatPost($a_Vacancies);
        return $a_Vacancies;
    }

}