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
    
    $cat_id="-1";
        if (isset($_GET["cat_id"]))    {
               $cat_id=$_GET["cat_id"]; 
    }
    
    sleep(5);
    echo $prods->GetCatProducts($cat_id);

?>