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
			$query = "SELECT * FROM HOTEL_TYPES WHERE (menu_display=1) ORDER BY priority DESC";
			$result = mysql_query($query) or die("Неудачный запрос списка типов гостиниц!");
			print "<li><a href='hotels.php' title='Весь список гостиниц' target='mainFrame'>Отдых</a>\n";
			print "\t<ul id='subnavlist'>\n";
			/* Печать результатов в HTML */
		
			 while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				//printf ("\t\t<li id='subactive'><a href='hotels.php?htype=%s'  title='%s' target='mainFrame'>%s</a></li>\n",$row["ht_id"],$row["htname"],$row["htname"]);
			        //HotelsSearch(htype, block, block_num)
				printf ("\t\t<li id='subactive'><a href='#' onClick='HotelsSearch(%s, 9, 0);'  title='%s'>%s</a></li>\n",$row["ht_id"],$row["htname"],$row["htname"]);
			}
			
			print "\t</ul>\n";
			print "</li>\n"; 
			
			/* Освобождение resultset */
			mysql_free_result($result);
		
			/* Закрытие соединения */
			mysql_close($link);
			   
	?>  
        
        <?php  
		include("templates/LeftFrameBottom.php"); ?>
    </td>    
   
    <td valign="top" width="">
        <div style="font-size:18px;text-align:justify;width:100%;">Настоящий рынок летнего жилья. Сообщите хозяину объекта прямо с сайта.</div>
	<table border="0" align="center" cellpadding="0" cellspacing="4" valign="top">
		<tr><td align="center">		
		   <table border="0" align="center" cellpadding="0" cellspacing="5" valign="top">
		     <tr style="vertical-align:top;">
			<td align="right">
				<div class="base_header_div">Всегда есть очень выгодные предложения... Свяжитесь с владельцем.</div>
				<div id="best_offers" class="search_panel_txt" style="border-style:dotted;border-width:1px;">
					
				</div>
				
			</td>
			<td>

		        </td>
		     </tr></table>
		</td></tr>
		<tr><td style="text-align:justify;">  		
			<div id="center_iframe" >
			  <strong><h2 style="padding:2px;margin:1px;">ЗАРАНЕЕ И ЭФФЕКТИВНО РЕШИТЕ ЦЕНОВОЙ ВОПРОС</h2></strong>
			     <p style="padding:2px;margin:2px;" class="main_txt">
			       <img src="images/sand_track_mdsz.jpg" alt="Анапа город-курорт" width="150" height="225" align="left"/>
			       <h3 style="padding:2px;margin:4px;">СРАВНИТЬ->ВЫБРАТЬ->СОЗВОНИТЬСЯ<br/>->ПРИЕХАТЬ И
			       <span style="color:#FF0000;">СРАЗУ ОТДЫХАТЬ</span></h3>
			       <span style="text-align:justify;">
			       <b>Наш сайт дает возможность отдыхающим и хозяевам объектов сойтись
			       в предложении и спросе предлагая свою минимальную цену.</b>
			       Как известно, в период конкуренции покупатель получает значительное снижение цены.
			       Анапа растет невероятными темпами и в ней, как и в большом магазине,
			       возникает вопрос правильного расположения товара. Только в этом случае
			       покупатель находит то, что ему надо и по самой выгодной стоимости.
			       Цены, предлагаемые на сайте, являются реальными свежими предложениями
			       владельцев объектов и могут быть еще более скорректированы Вами в сторону
			       выгоды в процессе личного общения.
			       </span>
			       </p>
			       
			       <p align="justify" style="padding:2px;margin:2px;text-align:justify;" class="main_txt">
			       <h3 style="padding:2px;margin:4px;">ЯСНОЕ НЕБО, БЕСКОНЕЧНЫЕ МОРЕ И ПЛЯЖИ, КРАСИВЫЕ МЕСТА И ПЕЙЗАЖИ, ПРИПЕКАЕТ С САМОГО УТРА, ОТДЫХ И РАЗВЛЕЧЕНИЯ КРУГЛОСУТОЧНО, ВСЯ РОССИЯ В ОДНОМ ГОРОДЕ</h3>
			       <span style="text-align:justify;">Анапа - всемирно известный курорт на 
			       Черноморском побережье. Отдых в Анапе недорогой и комфортный.
			       Отели, пансионаты и санатории Анапы - это 
			       современные учреждения с большим опытом работы.
			       Недорогой отдых в Анапе первыми предлагают частный сектор 
			       и мини-гостиницы курорта: на любой вкус по 
			       расположению и условиям проживания. Анапа 2010 года 
			       обладает качеством проживания, как в недорогом 
			       частном секторе, так и в гостиницах и санаториях 
			       с питанием и лечением. Отзывы о нашем курорте 
			       открывают общее мнение отдыхающих: незабываемые впечатления и 
			       желание приехать в Анапу снова. Постоянная 
			       теплая погода и недорогой отдых в Анапе привлекают 
			       множество желающих провести отпуск на юге. Пески 
			       Джемете и Витязево, горные долины пляжей Сукко,  
			       европейский уровень курорта Анапа доступны каждому, 
			       кто захотел у нас отдохнуть. Наиболее 
			       привлекательны цены на недорогой частный сектор и 
			       небольшие гостиницы Анапы. На нашем сайте Вы сможете
			       найти лучшие предложения недорогого отдыха 
			       в Анапе в 2009 году, включая детский отдых и 
			       подбор различных вариантов.</span></p>
			       
			       <table border="0" cellspacing="0" cellpadding="0" class="main_txt"><tr>
			       <td valign="top">

				 <h3>Анапа - это здоровье </h3>
					<ul class="sunny_list">  
					  <li>Лечебные пляжи </li>
					  <li>Особый климат </li>
					  <li>Морской воздух </li>
					  <li>Ландшафт и растительность </li>
				        </ul>
				 <h3>Праздники и достопримечательности</h3>
				        <ul class="sunny_list">
					  <li>Открытие сезона </li>
					  <li>Фестиваль &quot;Киношок&quot; </li>
					  <li>Древнегреческие раскопки - музей "Горгиппия"</li>
					  <li>"Русские ворота" - символ Анапы</li>
					  <li>Герб города-курорта </li>
					  <li>История Анапы, история курорта </li>
                                        </ul>
			       </td>
			       <td valign="top" width="400">
					<div class="base_header_div">Темы блога</div>
					<div id="blog_themes" class="blog_base" style="width:100%;text-align:left;">Загрузка...</div>
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
    
