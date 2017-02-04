<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once "/../classes\Books.class.php";
    require_once "/../classes\DBConnection.class.php";
    
    $db = new DBConnection();
    $db->initDBParams();
    $books = new Books();
    $books->db = $db;
    
    $like_str=" ";
        if (isset($_GET["like_str"]))    {
               $like_str=$_GET["like_str"]; 
    }
    
    
    sleep(5);
    echo $books->GetSearchBooks($like_str);

?>