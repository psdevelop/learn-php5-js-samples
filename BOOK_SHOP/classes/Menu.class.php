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
        $gens_html = "<div id=\"navcontainer\">";
        $gens = array();
        $gens = $this->db->sendSQLDQLRequest("SELECT * FROM GENRES");    
        
        if(sizeof($gens)>0) {
            $gens_html .= "<ul id=\"navlist\">";
            for($i=0;$i<sizeof($gens);$i++)   {
                
                $gens_html .= "<li><a onclick=\" loadGenreLangBooks(".$gens[$i]['GENRE_ID'].
                        "); \" href=\"#\" >".$gens[$i]['GENRE_NAME']."</a></li>";
                
            }
            $gens_html .= "</ul>";
        }
        
        $langs_html = "";
        $langs = array();
        $langs = $this->db->sendSQLDQLRequest("SELECT * FROM LANGUAGES");    
        
        if(sizeof($langs)>0) {
            $langs_html .= "<select id=\"lang_filt\" class=\"base\">";
            for($i=0;$i<sizeof($langs);$i++)   {
                
                $langs_html .= "<option value=\"".$langs[$i]['LANG_ID']."\">".
                        $langs[$i]['LANG_NAME']."(".$langs[$i]['RUS_NAME'].")</option>";
                
            }
            $langs_html .= "</select>";
        }
        
        return $langs_html."<br/>".$gens_html;
    }
    
    function GetHorMenu() {
        return "<div id=\"navcontainert\"><ul id=\"navlistt\">
                <li><a href=\"index.php\">Главная</a></li>
                <li><a href=\"index.php?view_mode=mail\" >Контакты</a></li>
                <li><a onclick=\"\" href=\"index.php?view_mode=all_news\" >Новости</a></li>
             </ul></div>";
    }
    
    function GetSelectMenu() {
        $langs_html = "";
        $langs = array();
        $langs = $this->db->sendSQLDQLRequest("SELECT * FROM LANGUAGES");    
        
        if(sizeof($langs)>0) {
            $langs_html .= "<select id=\"lang_sel\" class=\"base\">";
            for($i=0;$i<sizeof($langs);$i++)   {
                
                $langs_html .= "<option value=\"".$langs[$i]['LANG_ID']."\">".
                        $langs[$i]['LANG_NAME']."(".$langs[$i]['RUS_NAME'].")</option>";
                
            }
            $langs_html .= "</select>";
        }
        
        $gens_html = "";
        $gens = array();
        $gens = $this->db->sendSQLDQLRequest("SELECT * FROM GENRES");    
        
        if(sizeof($gens)>0) {
            $gens_html .= "<select id=\"genre_sel\" class=\"base\">";
            for($i=0;$i<sizeof($gens);$i++)   {
                
                $gens_html .= "<option value=\"".$gens[$i]['GENRE_ID']."\">".
                        $gens[$i]['GENRE_NAME']."</option>";
                
            }
            $gens_html .= "</select>";
        }
        
        return $langs_html.$gens_html;
    }
    
}

?>
