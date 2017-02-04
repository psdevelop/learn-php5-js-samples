<?php

/**
 * @author Poltarokov SP
 * @copyright 2011
 */

require_once("classes/navigation_menu.class.php");

class MainMenuClass extends NavigationMenu  {
    
    function __construct()  {
        parent::__construct("myslidemenu", "jqueryslidemenu");
    }
    
    function writeMenu()    {
        $this->addChildItemJSAndHref("Аэропорты", "", "", "", "index.php?class_name=AirPoint");
        $this->addChildItemJSAndHref("Маршруты", "", "", "", "index.php?class_name=Flight");
        $this->addChildItemJSAndHref("Расписания", "", "", "", "index.php?class_name=Shedule");
		$this->addChildItemJSAndHref("Проездные докуметы", "", "", "", "index.php?class_name=Ticket");
        $oth_dict_menu = $this->addChildItemJS("Справочники", "", "", "");
        $oth_dict_menu->addChildItemJSAndHref("Страны", "", "", "", "index.php?class_name=Country");
		$oth_dict_menu->addChildItemJSAndHref("Авиакомпании", "", "", "", "index.php?class_name=Company");
        $oth_dict_menu->addChildItemJSAndHref("Транспорт", "", "", "", "index.php?class_name=AirType");
        $this->addChildItemJSAndHref("Администрирование", "", "", "", "index.php?class_name=User");
        //$this->addChildItemJS("Настройки", "", "", "");
        $this->addChildItemJSAndHref("Выход", "", "", "", "index.php?action=logout");
        echo "<div class=\"main_menu_default\">";
        $this->generateMenu();
        echo "</div>";
    }
}

?>