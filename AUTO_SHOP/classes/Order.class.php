<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Orders   {
    
    public $db=null;
    
    
    function GetAllOrders($for_session=false) {
        $orders_html = "<b>Сделанные заказы</b><br/>";
        $orders = array();
        
        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        
        if ($for_session)   {
            $orders = $this->db->sendSQLDQLRequest("SELECT * FROM ORDERS WHERE SESSION_ID='".session_id()."'");
        }
        else    {
            $orders = $this->db->sendSQLDQLRequest("SELECT * FROM ORDERS");
        }
        
        if(sizeof($orders)>0) {
        
            $orders_html .= "<table>";
            
            for($i=0;$i<sizeof($orders);$i++)   {
                
                $orders_html .= "<tr><td>";
                
                $orders_html .= $orders[$i]['CDATE']."</td><td>";
                $orders_html .= $orders[$i]['FAMILY']." ".$orders[$i]['NAME']." ".$orders[$i]['SURNAME']."</td><td>";
                $orders_html .= $orders[$i]['ADRES']."</td><td>";
                $orders_html .= "<a onclick=\"  \" href=\"order.php?order_id={$orders[$i]['ORDER_ID']}\" "
                            . "target=\"_blank\" >Подробнее...</a>";
                
                
                $orders_html .= "</td></tr>";
            }
            
            $orders_html .= "</table>";
        }
        
        return $orders_html;
    }
    
    function addNewOrder($family, $name, $surname, $adres, $tr_select)  {
        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        
        $this->db->sendSQLDMLRequest("INSERT INTO ORDERS (SESSION_ID, FAMILY, NAME, SURNAME, ADRES, TR_SELECT) "
                . " VALUES('".session_id()."','{$family}','{$name}','{$surname}','{$adres}', {$tr_select})");
        $last_oid = $this->db->sendSQLDQLRequest("SELECT MAX(ORDER_ID) as MAX_ID FROM ORDERS");
        $max_oid = $last_oid[0]['MAX_ID'];
        $this->db->sendSQLDMLRequest("UPDATE POSITION SET ORDER_ID=".$max_oid." WHERE SESSION_ID='"
                .session_id()."' and ORDER_ID=-1");
    }
    
    function GetOrderPrintForm($order_id)  {
        
        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        
        $products_html="";
        
        $products = array();
        $products = $this->db->sendSQLDQLRequest("SELECT * FROM PRODUCTS pr, POSITION "
                . "ps WHERE ps.ORDER_ID='".$order_id.
                "' and ps.PRODUCT_ID=pr.PRODUCT_ID");
        
        $card_summ = $this->db->sendSQLDQLRequest("SELECT SUM(pr.PRICE) as card_summ "
                . "FROM PRODUCTS pr, POSITION ps WHERE ps.ORDER_ID='".$order_id.
                "' and ps.PRODUCT_ID=pr.PRODUCT_ID");
        
        $products_html .= "<b>СЧЕТ №</b><br/><table border=\"1\"><tr><td>Категория</td>"
                . "<td>Ниаменование</td><td>Цена</td></tr>";
        if(sizeof($products)>0) {
            
            for($i=0;$i<sizeof($products);$i++)   {
                $products_html .= "<tr><td>".$products[$i]['MARK_NAME']."</td><td>".$products[$i]['PRODUCT_NAME'].
                        "</td><td>".$products[$i]['PRICE']."</td></tr>";
            }

           }
           
        $products_html .= "</table>";
        $products_html .= "<b>ИТОГО: {$card_summ[0]['card_summ']} руб.</b>".
            "<br/><br/><br/>Покупатель____________________Продавец________________";
        
        return $products_html;
    }
    
}