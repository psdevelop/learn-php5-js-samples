<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */

include_once(dirname(__FILE__)."/data_object.class.php");

class Flight extends DataObject  {
    public $dest_point;
    public $source_point;
    public $start_time;
    public $end_time;
    public $flight_code;
	public $flight_lenght;
    public $company_id;
	public $flights_hours;
    
    function __construct($flight)    {
        parent::__construct($flight['id']);
        $this->dest_point = $flight['dest_id'];
        $this->source_point = $flight['source_id'];
        $this->start_time = $flight['start_time'];
        $this->end_time = $flight['end_time'];
        $this->flight_code = $flight['flight_code'];
		$this->flight_lenght = $flight['flight_lenght'];
        $this->company_id = $flight['company_id'];
		$this->flights_hours = $flight['flights_hours'];
        $this->relative_props['src_country_id'] = $flight['src_country_id'];
        $this->relative_props['src_lattitude'] = $flight['src_lattitude'];
		$this->relative_props['src_lognitude'] = $flight['src_lognitude'];
        $this->relative_props['src_point_name'] = $flight['src_point_name'];
		$this->relative_props['src_country_name'] = $flight['src_country_name'];
        $this->relative_props['dst_country_id'] = $flight['dst_country_id'];
		$this->relative_props['dst_lattitude'] = $flight['dst_lattitude'];
        $this->relative_props['dst_lognitude'] = $flight['dst_lognitude'];
		$this->relative_props['dst_point_name'] = $flight['dst_point_name'];
        $this->relative_props['dst_country_name'] = $flight['dst_country_name'];
		$this->relative_props['company_name'] = $flight['company_name'];
		$this->relative_props['flight_name'] = $flight['flight_name'];
    }
}

?>
