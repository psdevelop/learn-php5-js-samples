<?php
header("Content-type: text/plain; charset=windows-1251");
/* ���������� ��������� */  
	if (isset($_GET['order_eadress'])) 
		$order_eadress=$_GET['order_eadress'];
	else 	
		$order_eadress="";
                
	if (isset($_GET['order_text'])) 
		$order_text=$_GET['order_text'];
	else 	
		$order_text="";
        
        $additional = '';        
        
        if (isset($_GET['promptness'])) 
		$additional.=$_GET['promptness'];
                
        if (isset($_GET['sale_info'])) 
		$additional.=$_GET['sale_info'];        

$flag = false;
if ($order_eadress!="") {
    if ($order_text!="") {
            $to  = "psdevelop@yandex.ru" ; 
            $subject = "������ �� ANAPA-TUT";
            $message = "����������: ".$order_eadress.". �����: ".$order_text.".".$additional; 
            $headers  = "Content-type: text/plain; charset=windows-1251; \r\n"; 
            $headers .= "From: �������� ANAPA-TUT<lakmusin@inbox.ru>\r\n"; 
            $headers .= "Bcc: lakmusin@inbox.ru\r\n";
            
            if (mail($to, $subject, $message, $headers)) {
                print "<b>����������</b>"; 
            } else { 
                print "<b>�� ���������� ���������!!!</b>"; 
            } 

        }
    else
      print "<b>����������� ����� ������</b>";
    //if (eregi("^[_\.0-9a-z-]+@([0-9a-z][-0-9a-z\.]+)\.([a-z]{2,3}$)", $order_eadress) )
}
else
  print "<b>�� ������ ������� ��� e-mail</b>";
?>