<?php

/*
 * @author Poltarokov SP
 * @copyright 2011
 */

require_once("classes/object_adapters/object_adapter.class.php"); 
require_once("classes/object_adapters/object_manip.interface.php");
require_once("classes/configuration.php");

class SheduleObjectAdapter extends ObjectAdapter implements ObjectManipInterface  {
     
     function __construct($table_name, $class_name)    {
        parent::__construct($table_name, $class_name, "dictionary_table_text", "dictionary_table_text");
        $this->foreigen_keys = array("airtype_id"=>"AirType", "flight_id"=>"Flight");
        $this->fields_prev_text_array = array("id"=>"ID","airtype_id"=>"Тип воздушного судна",
			"source_dt"=>"Дата-время вылета", "dest_dt"=>"Дата-время прибытия", "flight_id"=>"Маршрут(рейс)");
        $this->fields_width_array = array("id"=>10,"airtype_id"=>25,"source_dt"=>20,"dest_dt"=>20,
			"flight_id"=>25);
        $this->select_display_field = "shedule_name";
        $this->manip_form_template = "<table><tr>
			<td>***___airtype_id</td><td>***___source_dt</td><td>***___dest_dt***___id</td></tr><tr>
			<td colspan=\"3\">***___flight_id</td></tr>
            </table>";
		$this->date_time_fields = array("source_dt"=>"2011-22-09 00:00",
            "dest_dt"=>"2011-22-09 00:00");
        //$this->date_fields = array("start_call_date"=>"","end_call_date"=>"");
        $this->with_button_clear_fields = array("source_dt"=>"2011-22-09 00:00",
            "dest_dt"=>"2011-22-09 00:00");	
        $this->hidden_keys = array("id"=>"hidden");
        $this->filter_form_template = "<table><tr><td colspan=\"2\">***___airtype_id</td><td></td></tr>
            </table>";
     }
     
     function writeTableHeader($linked_props)    {
        echo "<tr>";
        parent::write_header_td("ID",25);
		parent::write_header_td("Отправл./Прибытие",100);
        parent::write_header_td("Тип воздушного судна",100);
		parent::write_header_td("Информация о рейсе",275);
        echo "</tr>";
     }
     
     function writeTableRow($object, $linked_props)    {
        parent::write_td($object->getId(),25);
		parent::write_td($object->source_dt."/".$object->dest_dt,100);
        parent::write_td($object->relative_props['type_name'],100);
		parent::write_td($object->relative_props['flight_name'],275);
     }
}

?>