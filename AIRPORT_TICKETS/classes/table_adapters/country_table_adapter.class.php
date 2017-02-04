<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */
 
require_once("classes/table_adapters/table_adapter.class.php");
require_once("classes/table_adapters/table_adapter.interface.php");

class CountryTableAdapter extends TableAdapter  implements TableAdapterInterface  {
    
    function __construct($dbconnector, $table_name, 
        $class_name)    { 
        parent::__construct($dbconnector, "countries", 
            $class_name, "countries");
		$this->dict_header = "Страны";			
        $this->add_update_procedure_name = ""; 
        $this->insert_instruction_template = "insert into `countries`(`id`,`country_name`) values(null,:country_name);"; 
        $this->update_instruction_template = "update `countries` SET `country_name`=:country_name where `id`=:id;";
        $this->delete_instruction_template = "SET @dcount=0; call `delete_object_by_type` ('country', :id, @dcount);";
    }
    
    function writeTable()   {
        $this->generateTable();
    }
    
    function writeInsertForm()  {
        
    }
}

?>
