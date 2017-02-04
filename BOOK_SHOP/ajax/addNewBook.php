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
    
    $bk_name=" ";
        if (isset($_GET["bk_name"]))    {
               $bk_name=$_GET["bk_name"]; 
    }
    
    $bk_price="0";
        if (isset($_GET["bk_price"]))    {
               $bk_price=$_GET["bk_price"]; 
    }
    
    $bk_maker=" ";
        if (isset($_GET["bk_maker"]))    {
               $bk_maker=$_GET["bk_maker"]; 
    }
    
    $bk_year="0";
        if (isset($_GET["bk_year"]))    {
               $bk_year=$_GET["bk_year"]; 
    }
    
    $bk_authors=" ";
        if (isset($_GET["bk_authors"]))    {
               $bk_authors=$_GET["bk_authors"]; 
    }
    
    
    sleep(5);
    echo $books->addNewBook($lang_id,htmlspecialchars(trim(urldecode($bk_name))),$bk_price,
            $genre_id,htmlspecialchars(trim(urldecode($bk_maker))),$bk_year,
            htmlspecialchars(trim(urldecode($bk_authors))));


?>