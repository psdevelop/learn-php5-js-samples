<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */

include_once(dirname(__FILE__)."/data_object.class.php");

class AirPoint extends DataObject  {
    public $point_name;
	public $lognitude;
	public $lattitude;
	public $country_id;
    
    function __construct($air_point)    {
        parent::__construct($air_point['id']);
        $this->point_name = $air_point['point_name'];
		$this->lognitude = $air_point['lognitude'];
		$this->lattitude = $air_point['lattitude'];
		$this->country_id = $air_point['country_id'];
		$this->relative_props['country_name'] = $air_point['country_name'];
		$this->relative_props['airpoint_name'] = $air_point['airpoint_name'];
    }
}

?>