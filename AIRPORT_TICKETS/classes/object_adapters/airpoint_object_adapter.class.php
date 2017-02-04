<?php

/*
 * @author Poltarokov SP
 * @copyright 2011
 */

require_once("classes/object_adapters/object_adapter.class.php"); 
require_once("classes/object_adapters/object_manip.interface.php");
require_once("classes/configuration.php");

class AirPointObjectAdapter extends ObjectAdapter implements ObjectManipInterface  {
     //protected $foreigen_keys = array("person_type_id"=>"person_types");
     
     function __construct($table_name, $class_name)    {
        parent::__construct($table_name, $class_name, "dictionary_table_text", "dictionary_table_text");
        $this->foreigen_keys = array("country_id"=>"Country");
        $this->fields_prev_text_array = array("id"=>"ID","point_name"=>"Наименование аэропорта",
			"country_id"=>"Страна", "lognitude"=>"Долгота", "lattitude"=>"Широта");
        $this->fields_width_array = array("id"=>10,"point_name"=>25, "country_id"=>25, 
			"lognitude"=>15, "lattitude"=>15);
        $this->select_display_field = "airpoint_name";
        $this->manip_form_template = "<table><tr><td>***___point_name</td><td>***___lognitude</td><td>***___lattitude</td></tr>
            <tr><td>***___country_id</td><td></td><td>***___id</td></tr>
			</table>";
        $this->hidden_keys = array("id"=>"hidden");
     }
     
     function writeTableHeader($linked_props)    {
        echo "<tr>";
        parent::write_header_td("ID",25);
        parent::write_header_td("Наименование аэропорта",75);
        parent::write_header_td("Нас. пункт",70);
		parent::write_header_td("Долгота/Широта",70);
        echo "</tr>";
     }
     
     function writeTableRow($object, $linked_props)    {
        //echo "<tr>";
        parent::write_td($object->getId(),25);
        parent::write_td($object->point_name,75);
        parent::write_td($object->relative_props['country_name'],70);
		parent::write_td($object->lognitude."/".$object->lattitude,70);
     }
}

?>
