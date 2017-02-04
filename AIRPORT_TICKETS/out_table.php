<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */
 
    ini_set('display_errors',1);
    session_start();
    date_default_timezone_set('Europe/Moscow');

    require_once("classes/dbconnector.class.php");
    require_once("classes/configuration.php");
    require_once("classes/auth.class.php");
    require_once("classes_header.php");

    $class_name="";
    if (isset($_GET['class_name'])) 
	    $class_name=$_GET['class_name'];	
    else 
	    die("Не задан параметр сущности для скрипта выборки!");
    
    $request_mode="";
    if (isset($_GET['request_mode'])) 
	    $request_mode=$_GET['request_mode'];	
	//else 
	//    $select_table_name="";

    $Connector = new DbConnector($GLOBALS['dbhost'],$GLOBALS['dbname'],$_SESSION['login'],$_SESSION['psw']);
    $UserAuth = new UserAuthentification($Connector);
    
    if ($UserAuth->checkLogin())    {
    
    $reflectionClass = new ReflectionClass($class_name."TableAdapter");
    $DictTAdapt = $reflectionClass->newInstanceArgs(array($Connector,
        "", $class_name));

    //echo
    $DictTAdapt->prepareFilterArray($_GET);
    //print_r($_GET);
    if ($request_mode==$GLOBALS['select_mode'])  {
        $DictTAdapt->selectWithRelative();
        $DictTAdapt->generateDictHeader();
        $DictTAdapt->writeTable();
        $DictTAdapt->generatePagerForm($class_name.$GLOBALS['dict_container_base']);    }
    else if ($request_mode==$GLOBALS['get_sel_options_mode'])  {
        echo $DictTAdapt->getSelectContentFullByFilter();
    }
    else if ($request_mode==$GLOBALS['get_list_div_mode'])  {
        echo $DictTAdapt->getListDivContentFullByFilter();
    }
    else if ($request_mode==$GLOBALS['out_report_mode'])  {
        $DictTAdapt->selectFullWithRelative();
        $DictTAdapt->generateReportDictHeader();
        $DictTAdapt->writeTable();
    }
    else    {
        echo "Неизвестный режим выборки в AJAX-запросе!";
    }
    
    if ($GLOBALS['global_ajax_timeout']>0)
        sleep($GLOBALS['global_ajax_timeout']);
    }   else
        echo "Нет аутентификации!";

?>