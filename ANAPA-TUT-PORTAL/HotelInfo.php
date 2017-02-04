<?php
       function out_price($room_price, $person_price) {
	      $out_price_str="";
	      if (($room_price>100)&&($room_price<10000)) {
		     $out_price_str.=(" от ".$room_price." руб. за номер в день");
	      }
	      if (($person_price>100)&&($person_price<10000)) {
		     $out_price_str.=(" от ".$person_price." руб. за человека в день");
	      }
	      if ($out_price_str=="")
	        $out_price_str=" см. описание или по договоренности";
	      print $out_price_str;	
       }
       
       function out_analog_links($room_price, $person_price, $sregion_id) {
	      $out_price_str="";
	      if (($room_price>100)&&($room_price<10000)) {
		     //$out_price_str.=(" от ".$room_price." руб. за номер в день");
	      }
	      if (($person_price>100)&&($person_price<10000)) {
		     printf ("<a href='#' onClick='SearchHotels(-1,-1,-1,%s,0,0,9);'>Найти по той же цене или ниже</a><br/>", $person_price);
		     //$out_price_str.=(" от ".$person_price." руб. за человека в день");
	      }
	      if ($sregion_id>0)
	        {
		     printf ("<a href='#' onClick='SearchHotels(-1,%s,-1,-1,0,0,9);'>Найти в том же районе</a><br/>", $sregion_id);
		     //printf ("<a href='#' onClick='SearchHotels(-1,%s,-1,-1,0,0,9);'>Показать фотографии района</a><br/>", $sregion_id);
		}     
	      print $out_price_str;	
       }
       
       function GetHotelOptions($hotel_id) {
	      $f=fopen("cgi-bin/ini.txt","r");
                             $dbhostname=trim(fgets($f));
                             $dbname=trim(fgets($f));
                             $dbuser=trim(fgets($f));
                             $dbpsw=trim(fgets($f));
                           fclose($f);                          
                           
                           $link = mysql_connect($dbhostname, $dbuser, $dbpsw)
                             or die("Не удалось установить соединение с сервером баз данных!");
	      mysql_select_db($dbname) 
                             or die("Невозможно открыть базу данных!");

       $query = "SELECT * FROM HOTELS_OPTIONS ho,  SERVICE_OPTIONS so WHERE (ho.hotel_num=$hotel_id) AND (ho.so_id = so.so_id)";
       mysql_query("SET NAMES 'cp1251'");
       $result = mysql_query($query) or die("Неудачный запрос перечня опций объекта!");
       while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
	   printf ("\t\t<img src='%s' alt='%s' title='%s' style='height:23px;width:23px;'/>\n",$row["filename"],$row["name"],$row["name"]);
	      }
       }
       
       header("Content-type: text/plain; charset=windows-1251");

    /* ID отображаемых гостиниц */
	if (isset($_GET['hotel_id'])) 
	    $hotel_id=$_GET['hotel_id'];	
	else 
	    $hotel_id=-1;
	    
    /* Соединение, выбор БД */
    $f=fopen("cgi-bin/ini.txt","r");
                             $dbhostname=trim(fgets($f));
                             $dbname=trim(fgets($f));
                             $dbuser=trim(fgets($f));
                             $dbpsw=trim(fgets($f));
                           fclose($f);                          
                           
                           $link = mysql_connect($dbhostname, $dbuser, $dbpsw)
                             or die("Не удалось установить соединение с сервером баз данных!");
    mysql_select_db($dbname) 
                             or die("Невозможно открыть базу данных!");

      $query = "SELECT * FROM HOTELS WHERE (hotel_num=".$hotel_id.")";

    /* Выполнение SQL query */
    mysql_query("SET NAMES 'cp1251'");
    $result = mysql_query($query) or die("Неудачный запрос информации об объекте!");
    $row_count = mysql_num_rows($result);
    
      print "<table border='0' class='blog_base' align='center' valign='top' cellspacing='2' width='100%'>\n";
      /* Печать результатов в HTML */	 
	while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
		  printf ("\t\t<tr valign=center><td valign='top' style='width:200px;'><div class='img_shadow'><img src='%s'/></div></td><td align='left' valign='top' style='width:500px;'><b>Цена:",$row["presents_i_name"]);
		  out_price($row["min_price_room"],$row["min_prise_pers"]);
		  print "</b><br/><b>Опции:";
		  GetHotelOptions($row["hotel_num"]);
		  printf ("</b><br/><b>Контактное лицо:</b> %s<br/>\n",$row["contact_info"]);
		  out_analog_links($row["min_price_room"],$row["min_prise_pers"],$row["SREGION_ID"]);
		  print "</td></tr>\n";
		  printf ("\t\t<tr valign=center><td valign='top' colspan='2'>%s</td></tr>\n",$row["comment"]);
		  printf ("<div id='object_id' style='display:none;'>%s</div>",$row["hotel_num"]);
		  }
      print "</table>\n";


    /* Освобождение resultset */
    mysql_free_result($result);

    /* Закрытие соединения */
    mysql_close($link);
    
       
    ?>
<?php include("templates/SendToOwnerPanel.php"); ?>