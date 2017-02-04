<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Products   {
    
    public $db=null;

    function GetCatProducts($cat_id)  {
        $products_html="";
        
        $products = array();
        $products = $this->db->sendSQLDQLRequest("SELECT * FROM PRODUCTS WHERE CAT_ID=".$cat_id);
        
        $products_html .= "<table><tr><td>Категория</td><td>Ниаменование</td><td>Цена</td><td>+</td></tr>";
        if(sizeof($products)>0) {
            
            for($i=0;$i<sizeof($products);$i++)   {
                $products_html .= "<tr><td>".$products[$i]['MARK_NAME']."</td><td>".$products[$i]['PRODUCT_NAME'].
                        "</td><td>".$products[$i]['PRICE']."</td><td><a onclick=\"addToCard(".$products[$i]['PRODUCT_ID'].")\" href=\"#\">В корзину</a></td></tr>";
            }

           }
           
        $products_html .= "</table>";
        
        return $products_html;
    }
    
    function GetCardProducts()  {
        
        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        
        $products_html="";
        
        $products = array();
        $products = $this->db->sendSQLDQLRequest("SELECT * FROM PRODUCTS pr, POSITION ps WHERE SESSION_ID='".session_id().
                "' and ps.PRODUCT_ID=pr.PRODUCT_ID and ps.ORDER_ID=-1");
        
        $card_summ = $this->db->sendSQLDQLRequest("SELECT SUM(pr.PRICE) as card_summ FROM PRODUCTS pr, POSITION ps WHERE SESSION_ID='".session_id().
                "' and ps.PRODUCT_ID=pr.PRODUCT_ID and ps.ORDER_ID=-1");
        
        $products_html .= "<b>ЗАКАЗ</b><br/><table><tr><td>Категория</td><td>Ниаменование</td><td>Цена</td><td>+</td></tr>";
        if(sizeof($products)>0) {
            
            for($i=0;$i<sizeof($products);$i++)   {
                $products_html .= "<tr><td>".$products[$i]['MARK_NAME']."</td><td>".$products[$i]['PRODUCT_NAME'].
                        "</td><td>".$products[$i]['PRICE']."</td><td><a onclick=\"addToCard(".$products[$i]['PRODUCT_ID'].")\" href=\"#\">В корзину</a></td></tr>";
            }

           }
           
        $products_html .= "</table>";
        $products_html .= "<b>ИТОГО: {$card_summ[0]['card_summ']} руб.</b>".
            "<br/><br/><br/><a href=\"index.php?view_mode=order_create\" class=\"a_base\">Заказать</a>";
        
        return $products_html;
    }
    
//    function GetOrderPrintForm()  {
//        
//        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
//        
//        $products_html="";
//        
//        $products = array();
//        $products = $this->db->sendSQLDQLRequest("SELECT * FROM PRODUCTS pr, POSITION ps WHERE SESSION_ID='".session_id().
//                "' and ps.PRODUCT_ID=pr.PRODUCT_ID");
//        
//        $card_summ = $this->db->sendSQLDQLRequest("SELECT SUM(pr.PRICE) as card_summ FROM PRODUCTS pr, POSITION ps WHERE SESSION_ID='".session_id().
//                "' and ps.PRODUCT_ID=pr.PRODUCT_ID");
//        
//        $products_html .= "<b>СЧЕТ №</b><br/><table border=\"1\"><tr><td>Категория</td><td>Ниаменование</td><td>Цена</td></tr>";
//        if(sizeof($products)>0) {
//            
//            for($i=0;$i<sizeof($products);$i++)   {
//                $products_html .= "<tr><td>".$products[$i]['MARK_NAME']."</td><td>".$products[$i]['PRODUCT_NAME'].
//                        "</td><td>".$products[$i]['PRICE']."</td></tr>";
//            }
//
//           }
//           
//        $products_html .= "</table>";
//        $products_html .= "<b>ИТОГО: {$card_summ[0]['card_summ']} руб.</b>".
//            "<br/><br/><br/>Покупатель____________________Продавец________________";
//        
//        return $products_html;
//    }
    
    function addNewProduct($cat_id,$pr_name,$pr_price,$pr_mark) {
            
            $this->db->sendSQLDMLRequest("INSERT INTO PRODUCTS (CAT_ID, PRODUCT_NAME, PRICE, MARK_NAME) "
                . " VALUES ({$cat_id},'{$pr_name}',{$pr_price},'{$pr_mark}')");
    
            return "INSERT INTO PRODUCTS (CAT_ID, PRODUCT_NAME, PRICE, MARK_NAME) "
                . " VALUES ({$cat_id},'{$pr_name}',{$pr_price},'{$pr_mark}')";
        
                
        }
        
     function SearchProducts($like_str)  {
        $products_html="";
        
        $products = array();
        $products = $this->db->sendSQLDQLRequest("SELECT * FROM PRODUCTS WHERE PRODUCT_NAME LIKE '%".$like_str."%'");
        
        $products_html .= "<table><tr><td>Категория</td><td>Ниаменование</td><td>Цена</td><td>+</td></tr>";
        if(sizeof($products)>0) {
            
            for($i=0;$i<sizeof($products);$i++)   {
                $products_html .= "<tr><td>".$products[$i]['MARK_NAME']."</td><td>".$products[$i]['PRODUCT_NAME'].
                        "</td><td>".$products[$i]['PRICE']."</td><td><a onclick=\"addToCard(".$products[$i]['PRODUCT_ID'].")\" href=\"#\">В корзину</a></td></tr>";
            }

           }
           
        $products_html .= "</table>";
        
        return $products_html;
    }
    
}

?>