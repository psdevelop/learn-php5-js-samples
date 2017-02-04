<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */
 
require_once("classes/table_adapters/table_adapter.class.php");
require_once("classes/table_adapters/table_adapter.interface.php");

class AirPointTableAdapter extends TableAdapter  implements TableAdapterInterface  {
    
    function __construct($dbconnector, $table_name, 
        $class_name)    { 
        parent::__construct($dbconnector, "airpoints", 
            $class_name, "airpoints_view"); 
        $this->dict_header = "Аэропорты";
        $this->add_update_procedure_name = "add_update_person"; 
        $this->insert_instruction_template = "insert into `airpoints`(`id`,`point_name`, `lognitude`, 
			`lattitude`, `country_id`) values(null,:point_name, :lognitude, :lattitude, :country_id);"; 
        $this->update_instruction_template = "SET @fictive=:code; update `airpoints` SET `point_name`=:point_name,
			`lognitude`=:lognitude, `lattitude`=:lattitude, `country_id`=:country_id where `id`=:id";
        $this->delete_instruction_template = "SET @dcount=0; call `delete_object_by_type` ('airpoint', :id, @dcount);";
    }
    
    function writeTable()   {
        $this->generateTable();
    }
    
    function writeInsertForm()  {
        
    }
}

?>
