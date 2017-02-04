<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */
 
 require_once("classes/data_model/airpoint.class.php");
 require_once("classes/data_model/airtype.class.php");
 require_once("classes/data_model/company.class.php");
 require_once("classes/data_model/flight.class.php");
 require_once("classes/data_model/shedule.class.php");
 require_once("classes/data_model/ticket.class.php");
 require_once("classes/data_model/country.class.php");
 require_once("classes/data_model/user.class.php");

class ObjectCollection extends ArrayIterator
{
    protected $object_class_name;
    
    function __construct($object_class_name, $data)    {
        parent::__construct($data);
        $this->object_class_name = $object_class_name;    
    }
    
    public function offsetGet( $index )
    {
        if( empty( $this->_cache[$index] ) )
        {
            // по просьбам трудящихся
            //ReflectionClass($object_class_name)->newInstanceArgs(parent::offsetGet[$index]);
            $this->_cache[$index] = new $this->object_class_name( parent::offsetGet($index));
        }
        return $this->_cache[$index];
    }

    public function current()
    {
        $index = parent::key();
        if( empty( $this->_cache[$index] ) )
        {
            // по просьбам трудящихся
            $this->_cache[$index] = new $this->object_class_name( parent::current() );
        }
        return $this->_cache[$index];
    } 
}

?>