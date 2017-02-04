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
    
    /* Текущий номер */
	if (isset($_GET['current_num'])) 
	    $current_num=$_GET['current_num'];	
	else 
	    $current_num=1;
    /* В какую сторону перемещаться */  
	if (isset($_GET['step'])) 
		$step=$_GET['step'];
	else 	
		$step=0; 
    $get_row_num=1;
    
    /* Длина отображаемого блока */  
	if (isset($_GET['display_len'])) 
		$display_len=$_GET['display_len'];
	else 	
		$display_len=0; 
    
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

    $query = "SELECT * FROM HOTELS WHERE best_offer=1 ORDER BY group_priority DESC, priority DESC";

    /* Выполнение SQL query */
    mysql_query("SET NAMES 'cp1251'");
    $result = mysql_query($query) or die("Неудачный запрос перечня объектов!");
    
    $num_rows = mysql_num_rows($result);
    $block_counter = 1;
    if ($num_rows>0) {
    if ($step==0) {
      $get_row_num=$current_num % $num_rows;
    }
    else if ($step==1) {
      if ($current_num>=$num_rows)
        $get_row_num=1;
      else
        $get_row_num=($current_num+1) % $num_rows;
    }
    else {
      if ($current_num<=1)
	$get_row_num=$num_rows;
      else
        $get_row_num=($current_num-1) % $num_rows;
    }
    //print "hhhh$num_rows";
      //print "<a class='a_exp' href='javascript:'><div class='img_exp'><img src='sea_star_red.jpg'/></div></a>";
      print "<table border='0' align='center' valign='top' cellpadding='2' cellspacing='2'><tr valign='center'>\n";
      /* Печать результатов в HTML*/  	 
	while($row = mysql_fetch_array($result, MYSQL_BOTH)) {

		if (($block_counter>=$get_row_num)&&($block_counter<($get_row_num+$display_len))) { 
		  printf ("\t\t<td align='left' colspan='2' class='image_comment_text' valign='top'><a class='a_exp' href='#' onClick='GetHotelInfo(%s); addByHotelClick(%s,\"Best proposals\");' align='left'><div class='img_exp'><img alt='%s' src='%s' class=\"best_hotel_img\" onmousemove=\"movePic('%s');\" onmouseout=\"hidePic();\"></div></a><div style='text-align:center;'>",$row["hotel_num"],$row["hotel_num"],$row["name"],$row["presents_i_name"],$row["name"]); 
                  GetHotelOptions($row["hotel_num"]);
		  print "</div></td>\n";
		}
		
		if ($block_counter>=(($get_row_num+$display_len)-1)) {  
		  printf ("\t\t</tr></table><table align='center'><tr><td align='right' valign='top'><a href='#' class='SmallButtonSample' onClick='GetBest(%s,-1,%s);'>Пред.</a></td><td align='left' valign=top><a href='#' class='SmallButtonSample' onClick='GetBest(%s,1,%s);'>След.</a></td></tr>\n",$get_row_num,$display_len,$get_row_num,$display_len);
		  break; }
	        if (($block_counter%$num_rows)==0) {
		     mysql_query("SET NAMES 'cp1251'");
                     $result = mysql_query($query) or die("Неудачный повторный запрос перечня объектов!");
                     $num_rows = mysql_num_rows($result);
		}
		$block_counter=$block_counter+1;

		  }
	
      print "</table>\n";
    } 
	
    /* Освобождение resultset */
    mysql_free_result($result);

    /* Закрытие соединения */
    mysql_close($link);
    
       
    ?>
