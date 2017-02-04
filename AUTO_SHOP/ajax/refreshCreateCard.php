<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "/../classes\Card.class.php";
require_once "/../classes\DBConnection.class.php";

if(session_status()!=PHP_SESSION_ACTIVE) session_start();

$db = new DBConnection();
$db->initDBParams();
$card = new Card();
$card->db = $db;

$cards = $db->sendSQLDQLRequest("SELECT * FROM CARDS WHERE SESSION_ID='".session_id()."'");
if(sizeof($cards)==0)
    $db->sendSQLDMLRequest("INSERT INTO CARDS (SESSION_ID) VALUES ('".session_id()."')");

echo "Корзина ".$card->getCardStatus()." руб.";

?>