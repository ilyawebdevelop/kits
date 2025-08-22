<?
class JPost{

    private $param = [];
    private $property = [];
    private $query = [];
    private $result = [];
    private $methodOutResult = false;

    function setParam($name = "", $value = ""){
        if( empty($name) ) return $this->param;

        $this->param[$name] = $value;

        // return $this->param;
    }

    function setProperty($property){
        $this->property[] = $property;
    }   

    function setQuery(){


        // $cache_key = md5( serialize($this->param) );
        // $cache = wp_cache_get( $cache_key, 'default' );

        // if( false !== $cache )
        //     return $cache;
        

        $this->query = new WP_Query(
            $this->param
        );

      // wp_cache_add( $cache_key, $this->query, 'default', 3600);

        return $this->query;
    }

    function all(){
        
        if($this->query->posts) $this->result = $this->query->posts;

        return $this->result;
    }

    function first(){

        if($this->query->posts) $this->result = reset( $this->query->posts );

        return $this->result;
    }

    function getProperties($postId){

        if(empty($this->property)) return []; 

        $tmpProperty = [];
        foreach($this->property as $prop): 
            $tmpProperty[$prop] = get_field($prop, $postId);
        endforeach;
              
        return $tmpProperty;

    }

    function pagination(){
        $GLOBALS['wp_query']->max_num_pages = $this->query->max_num_pages;
    }


    function formatPosts($onlyFirstLevel = false){

        $tmpPosts = [];

        $this->result = is_array($this->result) ? $this->result: [$this->result];

        foreach($this->result as $post):

            $tmpPost = self::formatPost($post);

            $tmpPost["props"] = $this->getProperties($tmpPost["id"]);

            if($onlyFirstLevel || $tmpPost["parent"] == 0):
                $tmpPosts[$tmpPost["id"]] = $tmpPost;
            else:
                $tmpPosts[$tmpPost["parent"]]["children"][] = $tmpPost;
            endif;
            
        endforeach;
 

        $this->result = $tmpPosts;

        return $tmpPosts;
    }

    static function formatPost($post){
        return [
            "id" => $post->ID,
            "title" => $post->post_title,
            "slug" => $post->post_name,
            "parent" => $post->post_parent,
            "link" => get_permalink($post->ID)
        ];
    }

    
    static function formatCategory($category){

        return [
            "id" => $category->term_id,
            "title" => $category->name,
            "slug" => $category->slug,
            "count" => $category->count,
            "link" => get_term_link($category->term_id, $category->taxonomy)
        ];
    }


    function getCategories($args){

        $categories = [];

        foreach(get_terms( $args ) as $category):
            $categories[] = $this->formatCategory($category);
        endforeach;

        wp_reset_postdata();
     
        return $categories;
 
    }


}