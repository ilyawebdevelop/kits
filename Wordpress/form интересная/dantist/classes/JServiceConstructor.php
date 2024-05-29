<?
class JServiceConstructor extends JConstructor{
    function topService(){
        $serviceId = get_the_id();
        $objService = new JService;
        $service = $objService->getService($serviceId);
        JRender::viewInclude("top-service", [
            "s" => $service
        ]);
    }

}