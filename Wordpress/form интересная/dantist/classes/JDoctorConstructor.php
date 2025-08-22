<?
class JDoctorConstructor extends JConstructor{
    function top(){
        $doctorId = get_the_id();
        $objDoctor = new JDoctor;
        $doctor = $objDoctor->getDoctor($doctorId);
        JRender::viewInclude("top-doctor", [
            "d" => $doctor
        ]);
    }

}