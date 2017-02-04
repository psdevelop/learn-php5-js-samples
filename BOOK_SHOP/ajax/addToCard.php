<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once "/../classes\Card.class.php";
    require_once "/../classes\DBConnection.class.php";
    
    $db = new DBConnection();
    $db->initDBParams();
    $card = new Card();
    $card->db = $db;
    
    $book_id="-1";
        if (isset($_GET["book_id"]))    {
               $book_id=$_GET["book_id"]; 
    }
    
    
    //sleep(5);
    //echo $prods->GetCatProducts($cat_id);
    $card->addToCard($book_id);

?>