<?php
       header("Content-type: text/plain; charset=windows-1251");

    /* ���������� �������� � ������ */
	$row_hotels_count=3;
	$row_counter=1;
	$block_counter=1;

	if (isset($_GET['start_num'])) 
	    $start_num=$_GET['start_num'];	
	else 
	    $start_num=1;
    /* ��� ������������ �������� */
	if (isset($_GET['type'])) 
		$htype=$_GET['type'];
	else 	
		$htype=-1;	
	
	if (isset($_GET['block_len'])) 
		$count=$_GET['block_len'];
	else 	
		$count=3; 
    $row_count=1;
    
    /* ����������, ����� �� */
    $f=fopen("cgi-bin/ini.txt","r");
                             $dbhostname=trim(fgets($f));
                             $dbname=trim(fgets($f));
                             $dbuser=trim(fgets($f));
                             $dbpsw=trim(fgets($f));
                           fclose($f);                          
                           
                           $link = mysql_connect($dbhostname, $dbuser, $dbpsw)
                             or die("�� ������� ���������� ���������� � �������� ��� ������!");
    mysql_select_db($dbname) 
                             or die("���������� ������� ���� ������!");

    if ($htype==-1) {
      $query = "SELECT * FROM HOTELS WHERE (in_rotate_list=1) ORDER BY group_priority DESC, priority DESC";
    }
    else
      $query = "SELECT * FROM HOTELS WHERE type=".$htype." AND (in_rotate_list=1) ORDER BY group_priority DESC, priority DESC";

    /* ���������� SQL query */
    mysql_query("SET NAMES 'cp1251'");
    $result = mysql_query($query) or die("��������� ������ ������� ��������!");
    $row_count = mysql_num_rows($result);
    
    $num_rows = mysql_num_rows($result);
    //print "hhhh$num_rows";
    if($num_rows>0)	{
      print "<table border='0' align='left' valign='center' cellspacing='2' cellpadding='2'><tr valign=center>\n";
      /* ������ ����������� � HTML */
	if ($start_num>=0)  	 
	while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
		//alert("111");
		if ($block_counter>=$start_num)  
		  printf ("\t\t<td valign='top' class='top_pop_hotel_img'><a class='a_exp' href=\"MainFrame.php?hid=%s\" title='%s' alt='%s' target='mainFrame' onClick=\"window.parent.frames[1].window.location='MainFrame.php?hid=%s';\"><div class='img_exp_shadow'><img alt='%s' src='%s' class='top_pop_hotel_img'/></div></a></td>\n",$row["hotel_num"],$row["name"],$row["name"],$row["hotel_num"],$row["name"],$row["pr_vert_sml_img"]); 
		$block_counter=$block_counter+1;
		$row_counter=$row_counter+1;
		if ($block_counter>=($count+$start_num))
		  break;
		if ($row_counter>$num_rows) {
		    $row_counter=1;
		    $result = mysql_query($query) or die("��������� ��������� ������ ������� ��������!");
		    }
		  }
	
      print "</tr></table>\n";
    } 
	
    /* ������������ resultset */
    mysql_free_result($result);

    /* �������� ���������� */
    mysql_close($link);
    
       
    ?>
