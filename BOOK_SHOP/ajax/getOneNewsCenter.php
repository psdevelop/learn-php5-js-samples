<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once "/../classes\News.class.php";
    require_once "/../classes\DBConnection.class.php";
    
    $db = new DBConnection();
    $db->initDBParams();
    $news = new News();
    $news->db = $db;
    
    $news_id="-1";
        if (isset($_GET["news_id"]))    {
               $news_id=$_GET["news_id"]; 
    }
    
    sleep(5);
    echo $news->GetNewsById($news_id);
    
?>
