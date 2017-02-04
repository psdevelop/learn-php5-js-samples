<?php
       header("Content-type: text/plain; charset=windows-1251");

    /* ID отображаемых гостиниц */
	if (isset($_GET['phg_id'])) 
	    $phg_id=$_GET['phg_id'];	
	else 
	    $phg_id=-1;
            
    /* Тип вывода в HTML*/
	if (isset($_GET['out_type'])) 
	    $out_type=$_GET['out_type'];	
	else 
	    $out_type='galleries_list';
    
    /* Начала ленты выбора*/
	if (isset($_GET['start_num'])) 
	    $start_num=$_GET['start_num'];	
	else 
	    $start_num=1;	    
    
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

    if ($out_type=="galleries_list") {
      $query = "SELECT * FROM PH_GALLERY ORDER BY PRIORITY DESC";
    }
    else
      $query = "SELECT * FROM IMAGE_CONTENT WHERE ph_gallery_id=".$phg_id;

    /* Выполнение SQL query */
    mysql_query("SET NAMES 'cp1251'");
    $result = mysql_query($query) or die("Неудачный запрос списка фотоальбомов или списка фото!");
    
    if($out_type=="galleries_list")	{
      print "<table border='0'><tr><td><img align='left' src='images/system/gallery.jpg' height='100px'/></td><td><h3>Фото на ANAPA-TUT.RU</h3></td></tr></table>\n";
      print "<table border='0' class='blog_base' align='center' valign='top' cellspacing='2' width='100%'>\n";
      /* Печать результатов в HTML */	 
	while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
		  printf ("\t\t<tr valign='center' height='30'><td width='40' valign='top'><img align='left' src='images/system/gallery_link.png'/></td><td valign='top' width='300' class=''><a href='#' onClick='LoadGalleryById(%s,1);'>%s</a></td><td valign='top' class=''><img align='left' src='%s'/>%s</td></tr>\n",$row["ph_gallery_id"],$row["gallery_name"],$row["g_filename"],$row["gallery_comment"]); 
		  }
      print "</table>\n";
    }
    else
      {
       $ph_count=mysql_num_rows($result);
       $ph_row_counter=1;
       if($start_num<0)
         $start_num=1;
       if ($start_num>($ph_count-5)) {
	      if ($ph_count<6)
	        $start_num=1;
	      else
	        $start_num=($ph_count-4);
       }
       print "<h3>Фотографии</h3>";
       
       if(mysql_num_rows($result)>0) {
	      printf ("<center><div><img id='foto_view_container' src=''/></div>\n");      
		     print "<table border='0' class='phg_base' align='center' valign='top' cellspacing='2' width='100%'><tr>\n";
		     while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
			if($ph_row_counter==$start_num) {
			    printf ("<script language='JavaScript' type='text/javascript'>document.getElementById('foto_view_container').src='%s';</script>\n",$row["filename"]);
			    printf ("\t\t<td valign='center' width=''><a href='#' class='ph_navigate' onClick='LoadGalleryById(".$phg_id.",".($start_num-5).")'><<</a></td>\n");
			}
			if (($ph_row_counter>=$start_num)&&($ph_row_counter<($start_num+5)))
			    printf ("\t\t<td valign='top' width='' class=''><table border='0'><tr><td><a href='#' onClick=\"document.getElementById('foto_view_container').src='%s';\"><div class='img_shadow'><img align='left' src='%s' height='100'/></div></a></td></tr><tr><td>%s</td></tr></table></td>\n",$row["filename"],str_replace(".jpg","s.jpg",$row["filename"]),$row["short_t"]);   
		        
			if ($ph_row_counter>=($start_num+4)) {
			    printf ("\t\t<td valign='center' width=''><a class='ph_navigate' href='#' onClick='LoadGalleryById(".$phg_id.",".($start_num+5).")'>>></a></td>\n");
			    break;
			}
			$ph_row_counter=$ph_row_counter+1;
		     }
	      print "</tr></table></center>\n";
       }
      }
    /* Освобождение resultset */
    mysql_free_result($result);

    /* Закрытие соединения */
    mysql_close($link);
    
       
    ?>
