<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once "/../classes\Menu.class.php";
    require_once "/../classes\Order.class.php";
    require_once "/../classes\DBConnection.class.php";
    
    $db = new DBConnection();
    $db->initDBParams();
    $sel_menu = new NavigationMenu();
    $sel_menu->db = $db;
    $orders = new Orders();
    $orders->db = $db;
    
    echo "<div><b>ДОБАВЛЕНИЕ ТОВАРА</b><br/>Категория".$sel_menu->GetSelectMenu().
            "Наименование продукта<input id=\"pr_name\" class=\"base\" style=\"width:100px; padding:3px;\"><br/>"
            . "Цена<input id=\"pr_price\" class=\"base\" style=\"width:100px; padding:3px;\">".
            "Производитель<input id=\"pr_mark\" class=\"base\" style=\"width:100px; padding:3px;\">"
            . "<br/><br/><br/><a class=\"a_base\" onclick=\" addNewProduct(); \" href=\"#\">Добавить</a><div>"
            . "<br/><br/><br/><div id=\"add_result\">Последний результат ---</div>";
    echo $orders->GetAllOrders();

?>