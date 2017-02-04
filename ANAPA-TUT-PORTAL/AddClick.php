<?php
     
       function getRealIpAddr() {
	      if (!empty($_SERVER['HTTP_CLIENT_IP']))
	      // Определение IP-адреса
	      {
		 $ip=$_SERVER['HTTP_CLIENT_IP'];
	      }
	      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	      // Проверка того, что IP идёт через прокси
	      {
		 $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	      }
	      else  {
		 $ip=$_SERVER['REMOTE_ADDR'];
	      }
	      return $ip;
	   }
     
       header("Content-type: text/plain; charset=windows-1251");

    /* ID отображаемых гостиниц */
	if (isset($_GET['isenter'])) 
	    $isenter=$_GET['isenter'];	
	else 
	    $isenter=0;
	    
    /* ID отображаемых гостиниц */
	if (isset($_GET['ishotel'])) 
	    $ishotel=$_GET['ishotel'];	
	else 
	    $ishotel=0;
	    
     $ipaddr="undefined_ip";
     /* ID отображаемых гостиниц */
	if (isset($_GET['ipaddr'])) 
	    $ipaddr=$_GET['ipaddr'];
     $ipaddr = getRealIpAddr();	    

     $hid=-1;
     /* ID отображаемых гостиниц */
	if (isset($_GET['hid'])) 
	    $hid=$_GET['hid'];
	    
     $comment="no comment";
     /* ID отображаемых гостиниц */
	if (isset($_GET['comment'])) 
	    $comment=$_GET['comment'];
	    
     $state="no state";
     /* ID отображаемых гостиниц */
	if (isset($_GET['state'])) 
	    $state=$_GET['state'];    
	    
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

    $query = "INSERT INTO `CLICKS` (`ISENTER`, `ISHOTEL`, `IP`, `HOTEL_ID`, `COMMENT`, `STATE`, `ADDDT`) VALUES (".$isenter.", ".$ishotel.", '".$ipaddr."', ".$hid.", '".$comment."', '".$state."', '".date('Y-m-d [H:i:s]')."');";

    /* Выполнение SQL query */
    mysql_query("SET NAMES 'cp1251'");
    mysql_query($query) or die("Неудачный запрос обработчика события!");

    /* Закрытие соединения */
    mysql_close($link);
    
       
    ?>