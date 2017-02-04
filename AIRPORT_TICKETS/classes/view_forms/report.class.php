<?php

/**01-02-2012
 * @author Poltarokov SP
 * @copyright 2012
 */

class Report  {
    protected $report_action_caption = "Сформ. отчет";
    protected $element_display_template = null;
    protected $master_table_adapter = null;

    function __construct($dbconnector, $class_name)    {
        $reflectionClass = new ReflectionClass($class_name."TableAdapter");
        $this->master_table_adapter = $reflectionClass->newInstanceArgs
                (array($dbconnector,"",$class_name));
        $this->master_table_adapter->resetAllFilters();
    }
    
    function generateReportExecutionPanel($filtered_object_container)  {
        $this->master_table_adapter->generateCustomFiltersForm($filtered_object_container, 
                $GLOBALS['out_report_mode'], $this->report_action_caption);
    }
    
    function getReportBody() {
        
    }
}

?>
