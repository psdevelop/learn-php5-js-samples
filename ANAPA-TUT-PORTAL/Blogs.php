<?php
       header("Content-type: text/plain; charset=windows-1251");

    /* ID отображаемых гостиниц */
	if (isset($_GET['blog_id'])) 
	    $blog_id=$_GET['blog_id'];	
	else 
	    $blog_id=-1;
	    
    /* Тип вывода */
	if (isset($_GET['out_type'])) 
	    $out_type=$_GET['out_type'];	
	else 
	    $out_type="blog_content";
    
    $showinpop=" ";
    if ($out_type=="blog_div")
       $showinpop=" (SHOWINPOP=1) AND ";
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

    if ($blog_id==-1) {
      $query = "SELECT BLOG_MSG.BMSG_ID, BLOG_MSG.HEADER, BLOG_MSG.SHORT_TXT, BLOG_CATEGORY.BCAT_NAME FROM BLOG_MSG, BLOG_CATEGORY WHERE ".$showinpop." (BLOG_MSG.BCAT_ID=BLOG_CATEGORY.BCAT_ID) ORDER BY PRIORITY DESC";
    }
    else
      $query = "SELECT BLOG_MSG.HEADER, BLOG_MSG.MSG FROM BLOG_MSG, BLOG_CATEGORY WHERE ".$showinpop." (BLOG_MSG.BMSG_ID=".$blog_id.") AND (BLOG_MSG.BCAT_ID=BLOG_CATEGORY.BCAT_ID) ORDER BY PRIORITY DESC";

    /* Выполнение SQL query */
    mysql_query("SET NAMES 'cp1251'");
    $result = mysql_query($query) or die("Неудачный запрос перечня объектов!");
    $row_count = mysql_num_rows($result);
    
    if ($out_type=="blog_div")	{
      print "<table border='0' class='blog_base' align='center' valign='top' cellspacing='2' width='100%'>\n";
      /* Печать результатов в HTML */	 
	while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
		  printf ("\t\t<tr valign=center><td valign='top' width='75' class='blog_category'>Категория: %s</td><td valign='top' width='125' class='blog_theme'>Тема: %s</td></tr>\n",$row["BCAT_NAME"],$row["HEADER"]); 
                  printf ("\t\t<tr valign=center><td colspan='2' valign='top'><a href='#' onClick='LoadBlogPage(%s,\"blog_content\")'>%s</a></td></tr>\n",$row["BMSG_ID"],$row["SHORT_TXT"]);
		  }
      print "</table>\n";
    }
    else if ($out_type=="blog_list") {
        print "<table border='0'><tr><td><img align='left' src='images/system/blog.jpg' height='100px'/></td><td><h3>Темы блога</h3></td></tr></table>\n";
	print "<table border='0' class='blog_base' align='center' valign='top' cellspacing='2' width='100%'>\n";
      /* Печать результатов в HTML */	 
	while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
		  printf ("\t\t<tr valign=center><td width='40' valign='top'><img align='left' src='images/system/blog_doc.png'/></td><td valign='top' width='120' class='blog_category'>Категория: %s</td><td valign='top' class='blog_theme'>Тема: %s</td>\n",$row["BCAT_NAME"],$row["HEADER"]); 
                  printf ("\t\t<td colspan='2' valign='top'><a href='#' onClick='LoadBlogPage(%s,\"blog_content\")'>%s</a></td></tr>\n",$row["BMSG_ID"],$row["SHORT_TXT"]);
		  }
       print "</table>\n";
    }
    else
    {
       if (($blog_id>0)&&($row_count>0)) {
	   $row = mysql_fetch_array($result, MYSQL_BOTH);   
	   printf ("<h3>%s</h3>\n",$row["HEADER"]);
	   printf ("<p class='blog_content'>%s</p>\n",$row["MSG"]);
       }
    }
    /* Освобождение resultset */
    mysql_free_result($result);

    /* Закрытие соединения */
    mysql_close($link);
    
       
    ?>
