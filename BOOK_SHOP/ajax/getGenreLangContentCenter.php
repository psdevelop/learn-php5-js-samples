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
    
    $lang_id="-1";
        if (isset($_GET["lang_id"]))    {
               $lang_id=$_GET["lang_id"]; 
    }
    
    $genre_id="-1";
        if (isset($_GET["genre_id"]))    {
               $genre_id=$_GET["genre_id"]; 
    }
    
    sleep(5);
    echo $books->GetLangGenBooks($lang_id,$genre_id);

?>