<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "classes\Menu.class.php";
require_once "classes\News.class.php";
require_once "classes\Articles.class.php";
require_once "classes\DBConnection.class.php";

abstract class HTMLPage {

    public $title = "Без названия";
    
    function __construct()    {
            
    }
    
    function writeHeader()   {
        echo "<head>
            <title>{$this->title}</title>
            <link rel=\"javascript\" type=\"text/javascript\" href=\"index.js\">
            <meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\">
            <link rel=\"stylesheet\" type=\"text/css\" href=\"styles\index.css\">
            <link rel=\"stylesheet\" type=\"text/css\" href=\"styles\leftmenu.css\">
            <link rel=\"stylesheet\" type=\"text/css\" href=\"styles\onemenu.css\">
            <script type=\"text/javascript\" src=\"js/jquery-2.0.2.js\"></script>
	    <script type=\"text/javascript\" src=\"js/index.js\"></script>
            </head>";
    }
    
    function writePage()    {
        echo "<!DOCTYPE>
        <html>";
        $this->writeHeader();
        $this->writeBody();
        echo "</html>";
    }
    
    abstract function writeBody();
}

class IndexPage extends HTMLPage    {
    
    public $db = null;
    public $news = null;
    public $articles = null;
            
    function writeBody()   {
        
        function __construct($title_)    {
            parent::__construct();
            $this->title = $title_;
        }
        
        $this->db = new DBConnection();
        $this->db->initDBParams();
        
        $news = new News();
        $news->db = $this->db;
        
        $this->articles = new Articles();
        $this->articles->db = $this->db;
        
        $NavMenu = new NavigationMenu();
        $NavMenu->db = $this->db;
        
        $view_mode="index_page";
        if (isset($_REQUEST["view_mode"]))    {
            
               $view_mode=$_REQUEST["view_mode"]; 
            
        }
        
        if(isset($_REQUEST['submit'])) { 
        // $_POST['title'] содержит данные из поля "Тема", trim() - убираем все лишние пробелы и переносы строк, htmlspecialchars() - преобразует специальные символы в HTML сущности, будем считать для того, чтобы простейшие попытки взломать наш сайт обломались, ну и  substr($_POST['title'], 0, 1000) - урезаем текст до 1000 символов. Для переменной $_POST['mess'] все аналогично 
        $title = substr(htmlspecialchars(trim($_POST['title'])), 0, 1000); 
        $mess =  substr(htmlspecialchars(trim($_POST['mess'])), 0, 1000000); 
        // $to - кому отправляем 
        $to = 'test@test.ru'; 
        // $from - от кого 
        $from='test@test.ru'; 
        // функция, которая отправляет наше письмо. 
        mail($to, $title, $mess, 'From:'.$from);
         
        }
        
        $news_id="-1";
        if (isset($_GET["news_id"]))    {
               $news_id=$_GET["news_id"]; 
        }
        
        if(session_status()!=PHP_SESSION_ACTIVE) session_start();
        
        echo "<body onload=\" on_doc_load(); \">".$NavMenu->GetHorMenu().
            "<div class=\"header\"><table><tr><td width:\"90%\">".
                "</td><td width:\"150px\" background-color:black>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <div id=\"card\">Корзина </div> <a onclick=\" explodeCard(); \" href=\"#\">Список</a> 
                    <a onclick=\" resetCard(); \" href=\"#\">Сброс</a>
                    <a onclick=\" adminLogin(); \" href=\"#\">Admin</a>
                    <a onclick=\" searchBooks(); \" href=\"#\">Поиск</a><table><tr>
                    <td><input id=\"adm_login\" class=\"base\" value=\"admin\" style=\"width:100px; padding:3px;\"></td>
                    <td><input id=\"adm_psw\" class=\"base\" value=\"admin\" style=\"width:100px; padding:3px;\"></input></td>
                    <td><input id=\"like_str\" class=\"base\" value=\"Поиск...\" style=\"width:100px; padding:3px;\"></input></td>
                    </tr></table> </td>
                    <td><img alt=\"\" src=\"images/banner1.jpg\" height=\"100\"></td>
                    <td><img alt=\"\" src=\"images/banner2.jpg\" height=\"100\"></td>
                    <td><img alt=\"\" src=\"images/banner3.jpg\" height=\"100\"></td>
                    </tr></table></div>
            <table border=\"0\" class=\"main_table\">
            <tr>
            <td valign=\"top\" class=\"module_column\">".
                $NavMenu->GetMenu()."</td>
            <td valign=\"top\" class=\"module_center\"><div id=\"mod_center\">";
        if ($view_mode=="index_page")
        echo $this->articles->GetArticles();
        else if ($view_mode=="news")    {
            echo $news->GetNewsById($news_id);
        }
        else if ($view_mode=="all_news")    {
            echo $news->GetAllNews();
        }
        else if ($view_mode=="mail")    {
            echo "<form action=\"index.php?view_mode=mail\" method=post> 
              <p>Наши контакты:<br/>
              г. Тимашевск ул. Зеленая д.96<br/>
              телефоны: 1-00-00, 8-800-100-00-00</p>
              <p>Отправьте нам письмо <p> 
              <div align=\"center\"> 
              Teма<br /> 
              <input type=\"text\" name=\"title\" size=\"40\"><br /> 
              Сообщение<br /> 
              <textarea name=\"mess\" rows=\"10\" cols=\"40\"></textarea> 
              <br /> 
              <input type=\"submit\" value=\"Отправить\" name=\"submit\"></div> 
              </form> ";
            if(isset($_REQUEST['submit']))
            echo 'Спасибо! Ваше письмо отправлено.';
        }
        else if ($view_mode=="order_create")    {
            echo "Фамилия<br/><input class=\"base\" type=\"text\" id=\"family\" size=\"40\"><br />"
            . "Имя<br/><input class=\"base\" type=\"text\" id=\"clname\" size=\"40\"><br />"
            . "Отчество<br/><input class=\"base\" type=\"text\" id=\"surname\" size=\"40\"><br />Способ доставки<br/>"
            . "<select class=\"base\" id=\"tr_select\" onchange=\" if (this.value>0) "
            . "document.getElementById('adr_data').style.display='block'; else "
            . "document.getElementById('adr_data').style.display='none';\"><option value=\"0\" selected>Самовывоз</option>"
                    . "<option value=\"1\">Курьер</option><option value=\"2\">Почта</option></select>"
                    . "<div id=\"adr_data\" style=\"display:none;\">Адрес:<br/>"
                    . "<input class=\"base\" type=\"text\" id=\"adr\" size=\"40\"></div><br/><br/><br/>"
                    . "<a href=\"#\" onclick=\"  createNewOrder(); \" class=\"a_base\" >Отправить "
                    . "данные</a><br/><br/><br/><div id=\"ord_res\"></div>";
        }
        else
        {
            echo "Неизвестный режим вывода!";
        }
        //phpinfo();
        echo "</div></td>
            <td valign=\"top\" class=\"module_column\">".$news->GetNews()."</td>
            </tr></table>
			<div id=\"body_loader_img\"></div>
            <div id=\"s_foother\" class=\"site_foother\"></div>
            </body>";
    }
}
?>
