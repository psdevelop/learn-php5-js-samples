<?php
       
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

    /* Количество гостиниц в строке */
	$row_hotels_count=3;
	$row_counter=1;
	$block_counter=1;
	$where_attach=" (1=1) ";
	$vrating_where_attach=" (1=1) ";
	$in_collection_instruction=" SELECT SERVICE_OPTIONS.so_id FROM SERVICE_OPTIONS, HOTELS_OPTIONS WHERE (HOTELS_OPTIONS.so_id=SERVICE_OPTIONS.so_id) AND (HOTELS_OPTIONS.hotel_num=HOTELS.hotel_num) ";
	
    /* Количество устройств в одном блоке */
    if (isset($_GET['block'])) 
	$block_len=$_GET['block'];  
    else
	$block_len=9;  
      
	/* Номер текущего блока отображения */
	if (isset($_GET['block_num'])) 
	    $block_num=$_GET['block_num'];	
	else 
	    $block_num=0;
	    
	//Номер стартового элемента отображения
	if (isset($_GET['start_num'])) 
	    $start_num=$_GET['start_num'];	
	else 
	    $start_num=1;
        
	/* Длина отображаемого блока */  
	if (isset($_GET['block_len'])) 
		$count=$_GET['block_len'];
	else 	
		$count=3; 
	    
        /* Тип отображаемых гостиниц */  
	if (isset($_GET['htype'])) {
		$h_type=$_GET['htype'];
		if ($h_type!=-1) {
		  $where_attach.=" AND (type=".$h_type.") ";
		  $vrating_where_attach.=" AND (type=".$h_type.") ";
		}
	}
	else 	
		$h_type=-1;
		
	/* Район */  
	if (isset($_GET['region_id'])) {
		$region_id=$_GET['region_id'];
		if ($region_id!=-1)
		  $where_attach.=" AND (SREGION_ID=".$region_id.") ";
	}
	else 	
		$region_id=-1;
		
	/* Расстояние до моря */  
	if (isset($_GET['sea_dist'])) {
		$sea_dist=$_GET['sea_dist'];
		if ($sea_dist!=-1)
		  $where_attach.=" AND (S_DIST_ID =".$sea_dist.") ";
	}
	else 	
		$sea_dist=-1;	
		
	/* Выбранный тип верстки "main_panel_search_result" - результат
	поиска в главной панели (кнопка Искать все), "vertical_rating_panel", "hor_panel"*/  
	if (isset($_GET['output_type'])) 
		$output_type=$_GET['output_type'];
	else 	
		$output_type='main_panel_search_result';
		
	/* Минимальная цена за человека в сутки */  
	if (isset($_GET['min_price_pers'])) {
		$min_price_pers=$_GET['min_price_pers'];
	      	if ($min_price_pers>0)
		  $where_attach.=" AND (min_prise_pers<=".$min_price_pers.") AND (min_prise_pers>0) ";
	}
	else 	
		$min_price_pers=0;
	
	$obj_options=0;
	/* Переменная, побитно заполненная опциями искомого объекта*/  
	if (isset($_GET['obj_options'])) 
		$obj_options=$_GET['obj_options'];
	else 	
		$obj_options=0;
	
	$obj_options = $obj_options>>3;
	/* Разложение на опции */
	
	/*
	1 Интернет 
      2 Душ 
      4 Кондиционер  
      7 Питание 
      8 Цифровое телевидение
      9 Телефон 
      10 Холодильник 
      11 Пляж рядом 
      12 Бильярд 
      13 Ванна с душем 
      14 Телевизор 
      19 Ванная комната 
      20 Стоянка 
      21 Корт 
      22 Бассейн 
      23 Тренажерный зал  
      24 Сауна 
      34 Номера на 1 место 
      29 Свой транспорт 
      30 Ночной клуб 
      31 Магазин рядом 
      33 Есть кухня 
      35 Номера на 2 места
      36 Номера на 3 места и более 
      37 Система сигнализации 
      38 Апартаменты 
      39 Банкетный зал  
      40 Бар 
      41 Пивной бар 
      42 Музыка в номере 
      43 Боулинг 
      44 Кафе свое или рядом  
      45 Мангал (гриль, барбекю) 
      46 Гладильная 
      47 Джакузи, шарко  
      48 Люксы  
      49 Медицинский сервис, лечение  
      50 Микроволновка  
      51 Минибар 
      52 Ночной бар 
      53 Полулюксы  
      54 Компьютер 
      55 Фен (сушилка)  
      56 Сейф в номере 
      57 Сейф у администратора  
      58 Кодовая система охраны  
      59 Туалет в номере 
      60 Солярий 
      61 Видео, DVD-система  
      62 Мягкая мебель  
      63 Рядом парк или своя территория 
	*/
		
	/* Наличие служ. транспорта  */
	$obj_options = $obj_options>>1;
	$has_transport = false;
	if (($obj_options & 1) == 1) {
	  $has_transport = true;
	  $where_attach.=" AND (29 IN (".$in_collection_instruction.")  ) ";
	}
	
	/* Наличие песчаного пляжа  */
	$sand_beach = false;
	if (($obj_options & 1) == 1) {
	  $sand_beach = true;
	  $where_attach.=" AND (11 IN (".$in_collection_instruction.")  ) ";
	}
	
	/* Наличие отд. санузла  */
	$obj_options = $obj_options>>1;
	$separate_bathroom = false;
	if (($obj_options & 1) == 1) {
	  $separate_bathroom = true;
	  $where_attach.=" AND (59 IN (".$in_collection_instruction.")  ) ";
	}  
	  
	/* Поблизости развлечения  */
	$obj_options = $obj_options>>1;
	$near_entertaim = false;
	if (($obj_options & 1) == 1) {
	  $near_entertaim = true;
	  $where_attach.=" AND (30 IN (".$in_collection_instruction.")  ) ";
	}
	  
	/* Сауна  */
	$obj_options = $obj_options>>1;
	$has_saune = false;
	if (($obj_options & 1) == 1) {
	  $has_saune = true;
	  $where_attach.=" AND (24 IN (".$in_collection_instruction.")  ) ";
	}
	
	/* Кондиционер  */
	$obj_options = $obj_options>>1;
	$has_condition = false;
	if (($obj_options & 1) == 1) {
	  $has_condition = true;
	  $where_attach.=" AND (4 IN (".$in_collection_instruction.")  ) ";
	}
	  
	/* Интернет  */
	$obj_options = $obj_options>>1;
	$has_internet = false;
	if (($obj_options & 1) == 1) {
	  $has_internet = true;
	  $where_attach.=" AND (1 IN (".$in_collection_instruction.")  ) ";
	}
	
	/* Цифровое ТВ  */
	$obj_options = $obj_options>>1;
	$has_digit_tv = false;
	if (($obj_options & 1) == 1) {
	  $has_digit_tv = true;
	  $where_attach.=" AND (8 IN (".$in_collection_instruction.")  ) ";
	}
	
	/* Территория, бассейн  */
	$obj_options = $obj_options>>1;
	$has_territory = false;
	if (($obj_options & 1) == 1) {
	  $has_territory = true;
	  $where_attach.=" AND (22 IN (".$in_collection_instruction.")  ) ";
	}
	
	/* Супермаркет */
	$obj_options = $obj_options>>1;
	$near_shop = false;
	if (($obj_options & 1) == 1) {
	  $near_shop = true;
	  $where_attach.=" AND (31 IN (".$in_collection_instruction.")  ) ";
	}
	
	/* Кухня */
	$obj_options = $obj_options>>1;
	$cook = false;
	if (($obj_options & 1) == 1) {
	  $cook = true;
	  $where_attach.=" AND (33 IN (".$in_collection_instruction.")  ) ";
	}
	
	/* Стоянка */
	$obj_options = $obj_options>>1;
	$parking = false;
	if (($obj_options & 1) == 1) {
	  $parking = true;
	  $where_attach.=" AND (20 IN (".$in_collection_instruction.")  ) ";
	}
	
	/* Включенное питание */
	$obj_options = $obj_options>>1;
	$live_feed = false;
	if (($obj_options & 1) == 1) {
	  $live_feed = true;
	  $where_attach.=" AND (7 IN (".$in_collection_instruction.")  ) ";
	}
	
    $row_count=1;
    
    print "<table width='100%' border='0' align=center valign=top>\n";
    print "<tr><td align='center' nowrap>\n";
 
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

    //printf("===%s",$query);
    /* Выполнение SQL query */
    mysql_query("SET NAMES 'cp1251'");
    
    
    /* Печать результатов в HTML */
    /* Если это запрос на основной поиск */
    if ($output_type=='main_panel_search_result') {
    $query = "SELECT * FROM HOTELS WHERE ".$where_attach." ORDER BY group_priority DESC, priority DESC";
    $result = mysql_query($query) or die("Неудачный запрос перечня объектов!");
	$row_count = mysql_num_rows($result);  
    print "<b>Результат поиска</b><BR>\n";
    print "<table width=500  border=0 align=center valign=top>\n";
	while(($block_counter<($block_len*$block_num+1)) and ($row = mysql_fetch_array($result, MYSQL_BOTH))) {
		   $block_counter=$block_counter+1; 		 
		 }
	 $block_counter=1;	 
	 while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
         if ($row_counter==1) { print "\t<tr valign=top><td valign=top>\n"; }
         if (($row_counter>1)and($row_counter<$row_hotels_count)) { print "\t<td valign=top>\n"; }
         if (($row_counter==$row_hotels_count) and ($row_hotels_count>1)) { print "\t<td valign=top>\n"; } 
        print "<table width=160  border=0 valign=top>\n";
		print "\t<tr valign=top>\n";
		printf ("\t\t<td height=120 valign=top><a href='#' onClick='GetHotelInfo(%s); addByHotelClick(%s,\"Search click\");'><div class='img_shadow'><img src='%s' alt='%s' width=160 height=120 valign=top/></div></a></td></tr>\n",$row["hotel_num"],$row["hotel_num"],$row["presents_i_name"],$row["name"]);
		print "\t<tr align=center>\n";
		printf ("\t\t<td  class=image_comment_text valign=top>%s</td>\n",$row["name"]);
		print "\t</tr>\n";
		print "\t<tr align=center valign=top><td>\n";
		GetHotelOptions($row["hotel_num"]);
		print "\t</td></tr>\n";
		print "</table>\n";  
         if ($row_counter==1) { print "\t</td>\n"; }
         if (($row_counter>1)and($row_counter<$row_hotels_count)) { print "\t</td>\n"; }
         if (($row_counter==$row_hotels_count) and ($row_hotels_count>1)) { print "\t</td></tr>\n"; } 
         if ($row_counter>=$row_hotels_count)  { $row_counter=0; }
         $row_counter=$row_counter+1; 
		 $block_counter=$block_counter+1;
		 if ($block_counter>$block_len) { break; }
    }
	
	$block_counter=$block_counter-1;
	if ($block_counter<$block_len) { $has_term=1; }
	else { $has_term=0; }
	$block_counter=$block_counter+$block_num*$block_len;
	if ($block_counter>=$row_count) { $has_term=1; }
    if($row_counter>1) {
       while($row_counter>1) {
          if ($row_counter==1) { print "\t<tr><td>\n"; }
          if (($row_counter>1)and($row_counter<$row_hotels_count)) { print "\t<td>\n"; }
          if (($row_counter==$row_hotels_count) and ($row_hotels_count>1)) { print "\t<td>\n"; }
          if ($row_counter==1) { print "\t</td>\n"; }
          if (($row_counter>1)and($row_counter<$row_hotels_count)) { print "\t</td>\n"; }
          if (($row_counter==$row_hotels_count) and ($row_hotels_count>1)) { print "\t</td></tr>\n"; } 
          if ($row_counter>=$row_hotels_count)  { $row_counter=0; }
          $row_counter=$row_counter+1; 
                 }
         }
    print "</table>\n"; 
	
	print "<table width=150 border=0 align=center class=hotel_navigation_link_text>\n";
	print "\t<tr>\n";
	print "\t\t<td width=50 align=center>\n";
	  if ($block_num==0) { print "|...|\n"; }
	  else {   printf ("<a href='#' onClick='SearchHotels(%s,-1,-1,-1,0,%s,%s);'>",$h_type,$bn=$block_num-1,$block_len);
	           printf ("|%s...%s|",$prev_start=(($block_num-1)*$block_len+1),$prev_end=($block_num*$block_len)); 
			   print "</a>\n";  }
	print "\t\t</td>\n";
	print "\t\t<td width=50 align=center>\n";
	  printf ("|%s...%s|",$start=$block_num*$block_len+1,$block_counter);  
	print "\t\t</td>\n";
	print "\t\t<td width=50 align=center>\n";
	  if ($has_term==1) { print "|...|\n"; }
	  else {  if (($row_count-($block_num+1)*$block_len)<=$block_len) {
	               printf ("<a href='#' onClick='SearchHotels(%s,-1,-1,-1,0,%s,%s);'>",$h_type,$bn=$block_num+1,$block_len);
	               printf ("|%s...%s|",$next_start=$block_counter+1,$row_count); 
				   print "</a>\n";
				   }
			  else   {
			        printf ("<a href='#' onClick='SearchHotels(%s,-1,-1,-1,0,%s,%s);'>",$h_type,$bn=$block_num+1,$block_len);
			        printf ("|%s...%s|",$next_start=$block_counter+1,$next_end=($block_num+2)*$block_len);
					print "</a>\n";
			       }	   
		   }
	print "\t\t</td>\n";
	print "\t</tr>\n";
    print "</table>\n";
    }
    
    if ($output_type=='vertical_rating_panel') {

    $query = "SELECT * FROM HOTELS WHERE ".$vrating_where_attach." ORDER BY rating DESC";
    //printf("===%s",$query);
    /* Выполнение SQL query */
    mysql_query("SET NAMES 'cp1251'");
    $result = mysql_query($query) or die("Неудачный запрос перечня объектов!");
    $row_count = mysql_num_rows($result);
    $num_rows = mysql_num_rows($result);
    $count = 8;
    //print "hhhh$num_rows";
    if($num_rows>0)	{
      print "<table border='0' align='center' valign='top' cellspacing='2' width='200'>\n";
      /* Печать результатов в HTML */
	if ($start_num>=0)  	 
	while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
		//alert("111");
		if ($block_counter>=$start_num)  
		  printf ("\t\t<tr valign=center><td class='rating_comment_text' valign='top'><div class='img_shadow'><img align='left' class='rating_hotel_img' onClick='GetHotelInfo(%s); addByHotelClick(%s,\"Rating proposals\"); ' src='%s' alt='%s'/></div>%s</td></tr>\n",$row["hotel_num"],$row["hotel_num"],$row["pr_vert_sml_img"],$row["name"],$row["short_def"]); 
		$block_counter=$block_counter+1;
		$row_counter=$row_counter+1;
		if ($block_counter>=($count+$start_num))
		  break;
		if ($row_counter>$num_rows) {
		    $row_counter=1;
		    $result = mysql_query($query) or die("Неудачный повторный запрос перечня объектов!");
		    }
		  }
	
      print "</table>\n";
    } 
      
    }
    
    /* Освобождение resultset */
    mysql_free_result($result);

    /* Закрытие соединения */
    mysql_close($link);
    
    print "</td></tr></table>\n";
       
    ?>
