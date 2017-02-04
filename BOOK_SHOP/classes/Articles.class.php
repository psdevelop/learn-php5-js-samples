<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "classes\DBConnection.class.php";

class Articles   {
    
    public $db=null;
    
    
    function GetArticles() {
        $articles_html = "";
        $articles = array();
        $articles = $this->db->sendSQLDQLRequest("SELECT * FROM ARTICLES");    
        
        if(sizeof($articles)>0) {
            
            for($i=0;$i<sizeof($articles);$i++)   {
                
                $articles_html .= "<div class=\"article\"><h1>".$articles[$i]['TITLE']."</h1>";
                $articles_html .= "<p>".$articles[$i]['FULL_TEXT']."</p>";
                //                <a onclick=\" startLoader(); \" href=\"index.php?view_mode=news&news_id={$news[$i]['NEWS_ID']}\">Подробнее...</a></div>";
                $articles_html .= "<div class=\"article_foother\"><table><tr><td class=\"\"><b>Добавлено:</b> ".$articles[$i]['ADD_DATE'].
                        " </td><td class=\"\" valign=\"top\"><b>Автор:</b> </td></tr></table></div></div>";
                
            }
            
        }
        
        return $articles_html;
    }
    
    function GetArticle($article_id)  {
        $articles_html="";
        
        $articles = array();
        $articles = $this->db->sendSQLDQLRequest("SELECT * FROM ARTICLES WHERE ARTICLE_ID=".$article_id);
        
        if(sizeof($articles)>0) {
           $articles_html .= "<div class=\"article\"><h1>".$articles[$i]['TITLE']."</h1>";
                $articles_html .= "<p>".$articles[$i]['FULL_TEXT']."</p>";
                //                <a onclick=\" startLoader(); \" href=\"index.php?view_mode=news&news_id={$news[$i]['NEWS_ID']}\">Подробнее...</a></div>";
                $articles_html .= "<div class=\"article_foother\"><table><tr><td class=\"\"><b>Добавлено:</b> ".$articles[$i]['ADD_DATE'].
                        " </td><td class=\"\" valign=\"top\"><b>Автор:</b> </td></tr></table></div></div>";
           }
        
        return $articles_html;
    }
}

?>
