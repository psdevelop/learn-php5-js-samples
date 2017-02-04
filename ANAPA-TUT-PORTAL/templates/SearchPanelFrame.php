<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
	  <td colspan="2" valign="top" style="width:160px;">
	    <table cellpadding="0" cellspacing="2" border="0" style="width:160px;"  class="search_panel_txt">
	      <tr>
		<td class="search_panel_txt">
		  Категория<br>
	          <select id="htype_select" name="htype_select" size="1" style="width:160px;" onchange="ChangeSearchHType();" class="search_field">
		    <option value="-1" selected="true">Неважно==================</option>
		    	<?php 
		
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
		
			mysql_query("SET NAMES 'cp1251'");
			/* Выполнение SQL query */
			$query = "SELECT * FROM HOTEL_TYPES";
			$result = mysql_query($query) or die("Неудачный запрос списка типов гостиниц!");
			/* Печать результатов в HTML */
		
			 while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				printf ("\t\t<option value='%s'>%s</option>\n",$row["ht_id"],$row["htname"]);
			}
			
			/* Освобождение resultset */
			mysql_free_result($result);
		
			/* Закрытие соединения */
			mysql_close($link);
			   
	                ?>
			
		  </select>
		</td>
	      </tr>
	      <tr>
		<td class="search_panel_txt">
		  Район<br>
		  <select id="sregion_select" name="sregion_select" size="1" style="width:160px;" class="search_field">
		  <option value="-1" selected="true">Неважно==================</option>
		  <?php 
		
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
		
			mysql_query("SET NAMES 'cp1251'");
			/* Выполнение SQL query */
			$query = "SELECT * FROM ST_REGIONS";
			$result = mysql_query($query) or die("Неудачный запрос списка районов!");
			/* Печать результатов в HTML */
		
			 while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				printf ("\t\t<option value='%s'>%s</option>\n",$row["SREGION_ID"],$row["SR_NAME"]);
			}
			
			/* Освобождение resultset */
			mysql_free_result($result);
		
			/* Закрытие соединения */
			mysql_close($link);
			   
	                ?>  
		  
	          </select><br>
			    
		  Расстояние до моря
		  <select id="see_distance_select" name="see_distance_select" size="1" style="width:160px;" class="search_field">
		  <option value="-1" selected="true">Неважно==================</option>
		  <?php 
		
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
		
			mysql_query("SET NAMES 'cp1251'");
			/* Выполнение SQL query */
			$query = "SELECT * FROM SEA_DISTS";
			$result = mysql_query($query) or die("Неудачный запрос списка расстояний до моря!");
			/* Печать результатов в HTML */
		
			 while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				printf ("\t\t<option value='%s'>%s</option>\n",$row["S_DIST_ID"],$row["SDIST_NAME"]);
			}
			
			/* Освобождение resultset */
			mysql_free_result($result);
		
			/* Закрытие соединения */
			mysql_close($link);
			   
	                ?>
		  </select>
		</td>
	      </tr>
	      <tr>
		<td>
		  <table cellpadding="0" cellspacing="0" border="0" class="search_panel_txt">
		    <tr>
			<td width="115px" class="td_input">Цена 1чел./сутки до</td>
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
	      <div style="padding:5px;"><center><a href="#" class="buttonSample" onClick="SearchFromPanel();">Искать все</a></center></div>
	     </td>
	     <td> 
		<table cellpadding="0" cellspacing="2" border="0">
		  <tr>
		    <td>
		      
		      <table cellpadding="0" cellspacing="0" border="0" class="search_panel_txt"><tr>
			<td class="td_input"><input id="Eat" name="Eat" type="checkbox" title="С питанием" text="С питанием" class="search_chkbx"/></td>
			<td class="td_input"><nobr>C питанием</nobr></td>
			<td class="td_input"><input id="Parking" name="Parking" title="Стоянка" type="checkbox" value="" class="search_chkbx"></td>
			<td class="td_input">Стоянка</td></tr>
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
			  Кухня
			</td>
			<td class="td_input">
			  <input id="Shop" name="Shop" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  Супермаркет
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
			  <nobr>Территория, бассейн</nobr>
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
			  <nobr>Цифр. ТВ</nobr>
			</td>
			<td class="td_input">
			  <input id="Internet" name="Internet" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  Интернет
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
			  Кондиционер 
			</td>
			<td class="td_input">
			  <input id="Sauna" name="Sauna" type="checkbox" value="" class="search_chkbx">
			</td>
			<td class="td_input">
			  Сауна
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
			  <nobr>Рядом с развлечениями</nobr>
			</td>
		      </table>
		    </td>
		  </tr>
		  <tr>
		    <td>
		      <table cellpadding="0" cellspacing="0" border="0"><tr>
			<td class="td_input">
			  <input id="Bath" name="Bath" type="checkbox" value="" class="search_chkbx">
			  <nobr>Душ в ном.</nobr> 
			</td>
			<td class="td_input">
			  <input id="Sand" name="Sand" type="checkbox" value="" class="search_chkbx">
			  <nobr>Песч. пляж</nobr>  
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
		        <nobr>Треб. транспорт/встреча</nobr> 
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