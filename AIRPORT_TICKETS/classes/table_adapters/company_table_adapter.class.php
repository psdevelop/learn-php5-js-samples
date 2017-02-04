<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */
 
require_once("classes/table_adapters/table_adapter.class.php");
require_once("classes/table_adapters/table_adapter.interface.php");

class CompanyTableAdapter extends TableAdapter  implements TableAdapterInterface  {
    
    function __construct($dbconnector, $table_name, 
        $class_name)    { 
        parent::__construct($dbconnector, "companies", 
            $class_name, "companies"); 
		$this->dict_header = "Авиакомпании";	
        $this->add_update_procedure_name = ""; 
        $this->insert_instruction_template = "insert into `companies`(`id`,`company_name`) values(null,:company_name);"; 
        $this->update_instruction_template = "update `companies` SET `company_name`=:company_name where `id`=:id;";
        $this->delete_instruction_template = "SET @dcount=0; call `delete_object_by_type` ('companies', :id, @dcount);";
    }
    
    function writeTable()   {
        $this->generateTable();
    }
    
    function writeInsertForm()  {
        
    }
}

?>
