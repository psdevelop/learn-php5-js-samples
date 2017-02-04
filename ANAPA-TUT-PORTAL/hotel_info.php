<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="ru" xml:lang="ru">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>ГОСТЕВЫЕ ДОМА</title>

<link href="styles/main_frame.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0">
<table width="100%" border="0" class="hotel_info_text">
  
  <tr>
    
    <td nowrap >
    <?php 

    /* Извлечение идентификатора отеля */
   $hotel_num=$HTTP_GET_VARS['hotel_num'];

    
	/* Количество гостиниц в строке */
    $row_hotels_count=3; 
    $row_counter=1;   

	/* Соединение, выбор БД */
    $link = mysql_connect("localhost", "root", "")
        or die("Could not connect");
    
    mysql_select_db("ANAPATUT") or die("Could not select database");

    /* Выполнение SQL query */
    $query = "SELECT * FROM HOTELS WHERE hotel_num=$hotel_num";
    $result = mysql_query($query) or die("Query SELECT * FROM HOTELS WHERE hotel_num=$hotel_num");
    if ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
            print "<table width=600  border=0>\n";
            /* Наименование, рисунок */
            print "\t<tr>\n";
            print "\t\t<td  valign=top><table width=600 border=0>\n";
            print "\t\t\t<tr>\n";
            printf ("\t\t\t\t<td rowspan=6 width=200><img src=images/%s.jpg width=200 height=133 /></td>\n",$row["presents_i_name"]);
            printf ("\t\t\t\t<td width=400>%s</td>\n",$row["name"]);
            print "\t\t\t</tr>\n";
            /* Адрес */
            print "\t\t\t<tr>\n";
            printf ("\t\t\t\t<td>Адрес: %s</td>\n",$row["adress"]);
            print "\t\t\t</tr>\n"; 
            /* Телефоны */
            print "\t\t\t<tr>\n";
            printf ("\t\t\t\t<td>Телефоны: %s</td>\n",$row["phone"]);
            print "\t\t\t</tr>\n"; 
            /* Электронная почта */
            print "\t\t\t<tr>\n";
            printf ("\t\t\t\t<td>Адрес электронной почты: %s</td>\n",$row["e_mail"]);
            print "\t\t\t</tr>\n"; 
            /* Сайт */
            print "\t\t\t<tr>\n";
            printf ("\t\t\t\t<td>Адрес в Интернете: %s</td>\n",$row["web"]);
            print "\t\t\t</tr>\n"; 
			/* Расстояние */
            print "\t\t\t<tr>\n";
            printf ("\t\t\t\t<td>Расстояние: %s</td>\n",$row["distance"]);
            print "\t\t\t</tr>\n"; 

            $rooms_query = "SELECT * FROM ROOMS r, OPTIONS_LEVEL ol WHERE (r.hotel_num=$hotel_num) and (r.ol_id=ol.ol_id)";
            $rooms_result = mysql_query($rooms_query) or 
            die("Неудачный запрос номеров(классов) отеля!");            
            
            $image_rooms_query = "SELECT ic.filename FROM ROOMS r, IMAGE_CONTENT ic WHERE 
            (r.hotel_num=$hotel_num) and (r.rooms_id=ic.rooms_id)";
            $image_rooms_result = mysql_query($image_rooms_query) or 
            die("Неудачный запрос изображений номеров!");
            
            $rooms_row=mysql_fetch_array($rooms_result, MYSQL_BOTH);
            $image_rooms_row=mysql_fetch_array($image_rooms_result, MYSQL_BOTH);
            if($rooms_row or $image_rooms_row) { 
              print "\t\t\t<tr>\n";
              print "\t\t\t\t<td>Номера:</td>\n";
              print "\t\t\t\t<td>&nbsp;</td>\n";
              print "\t\t\t</tr>\n";
                }
              print "\t\t</table>\n";
         
              if($rooms_row) {
              print "\t\t<table width=100% border=0>\n";
              /* Цикл вывода наименований (классов) номеров */
                 do {
                         print "\t\t\t<tr>\n";
                         printf ("\t\t\t\t<td>%s: %s</td>\n",$rooms_row["name"],$rooms_row["comment"]);
                         print "\t\t\t</tr>\n";
                      } while($rooms_row=mysql_fetch_array($rooms_result, MYSQL_BOTH));
              print "\t\t</table>\n";
                   }

            if($image_rooms_row) {  
              print "\t\t<table width=100% border=0>\n";
              print "\t\t\t<tr>\n";
              print "\t\t\t\t<td>\n";
              /* Цикл вывода фотографий номеров */
                   do {
                         printf ("\t\t\t\t\t<img src=images/rooms/%s.jpg width=150/>\n",$image_rooms_row["filename"]);
                      } while($image_rooms_row=mysql_fetch_array($image_rooms_result, MYSQL_BOTH));
              print "\t\t\t\t</td>\n";
              print "\t\t\t</tr>\n";
              print "\t\t</table>\n";
                  }

            $rooms_options_query = "SELECT so.filename FROM ROOMS r, ROOMS_OPTIONS ro, SERVICE_OPTIONS so 
			                        WHERE (r.hotel_num=$hotel_num) and (r.rooms_id=ro.rooms_id) and (ro.so_id=so.so_id)";
            $rooms_options_result = mysql_query($rooms_options_query) or 
            die("Неудачный запрос опций номеров(классов) отеля!");
            $rooms_options_row=mysql_fetch_array($rooms_options_result, MYSQL_BOTH);
			
			if($rooms_options_row) {
			  /* Опции номеров*/
              print "\t\t<table width=600 border=0>\n";
              print "\t\t\t<tr>\n";
              print "\t\t\t\t<td width=153 valign=top>Опции номеров:</td>\n";
              print "\t\t\t\t<td width=437 valign=top>\n";
              /*Фотографии опций номеров*/
                   do {
                         printf ("\t\t\t\t\t<img src=images/hotel_options/rooms_options/%s.jpg width=75/>\n",
						         $rooms_options_row["filename"]);
                      } while($rooms_options_row=mysql_fetch_array($rooms_options_result, MYSQL_BOTH));
              print "\t\t\t\t</td>\n";
              print "\t\t\t</tr>\n";
              print "\t\t</table>\n";
			    }
			  
            print "\t\t</td>\n";
            print "\t</tr>\n";

            /*Питание*/
            print "\t<tr>\n";
            print "\t\t<table width=600 border=0 valign=top>\n";
            print "\t\t\t<tr>\n";
            /*Текстовка про питание*/
            printf ("\t\t\t\t<td valign=top width=400>%s\n",$row["eat_comment"]);
            print "\t\t\t\t</td>\n";
            print "\t\t\t\t<td valign=top width=200>\n";
            /*Фотография столовой*/
            printf ("\t\t\t\t\t<img src=images/%s.jpg alt='[%s.jpg]' width=200 height=133/>\n",$row["cafe_filename"],$row["cafe_filename"]);
            print "\t\t\t\t</td>\n";
            print "\t\t\t</tr>\n";
            print "\t\t</table>\n";
            print "\t</tr>\n";

            $hotel_opt_query = "SELECT * FROM HOTELS_OPTIONS ho, SERVICE_OPTIONS so 
                                          WHERE (ho.hotel_num=$hotel_num) and (ho.so_id=so.so_id)";
            $hotel_opt_result = mysql_query($hotel_opt_query) or 
            die("Неудачный запрос опций отеля!"); 
            $hotel_opt_row=mysql_fetch_array($hotel_opt_result, MYSQL_BOTH);
            if($hotel_opt_row) {
              /*Опции отеля*/
              print "\t<tr>\n";
              print "\t\t<table width=600 border=0 class=hotel_info_text>\n";
              print "\t\t\t<tr>\n";
              print "\t\t\t\t<td width=153 valign=top>Опции отеля:\n";
              print "\t\t\t\t</td>\n";
              print "\t\t\t\t<td width=437 valign=top>\n";
              /*Фотографии опций отеля*/
                 do {
                         printf ("\t\t\t\t\t<img src=images/hotel_options/%s.jpg width=75 />\n",
						        $hotel_opt_row["filename"]);
                      } while($hotel_opt_row=mysql_fetch_array($hotel_opt_result, MYSQL_BOTH));
              print "\t\t\t\t</td>\n";
              print "\t\t\t</tr>\n";
              print "\t\t</table>\n";
              print "\t</tr>\n";
              print "</table>\n";
                 }

         }
    else
        print "Не найдена запись данного отеля\n";
    
    

    /* Освобождение resultset */
    mysql_free_result($result);

    /* Закрытие соединения */
    mysql_close($link);
       
    ?>
    
    </td>
    
  </tr>
</table>

</body>
</html>
