<?php

/* 17.11.2011
 * @author Poltarokov SP
 * @copyright 2011
 */

require_once("classes/object_adapters/object_adapter.class.php"); 
require_once("classes/object_adapters/object_manip.interface.php");
require_once("classes/configuration.php");

class TicketObjectAdapter extends ObjectAdapter implements ObjectManipInterface  {
     //protected $foreigen_keys = array("person_type_id"=>"person_types");
     
     function __construct($table_name, $class_name)    {
        parent::__construct($table_name, $class_name, "dictionary_table_text", "dictionary_table_text");
        $this->foreigen_keys = array("shedule_item_id"=>"Shedule");
        $this->fields_prev_text_array = array("id"=>"ID","age"=>"Возраст","buy_datetime"=>"Время покупки",
			"family"=>"Фамилия","name"=>"Имя","surname"=>"Отчество","ticket_code"=>"Код билета"
			,"birthdate"=>"Дата рождения","shedule_item_id"=>"Позиция в расписании");
        $this->fields_width_array = array("id"=>10,"shedule_item_id"=>25,"age"=>15,
			"buy_datetime"=>20,"family"=>25,"name"=>25,"surname"=>25,"ticket_code"=>25,
			"birthdate"=>20);
        $this->select_display_field = "id";
        $this->manip_form_template = "<table>
			<tr><td colspan=\"3\">***___shedule_item_id</td></tr>
			<tr><td>***___family</td><td>***___name</td><td>***___surname</td></tr>
			<tr><td>***___ticket_code</td><td>***___birthdate</td><td>***___id</td></tr>
			<tr><td>***___age</td><td>***___buy_datetime</td><td></td></tr>
            </table>";
		$this->date_time_fields = array("buy_datetime"=>"2011-22-09 00:00");
		$this->date_fields = array("birthdate"=>"2011-22-09");	
        //$this->date_fields = array("start_call_date"=>"","end_call_date"=>"");
        $this->with_button_clear_fields = array("buy_datetime"=>"2011-22-09 00:00",
            "birthdate"=>"2011-22-09");	
        $this->hidden_keys = array("id"=>"hidden");
		$this->filter_form_template = "<table><tr><td colspan=\"2\">***___shedule_item_id</td><td></td></tr>
            </table>";
     }
     
     function writeTableHeader($linked_props)    {
        echo "<tr>";
        parent::write_header_td("ID",25);
        parent::write_header_td("Данные пассажира",75);
        parent::write_header_td("Позиция в расписании",370);
        echo "</tr>";
     }
     
     function writeTableRow($object, $linked_props)    {
        //echo "<tr>";
        parent::write_td($object->getId(),25);
        parent::write_td($object->family." ".$object->name." ".$object->surname,75);
		parent::write_td($object->relative_props['shedule_name'],370);;
     }
}

?>
