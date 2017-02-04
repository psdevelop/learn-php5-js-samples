<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */

include_once(dirname(__FILE__)."/data_object.class.php");

class Country extends DataObject  {
    public $country_name;
    
    function __construct($country)    {
        parent::__construct($country['id']);
        $this->country_name = $country['country_name'];
    }
}

?>
