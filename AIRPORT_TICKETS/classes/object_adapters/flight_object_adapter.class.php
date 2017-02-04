<?php

/*
 * @author Poltarokov SP
 * @copyright 2011
 */

require_once("classes/object_adapters/object_adapter.class.php"); 
require_once("classes/object_adapters/object_manip.interface.php");
require_once("classes/configuration.php");

class FlightObjectAdapter extends ObjectAdapter implements ObjectManipInterface  {
     
     function __construct($table_name, $class_name)    {
        parent::__construct($table_name, $class_name, "dictionary_table_text", "dictionary_table_text");
        $this->foreigen_keys = array("company_id"=>"Company", "dest_point"=>"AirPoint", "source_point"=>"AirPoint");
        $this->fields_prev_text_array = array("id"=>"ID","company_id"=>"Компания",
		"dest_point"=>"Точка назначения", "source_point"=>"Точка отправления","start_time"=>"Время вылета",
		"end_time"=>"Дата встречи", "flight_code"=>"Код рейса", "flight_lenght"=>"Дальность полета",
		"flights_hours"=>"Длительность полета");
        $this->fields_width_array = array("id"=>1,"company_id"=>75,"dest_point"=>75,"source_point"=>75,
			"start_time"=>20, "end_time"=>20,"flight_code"=>20, "flight_lenght"=>10,"flights_hours"=>10);
        $this->select_display_field = "flight_name";
        $this->manip_form_template = "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr>
            <td>***___company_id</td><td>***___dest_point</td><td>***___source_point</td></tr>
			<tr><td>***___start_time</td><td>***___end_time</td><td>***___flight_code</td></tr>
			<tr><td>***___flight_lenght</td><td>***___flights_hours</td><td>***___id</td></tr>
            </table>";
        $this->time_fields = array("start_time"=>"00:00", "end_time"=>"00:00");
        $this->with_button_clear_fields = array("start_time"=>"00:00", "end_time"=>"00:00");
        $this->hidden_keys = array("id"=>"hidden");
        //$this->text_area_fields = array("comment"=>2);
		$this->filter_form_template = "<table><tr><td>***___state_id</td><td>***___dest_point</td>
			<td>***___source_point</td></tr></table>";
     }
     
     function writeTableHeader($linked_props)    {
        echo "<tr>";
        parent::write_header_td("ID",25);
        parent::write_header_td("Код рейса",30);
        parent::write_header_td("Детали (рейс)",300);
        echo "</tr>";
     }
     
     function writeTableRow($object, $linked_props)    {
        //echo "<tr>";
        parent::write_td($object->getId(),25);
        parent::write_td($object->flight_code,30);
        parent::write_td($object->relative_props['flight_name'],300);
     }
}

?>