<?
class JBlock extends JRender{

    function __construct($params = []){
        parent::__construct($params);
    }

    function renderBlocks(){
        $this->renderBreadCrumbs();


    }

   

}