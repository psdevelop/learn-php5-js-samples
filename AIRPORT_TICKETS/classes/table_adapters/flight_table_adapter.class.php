<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */
 
require_once("classes/table_adapters/table_adapter.class.php");
require_once("classes/table_adapters/table_adapter.interface.php");

class FlightTableAdapter extends TableAdapter  implements TableAdapterInterface  {
    
    function __construct($dbconnector, $table_name, 
        $class_name)    { 
        parent::__construct($dbconnector, "flights", 
            $class_name, "flights_view"); 
		$this->dict_header = "Маршруты (рейсы)";
        $this->add_update_procedure_name = ""; 
        $this->insert_instruction_template = "insert into `flights`(`id`,`source_point`,`dest_point`, 
			`flight_code`, `start_time`, `end_time`, `flight_lenght`, `company_id`, `flights_hours`) 
			values(null,:source_point,:dest_point,:flight_code,:start_time,:end_time,
			:flight_lenght, :company_id, :flights_hours);"; 
        $this->update_instruction_template = "update `flights` SET `source_point`=:source_point,
            `dest_point`=:dest_point, `flight_code`=:flight_code, `start_time`=:start_time, 
			`end_time`=:end_time, `flight_lenght`=:flight_lenght, `company_id`=:company_id, `flights_hours`=:flights_hours 
			where `id`=:id;  SET @code=:code;";
        $this->delete_instruction_template = "SET @dcount=0; call `delete_object_by_type` 
            ('flight', :id, @dcount);";
        //$this->custom_action_instructions = array("append_call_repeat_status"=>"insert into `call_statuses_rels`(`id`,`call_id`,`call_status_id`, `call_date`) 
        //    values(null,:call_id,'{$GLOBALS['repeat_call_status_id']}',CURRENT_TIMESTAMP());");
        //$this->custom_action_params = array("append_call_repeat_status"=>array("call_id"=>"call_id"));
        //$this->short_name = "CSS";
    }
    
    function writeTable()   {
        $this->generateTable();
    }
    
    function writeInsertForm()  {
        
    }
}

?>