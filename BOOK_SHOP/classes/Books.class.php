<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Books   {
    
    public $db=null;

    function GetLangGenBooks($lang_id, $genre_id)  {
        $books_html="";
        
        $books = array();
        $books = $this->db->sendSQLDQLRequest("SELECT bk.*, gn.GENRE_NAME, ln.LANG_NAME FROM BOOKS bk, LANGUAGES ln, GENRES gn"
                . " WHERE bk.LANG_ID=".$lang_id." and bk.GENRE_ID=".$genre_id." and "
                . "bk.GENRE_ID=gn.GENRE_ID and bk.LANG_ID=ln.LANG_ID");
        
        $books_html .= "<table><tr><td>Язык</td><td>Жанр</td><td>Ниаменование</td><td>Цена</td><td>+</td></tr>";
        if(sizeof($books)>0) {
            
            for($i=0;$i<sizeof($books);$i++)   {
                $books_html .= "<tr><td>".$books[$i]['LANG_NAME']."</td><td>".
                        $books[$i]['GENRE_NAME']."</td><td>".$books[$i]['BOOK_NAME'].
                        "</td><td>".$books[$i]['PRICE']."</td><td><a onclick=\"addToCard(".
                        $books[$i]['BOOK_ID'].")\" href=\"#\">В корзину</a></td></tr>";
            }

           }
           
        $books_html .= "</table>";
        
        return $books_html;
    }
    
    function GetCardBooks()  {
        
        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        
        $books_html="";
        
        $books = array();
        $books = $this->db->sendSQLDQLRequest("SELECT bk.*, gn.GENRE_NAME, ln.LANG_NAME "
                . "FROM BOOKS bk, POSITION ps, LANGUAGES ln, GENRES gn WHERE ps.SESSION_ID='".session_id().
                "' and ps.BOOK_ID=bk.BOOK_ID and bk.GENRE_ID=gn.GENRE_ID and bk.LANG_ID=ln.LANG_ID AND ps.ORDER_ID=-1");
        
        $card_summ = $this->db->sendSQLDQLRequest("SELECT SUM(bk.PRICE) as card_summ "
                . "FROM BOOKS bk, POSITION ps, LANGUAGES ln, GENRES gn WHERE ps.SESSION_ID='".session_id().
                "' and ps.BOOK_ID=bk.BOOK_ID and bk.GENRE_ID=gn.GENRE_ID and bk.LANG_ID=ln.LANG_ID AND ps.ORDER_ID=-1");
        
        $books_html .= "<b>ЗАКАЗ</b><br/><table><tr><td>Язык</td><td>Жанр</td><td>Наименование</td><td>Цена</td><td>+</td></tr>";
        if(sizeof($books)>0) {
            
            for($i=0;$i<sizeof($books);$i++)   {
                $books_html .= "<tr><td>".$books[$i]['LANG_NAME']."</td><td>".
                        $books[$i]['GENRE_NAME']."</td><td>".$books[$i]['BOOK_NAME'].
                        "</td><td>".$books[$i]['PRICE']."</td><td><a onclick=\"addToCard(".
                        $books[$i]['BOOK_ID'].")\" href=\"#\">В корзину</a></td></tr>";
            }

           }
           
        $books_html .= "</table>";
        $books_html .= "<b>ИТОГО: {$card_summ[0]['card_summ']} руб.</b>"
        . "<br/><br/><br/><a href=\"index.php?view_mode=order_create\" class=\"a_base\">Заказать</a>";
        
        return $books_html;
    }
    
//    function GetOrderPrintForm()  {
//        
//        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
//        
//        $books_html="";
//        
//        $books = array();
//        $books = $this->db->sendSQLDQLRequest("SELECT bk.*, gn.GENRE_NAME, ln.LANG_NAME "
//                . "FROM BOOKS bk, POSITION ps, LANGUAGES ln, GENRES gn WHERE ps.SESSION_ID='".session_id().
//                "' and ps.BOOK_ID=bk.BOOK_ID and bk.GENRE_ID=gn.GENRE_ID and bk.LANG_ID=ln.LANG_ID");
//        
//        $card_summ = $this->db->sendSQLDQLRequest("SELECT SUM(bk.PRICE) as card_summ "
//                . "FROM BOOKS bk, POSITION ps, LANGUAGES ln, GENRES gn WHERE ps.SESSION_ID='".session_id().
//                "' and ps.BOOK_ID=bk.BOOK_ID and bk.GENRE_ID=gn.GENRE_ID and bk.LANG_ID=ln.LANG_ID");
//        
//        $books_html .= "<b>Счет №</b><br/><table border=\"1\"><tr><td>Язык</td><td>Жанр</td><td>Наименование</td><td>Цена</td></tr>";
//        if(sizeof($books)>0) {
//            
//            for($i=0;$i<sizeof($books);$i++)   {
//                $books_html .= "<tr><td>".$books[$i]['LANG_NAME']."</td><td>".
//                        $books[$i]['GENRE_NAME']."</td><td>".$books[$i]['BOOK_NAME'].
//                        "</td><td>".$books[$i]['PRICE']."</td></tr>";
//            }
//
//           }
//           
//        $books_html .= "</table>";
//        $books_html .= "<b>ИТОГО: {$card_summ[0]['card_summ']} руб.</b>"
//        . "<br/><br/><br/>Покупатель____________________Продавец________________";
//        
//        return $books_html;
//    }
    
    function addNewBook($lang_id,$bk_name,$bk_price,$genre_id, $bk_maker, $bk_year, $bk_authors) {
            
            $this->db->sendSQLDMLRequest("INSERT INTO BOOKS (BOOK_NAME, PRICE, LANG_ID, GENRE_ID, MAKER, YEAR, AUTHORS) "
                . " VALUES ('{$bk_name}',{$bk_price},{$lang_id},{$genre_id},'{$bk_maker}',{$bk_year},'{$bk_authors}')");
    
            return "INSERT INTO BOOKS (BOOK_NAME, PRICE, LANG_ID, GENRE_ID, MAKER, YEAR, AUTHORS) "
                . " VALUES ('{$bk_name}',{$bk_price},{$lang_id},{$genre_id},'{$bk_maker}',{$bk_year},'{$bk_authors}')";
        
                
        }
    
     function GetSearchBooks($like_str)  {
        
        $books_html="";
        
        $books = array();
        $books = $this->db->sendSQLDQLRequest("SELECT bk.*, gn.GENRE_NAME, ln.LANG_NAME "
                . "FROM BOOKS bk, LANGUAGES ln, GENRES gn WHERE BOOK_NAME LIKE '%{$like_str}%'".
                " and bk.GENRE_ID=gn.GENRE_ID and bk.LANG_ID=ln.LANG_ID");
        
        $books_html .= "Результат поиска<br/><table><tr><td>Язык</td><td>Жанр</td><td>Наименование</td><td>Цена</td><td>+</td></tr>";
        if(sizeof($books)>0) {
            
            for($i=0;$i<sizeof($books);$i++)   {
                $books_html .= "<tr><td>".$books[$i]['LANG_NAME']."</td><td>".
                        $books[$i]['GENRE_NAME']."</td><td>".$books[$i]['BOOK_NAME'].
                        "</td><td>".$books[$i]['PRICE']."</td><td><a onclick=\"addToCard(".
                        $books[$i]['BOOK_ID'].")\" href=\"#\">В корзину</a></td></tr>";
            }

           }
           
        $books_html .= "</table>";
        
        return $books_html;
    }   
     
}

?>