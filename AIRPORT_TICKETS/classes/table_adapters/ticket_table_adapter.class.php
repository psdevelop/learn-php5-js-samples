<?php

/**17.11.2011
 * @author Poltarokov SP
 * @copyright 2011
 */
 
require_once("classes/table_adapters/table_adapter.class.php");
require_once("classes/table_adapters/table_adapter.interface.php");

class TicketTableAdapter extends TableAdapter  implements TableAdapterInterface  {
    
    function __construct($dbconnector, $table_name, 
        $class_name)    { 
        parent::__construct($dbconnector, "tickets", 
            $class_name, "ticket_view");
        $this->dict_header = "Заказы билетов";
        $this->add_update_procedure_name = "add_update_person"; 
        $this->insert_instruction_template = "insert into `tickets`(`id`,`age`,`buy_datetime`,`family`,
			`name`,`surname`,`ticket_code`,`shedule_item_id`, `birthdate`) values(null,:age
			,:buy_datetime,:family,:name,:surname,:ticket_code,:shedule_item_id,:birthdate);"; 
        $this->update_instruction_template = "update `tickets` SET `age`=:age, `buy_datetime`=:buy_datetime, 
			`family`=:family, `name`=:name, `surname`=:surname, `ticket_code`=:ticket_code, 
			`shedule_item_id`=:shedule_item_id, `birthdate`=:birthdate where `id`=:id";
        $this->delete_instruction_template = "SET @dcount=0; call `delete_object_by_type` 
			('ticket', :id, @dcount);";
    }
    
    function writeTable()   {
        $this->generateTable();
    }
    
    function writeInsertForm()  {
        
    }
}

?>