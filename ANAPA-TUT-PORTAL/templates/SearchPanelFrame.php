<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
	  <td colspan="2" valign="top" style="width:160px;">
	    <table cellpadding="0" cellspacing="2" border="0" style="width:160px;"  class="search_panel_txt">
	      <tr>
		<td class="search_panel_txt">
		  ���������<br>
	          <select id="htype_select" name="htype_select" size="1" style="width:160px;" onchange="ChangeSearchHType();" class="search_field">
		    <option value="-1" selected="true">�������==================</option>
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
			$query = "SELECT * FROM HOTEL_TYPES";
			$result = mysql_query($query) or die("��������� ������ ������ ����� ��������!");
			/* ������ ����������� � HTML */
		
			 while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				printf ("\t\t<option value='%s'>%s</option>\n",$row["ht_id"],$row["htname"]);
			}
			
			/* ������������ resultset */
			mysql_free_result($result);
		
			/* �������� ���������� */
			mysql_close($link);
			   
	                ?>
			
		  </select>
		</td>
	      </tr>
	      <tr>
		<td class="search_panel_txt">
		  �����<br>
		  <select id="sregion_select" name="sregion_select" size="1" style="width:160px;" class="search_field">
		  <option value="-1" selected="true">�������==================</option>
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
			$query = "SELECT * FROM ST_REGIONS";
			$result = mysql_query($query) or die("��������� ������ ������ �������!");
			/* ������ ����������� � HTML */
		
			 while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				printf ("\t\t<option value='%s'>%s</option>\n",$row["SREGION_ID"],$row["SR_NAME"]);
			}
			
			/* ������������ resultset */
			mysql_free_result($result);
		
			/* �������� ���������� */
			mysql_close($link);
			   
	                ?>  
		  
	          </select><br>
			    
		  ���������� �� ����
		  <select id="see_distance_select" name="see_distance_select" size="1" style="width:160px;" class="search_field">
		  <option value="-1" selected="true">�������==================</option>
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
			$query = "SELECT * FROM SEA_DISTS";
			$result = mysql_query($query) or die("��������� ������ ������ ���������� �� ����!");
			/* ������ ����������� � HTML */
		
			 while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				printf ("\t\t<option value='%s'>%s</option>\n",$row["S_DIST_ID"],$row["SDIST_NAME"]);
			}
			
			/* ������������ resultset */
			mysql_free_result($result);
		
			/* �������� ���������� */
			mysql_close($link);
			   
	                ?>
		  </select>
		</td>
	      </tr>
	      <tr>
		<td>
		  <table cellpadding="0" cellspacing="0" border="0" class="search_panel_txt">
		    <tr>
			<td width="115px" class="td_input">���� 1���./����� ��</td>
			<td class="td_input">
			  <input id="min_price_pers" name="min_price_pers" class="search_field" type="text" value="1000" style="width:40px;"/>
			</td></tr>
		  </table>
		</td>
		</tr>
		<tr>
		<td>
	          
		</td>
		</tr>
	      </table>
	      <div style="padding:5px;"><center><a href="#" class="buttonSample" onClick="SearchFromPanel();">������ ���</a></center></div>
	     </td>
	     <td> 
		<table cellpadding="0" cellspacing="2" border="0">
		  <tr>
		    <td>
		      
		      <table cellpadding="0" cellspacing="0" border="0" class="search_panel_txt"><tr>
			<td class="td_input"><input id="Eat" name="Eat" type="checkbox" title="� ��������" text="� ��������" class="search_chkbx"/></td>
			<td class="td_input"><nobr>C ��������</nobr></td>
			<td class="td_input"><input id="Parking" name="Parking" title="�������" type="checkbox" value="" class="search_chkbx"></td>
			<td class="td_input">�������</td></tr>
		      </table>
		    </td>
		  </tr>
		  <tr>
		    <td>
		      <table cellpadding="0" cellspacing="0" border="0" class="search_panel_txt"><tr>
			<td class="td_input">
			  <input id="Cook" name="Cook" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  �����
			</td>
			<td class="td_input">
			  <input id="Shop" name="Shop" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  �����������
			</td></tr>
		      </table>
		    </td>
		  </tr>
		  <tr>
		    <td>
		      <table cellpadding="0" cellspacing="0" border="0"><tr>
			<td class="td_input">
			  <input id="Solaris" name="Solaris" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  <nobr>����������, �������</nobr>
			</td>
		      </table>
		    </td>
		  </tr>
		  <tr>
		    <td>
		      <table cellpadding="0" cellspacing="0" border="0"><tr>
			<td class="td_input">
			  <input id="Media" name="Media" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  <nobr>����. ��</nobr>
			</td>
			<td class="td_input">
			  <input id="Internet" name="Internet" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  ��������
			</td></tr>
		      </table>
		    </td>
		  </tr>
		  <tr>
		    <td>
		      <table cellpadding="0" cellspacing="0" border="0"><tr>
			<td class="td_input">
			  <input id="Condition" name="Condition" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  ����������� 
			</td>
			<td class="td_input">
			  <input id="Sauna" name="Sauna" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  �����
			</td></tr>
		      </table>
		    </td>
		  </tr>
		  <tr>
		    <td>
		      <table cellpadding="0" cellspacing="0" border="0"><tr>
			<td class="td_input">
			  <input id="Dance" name="Dance" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  <nobr>����� � �������������</nobr>
			</td>
		      </table>
		    </td>
		  </tr>
		  <tr>
		    <td>
		      <table cellpadding="0" cellspacing="0" border="0"><tr>
			<td class="td_input">
			  <input id="Bath" name="Bath" type="checkbox" value="" class="search_chkbx">
			  <nobr>��� � ���.</nobr> 
			</td>
			<td class="td_input">
			  <input id="Sand" name="Sand" type="checkbox" value="" class="search_chkbx">
			  <nobr>����. ����</nobr>  
			</td>
		      </table>
		    </td>
		  </tr>
		  <tr>
		    <td>
		      <table cellpadding="0" cellspacing="0" border="0"><tr>
			<td class="td_input">
			  <input id="HasTransport" name="HasTransport" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
		        <nobr>����. ���������/�������</nobr> 
			</td>
		      </table>
		    </td>
		  </tr>
		</table>  
		<br>

	  </td> 
	</tr>
	</table>
	<div id="search_panel_status" style="font-weight:bold;color:#FF0000;text-align:center;"></div>