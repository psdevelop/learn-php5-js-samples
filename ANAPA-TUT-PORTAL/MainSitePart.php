<?php
       header("Content-type: text/plain; charset=windows-1251");
?>
       <center>
<table border="0" align="center" cellpadding="0" cellspacing="4" valign="top"> 
  <tr  width="200" valign="top">
    <td align="left">
        <?php  
		include("templates/LeftFrameTop.php"); ?>
        
	<?php 
		
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
		
			mysql_query("SET NAMES 'cp1251'");
			/* ���������� SQL query */
			$query = "SELECT * FROM HOTEL_TYPES WHERE (menu_display=1) ORDER BY priority DESC";
			$result = mysql_query($query) or die("��������� ������ ������ ����� ��������!");
			print "<li><a href='hotels.php' title='���� ������ ��������' target='mainFrame'>�����</a>\n";
			print "\t<ul id='subnavlist'>\n";
			/* ������ ����������� � HTML */
		
			 while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				//printf ("\t\t<li id='subactive'><a href='hotels.php?htype=%s'  title='%s' target='mainFrame'>%s</a></li>\n",$row["ht_id"],$row["htname"],$row["htname"]);
			        //HotelsSearch(htype, block, block_num)
				printf ("\t\t<li id='subactive'><a href='#' onClick='HotelsSearch(%s, 9, 0);'  title='%s'>%s</a></li>\n",$row["ht_id"],$row["htname"],$row["htname"]);
			}
			
			print "\t</ul>\n";
			print "</li>\n"; 
			
			/* ������������ resultset */
			mysql_free_result($result);
		
			/* �������� ���������� */
			mysql_close($link);
			   
	?>  
        
        <?php  
		include("templates/LeftFrameBottom.php"); ?>
    </td>    
   
    <td valign="top" width="">
        <div style="font-size:18px;text-align:justify;width:100%;">��������� ����� ������� �����. �������� ������� ������� ����� � �����.</div>
	<table border="0" align="center" cellpadding="0" cellspacing="4" valign="top">
		<tr><td align="center">		
		   <table border="0" align="center" cellpadding="0" cellspacing="5" valign="top">
		     <tr style="vertical-align:top;">
			<td align="right">
				<div class="base_header_div">������ ���� ����� �������� �����������... ��������� � ����������.</div>
				<div id="best_offers" class="search_panel_txt" style="border-style:dotted;border-width:1px;">
					
				</div>
				
			</td>
			<td>

		        </td>
		     </tr></table>
		</td></tr>
		<tr><td style="text-align:justify;">  		
			<div id="center_iframe" >
			  <strong><h2 style="padding:2px;margin:1px;">������� � ���������� ������ ������� ������</h2></strong>
			     <p style="padding:2px;margin:2px;" class="main_txt">
			       <img src="images/sand_track_mdsz.jpg" alt="����� �����-������" width="150" height="225" align="left"/>
			       <h3 style="padding:2px;margin:4px;">��������->�������->�����������<br/>->�������� �
			       <span style="color:#FF0000;">����� ��������</span></h3>
			       <span style="text-align:justify;">
			       <b>��� ���� ���� ����������� ���������� � �������� �������� �������
			       � ����������� � ������ ��������� ���� ����������� ����.</b>
			       ��� ��������, � ������ ����������� ���������� �������� ������������ �������� ����.
			       ����� ������ ������������ ������� � � ���, ��� � � ������� ��������,
			       ��������� ������ ����������� ������������ ������. ������ � ���� ������
			       ���������� ������� ��, ��� ��� ���� � �� ����� �������� ���������.
			       ����, ������������ �� �����, �������� ��������� ������� �������������
			       ���������� �������� � ����� ���� ��� ����� ��������������� ���� � �������
			       ������ � �������� ������� �������.
			       </span>
			       </p>
			       
			       <p align="justify" style="padding:2px;margin:2px;text-align:justify;" class="main_txt">
			       <h3 style="padding:2px;margin:4px;">����� ����, ����������� ���� � �����, �������� ����� � �������, ��������� � ������ ����, ����� � ����������� �������������, ��� ������ � ����� ������</h3>
			       <span style="text-align:justify;">����� - �������� ��������� ������ �� 
			       ������������ ���������. ����� � ����� ��������� � ����������.
			       �����, ���������� � ��������� ����� - ��� 
			       ����������� ���������� � ������� ������ ������.
			       ��������� ����� � ����� ������� ���������� ������� ������ 
			       � ����-��������� �������: �� ����� ���� �� 
			       ������������ � �������� ����������. ����� 2010 ���� 
			       �������� ��������� ����������, ��� � ��������� 
			       ������� �������, ��� � � ���������� � ���������� 
			       � �������� � ��������. ������ � ����� ������� 
			       ��������� ����� ������ ����������: ������������ ����������� � 
			       ������� �������� � ����� �����. ���������� 
			       ������ ������ � ��������� ����� � ����� ���������� 
			       ��������� �������� �������� ������ �� ���. ����� 
			       ������� � ��������, ������ ������ ������ �����,  
			       ����������� ������� ������� ����� �������� �������, 
			       ��� ������� � ��� ���������. �������� 
			       �������������� ���� �� ��������� ������� ������ � 
			       ��������� ��������� �����. �� ����� ����� �� �������
			       ����� ������ ����������� ���������� ������ 
			       � ����� � 2009 ����, ������� ������� ����� � 
			       ������ ��������� ���������.</span></p>
			       
			       <table border="0" cellspacing="0" cellpadding="0" class="main_txt"><tr>
			       <td valign="top">

				 <h3>����� - ��� �������� </h3>
					<ul class="sunny_list">  
					  <li>�������� ����� </li>
					  <li>������ ������ </li>
					  <li>������� ������ </li>
					  <li>�������� � �������������� </li>
				        </ul>
				 <h3>��������� � ���������������������</h3>
				        <ul class="sunny_list">
					  <li>�������� ������ </li>
					  <li>��������� &quot;�������&quot; </li>
					  <li>��������������� �������� - ����� "���������"</li>
					  <li>"������� ������" - ������ �����</li>
					  <li>���� ������-������� </li>
					  <li>������� �����, ������� ������� </li>
                                        </ul>
			       </td>
			       <td valign="top" width="400">
					<div class="base_header_div">���� �����</div>
					<div id="blog_themes" class="blog_base" style="width:100%;text-align:left;">��������...</div>
			       </td>
			       </tr></table>
			</div>        
			 
		</td></tr>
	</table>
      
      </td>
      <td width="220" style="background-image:url('images/beach_back8.jpg'); background-repeat:no-repeat; background-position:right bottom;">
      <?php  
        include("templates/RightFrame.php"); ?>
      </td>
      <td width="220">
      </td>
  </tr>
</table>
</center>
<div><img align="left" src="images/popurry6.jpg"/></div>
    
