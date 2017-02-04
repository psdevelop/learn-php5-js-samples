<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "/../classes\DBConnection.class.php";

class Card  {
    
    public $db=null;
    
    function getCardStatus()    {
        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        
        $summ = $this->db->sendSQLDQLRequest("SELECT SUM(PRICE) as CARD_SUMM FROM POSITION ps, PRODUCTS pr WHERE ps.SESSION_ID='"
                .session_id()."' and ps.PRODUCT_ID=pr.PRODUCT_ID AND ORDER_ID=-1");
    
        $view_summ = $summ[0]['CARD_SUMM'];
        if (is_null($view_summ)) $view_summ=0;
        
        return $view_summ;
    }
    
    function addToCard($product_id)  {
        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        
        $this->db->sendSQLDMLRequest("INSERT INTO POSITION (PRODUCT_ID, SESSION_ID) VALUES ({$product_id},'".session_id()."')");
    }
}

?>