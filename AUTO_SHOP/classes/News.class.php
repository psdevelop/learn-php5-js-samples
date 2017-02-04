<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//require_once "classes\DBConnection.class.php";

class News   {
    
    public $db=null;
    
    
    function GetNews() {
        $news_html = "";
        $news = array();
        $news = $this->db->sendSQLDQLRequest("SELECT * FROM NEWS");    
        
        if(sizeof($news)>0) {
        
            $news_html .= "<table>";
            
            for($i=0;$i<sizeof($news);$i++)   {
                
                $news_html .= "<tr><td>";
                
                $news_html .= "<div class=\"news_header\">".$news[$i]['NEWS_HEAD']."<br/></div>";
                $news_html .= "<div class=\"news_short_text\">".$news[$i]['NEWS_TEXT'].
                            "<br/><a onclick=\" loadNews({$news[$i]['NEWS_ID']}); \" href=\"#\">Подробнее...</a></div>";
                $news_html .= "<div class=\"news_bottom\"><table><tr><td class=\"news_bottom\"><b>Добавлено:</b> ".$news[$i]['DATA'].
                        " </td><td class=\"news_bottom\" valign=\"top\"><b>Автор:</b> ".$news[$i]['AUTHOR']."</td></tr></table></div>";
                
                $news_html .= "</td></tr>";
            }
            
            $news_html .= "</table>";
        }
        
        return $news_html;
    }
    
    function GetNewsById($news_id)  {
        $news_html="";
        
        $news = array();
        $news = $this->db->sendSQLDQLRequest("SELECT * FROM NEWS WHERE NEWS_ID=".$news_id);
        
        if(sizeof($news)>0) {
           $news_html .= "<div><h2>{$news[0]['NEWS_HEAD']}</h2><p>{$news[0]['NEWS_TEXT']}</p></div>"; 
           $news_html .= "<div><table width=\"100%\"><tr><td class=\"news_bottom_cental\"><b>Добавлено:</b> ".$news[0]['DATA'].
                        " </td><td class=\"news_bottom_central\" valign=\"top\"><b>Автор:</b> ".$news[0]['AUTHOR']."</td></tr></table></div>";
           
           }
        
        return $news_html;
    }
    
    function GetAllNews()  {
        $news_html="";
        
        $news = array();
        $news = $this->db->sendSQLDQLRequest("SELECT * FROM NEWS");
        
        if(sizeof($news)>0) {
            
           $news_html .= "<table>";
           
           for($i=0;$i<sizeof($news);$i++)  {
            
           $news_html .= "<tr><td><div><h2>{$news[$i]['NEWS_HEAD']}</h2><p>{$news[$i]['NEWS_TEXT']}</p></div>"; 
           $news_html .= "<div><table width=\"100%\"><tr><td class=\"news_bottom_cental\"><b>Добавлено:</b> ".$news[$i]['DATA'].
                        " </td><td class=\"news_bottom_central\" valign=\"top\"><b>Автор:</b> ".$news[$i]['AUTHOR'].
                        "</td></tr></table></div></td></tr>";
           }
           
           $news_html .= "</table>";
           
           }
        
        return $news_html;
    }
}

?>
