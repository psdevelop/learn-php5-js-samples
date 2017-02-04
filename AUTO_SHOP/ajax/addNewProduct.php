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
    
    $pr_name=" ";
        if (isset($_GET["pr_name"]))    {
               $pr_name=$_GET["pr_name"]; 
    }
    
    $pr_price="0";
        if (isset($_GET["pr_price"]))    {
               $pr_price=$_GET["pr_price"]; 
    }
    
    $pr_mark=" ";
        if (isset($_GET["pr_mark"]))    {
               $pr_mark=$_GET["pr_mark"]; 
    }
    
    
    
    sleep(5);
    echo $prods->addNewProduct($cat_id,htmlspecialchars(trim(urldecode($pr_name)))
            ,$pr_price,htmlspecialchars(trim(urldecode($pr_mark))));
    //echo $prods->addNewProduct($cat_id,$pr_name,$pr_price,$pr_mark);


?>