<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */

include_once(dirname(__FILE__)."/data_object.class.php");

class Company extends DataObject  {
    public $company_name;
    
    function __construct($country)    {
        parent::__construct($country['id']);
        $this->company_name = $country['company_name'];
    }
}

?>
