<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */

include_once(dirname(__FILE__)."/data_object.class.php");

class Shedule extends DataObject  {
    public $airtype_id;
    public $source_dt;
	public $dest_dt;
	public $flight_id;
    
    function __construct($shedule)    {
        parent::__construct($shedule['id']);
        $this->airtype_id = $shedule['airtype_id'];
        $this->source_dt = $shedule['source_dt'];
		$this->dest_dt = $shedule['dest_dt'];
		$this->flight_id = $shedule['flight_id'];
        $this->relative_props['company_id'] = $shedule['company_id'];
		$this->relative_props['src_country_id'] = $shedule['src_country_id'];
        $this->relative_props['src_lattitude'] = $shedule['src_lattitude'];
		$this->relative_props['src_lognitude'] = $shedule['src_lognitude'];
        $this->relative_props['src_point_name'] = $shedule['src_point_name'];
		$this->relative_props['src_country_name'] = $shedule['src_country_name'];
        $this->relative_props['dst_country_id'] = $shedule['dst_country_id'];
		$this->relative_props['dst_lattitude'] = $shedule['dst_lattitude'];
        $this->relative_props['dst_lognitude'] = $shedule['dst_lognitude'];
		$this->relative_props['dst_point_name'] = $shedule['dst_point_name'];
        $this->relative_props['dst_country_name'] = $shedule['dst_country_name'];
		$this->relative_props['company_name'] = $shedule['company_name'];
		$this->relative_props['dest_id'] = $shedule['dest_id'];
		$this->relative_props['source_id'] = $shedule['source_id'];
		$this->relative_props['start_time'] = $shedule['start_time'];
		$this->relative_props['end_time'] = $shedule['end_time'];
		$this->relative_props['flight_code'] = $shedule['flight_code'];
		$this->relative_props['flight_lenght'] = $shedule['flight_lenght'];
		$this->relative_props['type_name'] = $shedule['type_name'];
		$this->relative_props['flight_name'] = $shedule['flight_name'];
		$this->relative_props['shedule_name'] = $shedule['shedule_name'];
    }
}
?>
