<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once "/../classes\Products.class.php";
    require_once "/../classes\DBConnection.class.php";
    
    $db = new DBConnection();
    $db->initDBParams();
    $prods = new Products();
    $prods->db = $db;
    
    $like_str=" ";
        if (isset($_GET["like_str"]))    {
               $like_str=$_GET["like_str"]; 
    }
    
    sleep(5);
    echo $prods->SearchProducts($like_str);

?>