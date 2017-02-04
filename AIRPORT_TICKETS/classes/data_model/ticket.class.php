<?php

/**17.11.2011
 * @author Poltarokov SP
 * @copyright 2011
 */

include_once(dirname(__FILE__)."/data_object.class.php");

class Ticket extends DataObject  {
    public $age;
	public $buy_datetime;
	public $family;
	public $name;
	public $surname;
	public $ticket_code;
	public $shedule_item_id;
	public $birthdate;
    
    function __construct($ticket)    {
        parent::__construct($ticket['id'], null);
        $this->age = $ticket['age'];
		$this->buy_datetime = $ticket['buy_datetime'];
		$this->family = $ticket['family'];
		$this->name = $ticket['name'];
		$this->surname = $ticket['surname'];
		$this->ticket_code = $ticket['ticket_code'];
		$this->shedule_item_id = $ticket['shedule_item_id'];
		$this->birthdate = $ticket['birthdate'];
		$this->relative_props['airtype_id'] = $ticket['airtype_id'];
        $this->relative_props['source_dt'] = $ticket['source_dt'];
		$this->relative_props['dest_dt'] = $ticket['dest_dt'];
        $this->relative_props['company_id'] = $ticket['company_id'];
		$this->relative_props['src_country_id'] = $ticket['src_country_id'];
        $this->relative_props['src_lattitude'] = $ticket['src_lattitude'];
		$this->relative_props['src_lognitude'] = $ticket['src_lognitude'];
        $this->relative_props['src_point_name'] = $ticket['src_point_name'];
		$this->relative_props['src_country_name'] = $ticket['src_country_name'];
        $this->relative_props['dst_country_id'] = $ticket['dst_country_id'];
		$this->relative_props['dst_lattitude'] = $ticket['dst_lattitude'];
        $this->relative_props['dst_lognitude'] = $ticket['dst_lognitude'];
		$this->relative_props['dst_point_name'] = $ticket['dst_point_name'];
        $this->relative_props['dst_country_name'] = $ticket['dst_country_name'];
		$this->relative_props['company_name'] = $ticket['company_name'];
		$this->relative_props['dest_id'] = $ticket['dest_id'];
		$this->relative_props['source_id'] = $ticket['source_id'];
		$this->relative_props['start_time'] = $ticket['start_time'];
		$this->relative_props['end_time'] = $ticket['end_time'];
		$this->relative_props['flight_code'] = $ticket['flight_code'];
		$this->relative_props['flight_lenght'] = $ticket['flight_lenght'];
		$this->relative_props['flight_id'] = $ticket['flight_id'];
		$this->relative_props['type_name'] = $ticket['type_name'];
		$this->relative_props['shedule_name'] = $ticket['shedule_name'];
    }
}

?>
