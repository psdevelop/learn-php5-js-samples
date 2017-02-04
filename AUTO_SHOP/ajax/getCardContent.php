<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once "/../classes\Products.class.php";
    require_once "/../classes\Order.class.php";
    require_once "/../classes\DBConnection.class.php";
    
    $db = new DBConnection();
    $db->initDBParams();
    $prods = new Products();
    $prods->db = $db;
    $orders = new Orders();
    $orders->db = $db;
    
    if (isset($_GET["add_order"]))    {
        if ($_GET["add_order"]=="yes")  {
            //echo "add_order=yes";
            $family=" ";
                if (isset($_GET["family"]))    {
                       $family=$_GET["family"]; 
            }

            $name=" ";
                if (isset($_GET["name"]))    {
                       $name=$_GET["name"]; 
            }

            $surname=" ";
                if (isset($_GET["surname"]))    {
                       $surname=$_GET["surname"]; 
            }

            $adres=" ";
                if (isset($_GET["adres"]))    {
                       $adres=$_GET["adres"]; 
            }
            
            $tr_select="-1";
                if (isset($_GET["tr_select"]))    {
                       $tr_select=$_GET["tr_select"]; 
            }
            
            $orders->addNewOrder(htmlspecialchars(trim(urldecode($family))), 
                    htmlspecialchars(trim(urldecode($name))), 
                    htmlspecialchars(trim(urldecode($surname))), 
                    htmlspecialchars(trim(urldecode($adres))), $tr_select);
            
        } 
    }
    
    
    sleep(5);
    echo $orders->GetAllOrders(true);
    echo $prods->GetCardProducts();

?>