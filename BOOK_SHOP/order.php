<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once "classes\Order.class.php";
    require_once "classes\DBConnection.class.php";
    require_once "classes\HTMLPage.class.php";

    $IndexPg = new IndexPage(">>>Ваш заказ");
    
    $db = new DBConnection();
    $db->initDBParams();
    $orders = new Orders();
    $orders->db = $db;
    
    $order_id="-1";
        if (isset($_REQUEST["order_id"]))    {
               $order_id=$_REQUEST["order_id"]; 
    }
    
    echo "<!DOCTYPE>
        <html>";
    $IndexPg->writeHeader();
        
    echo "<body>";    
    
    echo $orders->GetOrderPrintForm($order_id);
    
    echo "</body></html>";

?>