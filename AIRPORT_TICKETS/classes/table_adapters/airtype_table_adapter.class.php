<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */
 
require_once("classes/table_adapters/table_adapter.class.php");
require_once("classes/table_adapters/table_adapter.interface.php");

class AirTypeTableAdapter extends TableAdapter  implements TableAdapterInterface  {
    
    function __construct($dbconnector, $table_name, 
        $class_name)    { 
        parent::__construct($dbconnector, "airtypes", 
            $class_name, "airtypes");
        $this->dict_header = "Типы воздушного транспорта";
        $this->add_update_procedure_name = "add_update_person"; 
        $this->insert_instruction_template = "insert into `airtypes`(`id`,`type_name`) values(null,:type_name);"; 
        $this->update_instruction_template = "update `airtypes` SET `type_name`=:type_name where `id`=:id";
        $this->delete_instruction_template = "SET @dcount=0; call `delete_object_by_type` ('airtype', :id, @dcount);";
    }
    
    function writeTable()   {
        $this->generateTable();
    }
    
    function writeInsertForm()  {
        
    }
}

?>
