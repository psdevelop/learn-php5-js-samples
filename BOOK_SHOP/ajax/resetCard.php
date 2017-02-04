<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "/../classes\DBConnection.class.php";

if(session_status()!=PHP_SESSION_ACTIVE) session_start();

$db = new DBConnection();
$db->initDBParams();

$db->sendSQLDQLRequest("DELETE FROM POSITION WHERE SESSION_ID='".session_id()."' AND ORDER_ID=-1");
    

?>