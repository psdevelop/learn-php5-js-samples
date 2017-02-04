<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */
 
require_once("classes/table_adapters/table_adapter.class.php");
require_once("classes/table_adapters/table_adapter.interface.php");

class SheduleTableAdapter extends TableAdapter  implements TableAdapterInterface  {
    
    function __construct($dbconnector, $table_name, 
        $class_name)    { 
        parent::__construct($dbconnector, "shedules", 
            $class_name, "shedules_view");
        $this->dict_header = "Расписание";
        //$this->filters_array = array("state_id"=>"State");
        //$this->filters_values = array("state_id"=>null);
        $this->add_update_procedure_name = "add_update_district"; 
        $this->insert_instruction_template = "insert into `shedules`(`id`,`airtype_id`,`flight_id`, 
			`source_dt`,`dest_dt`) values(null,:airtype_id,:flight_id,:source_dt,:dest_dt);"; 
        $this->update_instruction_template = "update `shedules` SET `airtype_id`=:airtype_id,
            `flight_id`=:flight_id, `source_dt`=:source_dt, `dest_dt`=:dest_dt 
			where `id`=:id;";
        $this->delete_instruction_template = "SET @dcount=0; call `delete_object_by_type` 
            ('shedule', :id, @dcount);";
    }
    
    function writeTable()   {
        $this->generateTable();
    }
    
    function writeInsertForm()  {
        
    }
}

?>