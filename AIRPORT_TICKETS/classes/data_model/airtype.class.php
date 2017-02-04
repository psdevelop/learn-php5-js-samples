<?php

/**
 * @author 
 * @copyright 2011
 */

include_once(dirname(__FILE__)."/data_object.class.php");

class AirType extends DataObject  {
    public $type_name;
    
    function __construct($air_type)    {
        parent::__construct($air_type['id']);
        $this->type_name = $air_type['type_name'];
    }
}

?>