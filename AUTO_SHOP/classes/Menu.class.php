<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "/../classes\DBConnection.class.php";

abstract class Menu {
    abstract function GetMenu();
}

class NavigationMenu extends Menu   {
    
    public $db=null;
    
    function GetMenu() {
        $cats_html = "<div id=\"navcontainer\">";
        $cats = array();
        $cats = $this->db->sendSQLDQLRequest("SELECT * FROM CATEGORY");    
        
        if(sizeof($cats)>0) {
            $cats_html .= "<ul id=\"navlist\">";
            for($i=0;$i<sizeof($cats);$i++)   {
                
                $cats_html .= "<li><a onclick=\" loadCatProducts(".$cats[$i]['CAT_ID']."); \" href=\"#\" >".$cats[$i]['CAT_NAME']."</a></li>";
                
            }
            $cats_html .= "</ul>";
        }
        
        return $cats_html;
    }
    
    function GetHorMenu() {
        return "<div id=\"navcontainer2\"><ul>
                <li><a href=\"index.php\">Главная</a></li>
                <li><a href=\"index.php?view_mode=mail\" >Контакты</a></li>
                <li><a onclick=\"\" href=\"index.php?view_mode=all_news\" >Новости</a></li>
             </ul>";
    }
    
    function GetSelectMenu() {
        $cats_html = "";
        $cats = array();
        $cats = $this->db->sendSQLDQLRequest("SELECT * FROM CATEGORY");    
        
        if(sizeof($cats)>0) {
            $cats_html .= "<select id=\"cat_sel\" class=\"base\">";
            for($i=0;$i<sizeof($cats);$i++)   {
                
                $cats_html .= "<option value=\"".$cats[$i]['CAT_ID']."\">".$cats[$i]['CAT_NAME']."</option>";
                
            }
            $cats_html .= "</select>";
        }
        
        return $cats_html;
    }
    
}

?>
