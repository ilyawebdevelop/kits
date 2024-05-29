<?
class JConstructor extends JRender{

    const FIELD_NAME = 'constructor';
    public $params = [
        "field-name" => 'constructor',
        "hide-breadcrumbs" => false
    ];

    function __construct($params = []){
        parent::__construct($params);
        if(!empty($params["field-name"]))
            $this->params["field-name"] = $params["field-name"];
        if(!empty($params["hide-breadcrumbs"]))
            $this->params["hide-breadcrumbs"] = $params["hide-breadcrumbs"];
    }

    function render(){

        if(!is_front_page() && !$this->params["hide-breadcrumbs"])
            $this->renderBreadCrumbs();
        $this->distribute();
    }

    function items(){
        return get_field($this->params["field-name"]?:self::FIELD_NAME);
    }

    function distribute(){

        $items = $this->items()?:[];

        foreach($items as $item):
            switch($item["acf_fc_layout"]):
                case 'simple':
                  
                    $item["layout"] = $item["block"];
                    self::setPart($item);
                    break;
                default:
                    $item["layout"] = $item["acf_fc_layout"];
                    self::setPart($item);
                    break;
            endswitch;

        endforeach;
    }



}