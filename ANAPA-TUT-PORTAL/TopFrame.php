<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="styles/top_frame.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
}
#top_layer_back {
	position:absolute;
	width:100%;
	height:98px;
	z-index:1;
        top: 24px;
}
#top_layer_popular_rotation {
	position:absolute;
	width:100%;
	height:100px;
	z-index:3;
        top: 24px;
	left: 240px;
	text-align:left;
}
#top_layer_front {
	position:absolute;
	width:100%;
	height:100px;
	z-index:2;
}
-->
</style>
<script language="JavaScript" type="text/javascript" src="ajax.js"></script><!--цепляем аякс-->
<script type="text/javascript" src="jquery-1.4.2.js"></script>

<script language="JavaScript" type="text/javascript">

var PopListXMLHttp = getXMLHttp_();
var HasPopListAnswer = true;

function PopList(start_num, list_len, htype) {
//составляем линк и отправляем запрос
url = "PopularObjects.php?start_num="+start_num+"&block_len="+list_len+"&type="+htype;

HasPopListAnswer = false;
PopListXMLHttp.open("GET", url, true);
PopListXMLHttp.onreadystatechange = PopListHandlerFunction;
PopListXMLHttp.send(null);

}
 
function PopListHandlerFunction() {
//если завершено
   //document.getElementById("top_popular_container").innerHTML="8888888";
   if (PopListXMLHttp.readyState == 4) {
      document.getElementById("top_popular_container").innerHTML = PopListXMLHttp.responseText;
      HasPopListAnswer = true;
      if (true) {
	  $(function(){
		$('.img_exp').hover(function(){ 
		  $(this).children('img').stop().animate({height:"92px"}, 400);
		}, function(){ $(this).children('img').stop().animate({height:"86px"}, 400); });
	      });
	  $(function(){
		$('.img_exp_shadow').hover(function(){ 
		  $(this).children('img').stop().animate({height:"92px"}, 400);
		}, function(){ $(this).children('img').stop().animate({height:"86px"}, 400); });
	      });
	  start = false;
      }
}
}

var rotate_max_num=5;
var start_rotate_num=1;
var rotate_list_len=5;
var curr_htupe=-1;
var start = true;

function top_frame_load() {
   //alert("ddd");
   //chcol();
   //alert("ddd");
   setTimeout("popular_rotate()",2000);
   //alert("ddd");
   move_text_init();
}

function popular_rotate() {
    
    if (HasPopListAnswer)	
	PopList(start_rotate_num, rotate_list_len, curr_htupe);
    start_rotate_num++;
    if (start_rotate_num>rotate_max_num)
       start_rotate_num=1;
    setTimeout("popular_rotate()",20000);   
}

</script>

<SCRIPT LANGUAGE="JavaScript">
//alert("ssss");
<!-- Begin
IE = (document.all);
if (IE) {
  var chidc = new Array();
  var hexc = new Array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
  var chidn = new Array(100,70,40);
  var color_step = new Array(10,10,10);
  var chway = new Array(color_step[0],color_step[1],color_step[2]);
  var tone = new Array(1,1,1);
  function chcol() {
   try
   {
    for (i=0; i<3; i++) {
      chidn[i]+=chway[i];
      if (chidn[i]>=255) {
        chidn[i] = 255;
        chway[i] = -color_step[i];
      }
    else if (chidn[i]<=40) {
        chidn[i] = 40;
        chway[i] = color_step[i];
        tone[i]>=3? tone[i] = 1:tone[i]++;
      }
      col1 = hexc[Math.floor(chidn[i]/16)];
      col2 = hexc[chidn[i]%16];
      tored = '';
      toblue = '';
      for (j=1; j<tone[i]; j++) tored+='00';
      for (j=3; j>tone[i]; j--) toblue+='00';
      chidc[i] = '#'+tored+col1+col2+toblue;
      td = eval('document.all.chcol'+i);
      td.style.backgroundColor = chidc[i];
    }
    setTimeout('chcol()',100);
   }
   catch(e) {
	document.getElementById("chcol0").style.backgroundColor = "#FF9900";
	document.getElementById("chcol1").style.backgroundColor = "#75bcf2";
	document.getElementById("chcol2").style.backgroundColor = "#1DD11D";
   }
   finally {}
  }
}
//  End -->
</script>

<SCRIPT LANGUAGE="JavaScript">
<!-- Beginning of JavaScript -

var message=new Array();
message[0]="Отсылка заявки с сайта прямо владельцу объекта"; 
message[1]="Никаких СМС, звонков и оплат - только ваше желание";
message[2]="Просто выберите, что вы хотите и нажмите кнопку Отправить";
// the URLs of your messages
var messageurl=new Array();
messageurl[0]="#";
messageurl[1]="#";
messageurl[2]="#";
// the targets of the links
// accepted values are '_blank' or '_top' or '_parent' or '_self'
// or the name of your target-window (for instance 'main')
var messagetarget=new Array()
messagetarget[0]="_blank";
messagetarget[1]="_blank";
messagetarget[2]="_blank";
// the images that create the magic effect of the letters.
// You can add an image for each message 
var messageimage=new Array()
messageimage[0]="1.jpg";
messageimage[1]="2.jpg";
messageimage[2]="3.jpg";
// font-color of messages (required for Netscape Navigator)
var messagecolor="red";
// distance of the scroller to the left margin of the browser-window (pixels)
var scrollerleft=10;
// distance of the scroller to the top margin of the browser-window (pixels)
var scrollertop=127;
// speed 1: lower means faster
var pause=20;
// speed 2: higher means faster
var step=4;
// font-size
var fntsize=12;
// font-family
var fntfamily="Arial";
// font-weight: 1 means bold, 0 means normal
var fntweight=1;
// do not edit the variables below
var imgpreload=new Array();
for (i=0;i<=messageimage.length-1;i++) {
	imgpreload[i]=new Image();
	imgpreload[i].src=messageimage[i];
}
var scrollerwidth=220;
var scrollerheight=20;
var backgroundimagecontent;
var clipleft,clipright,cliptop,move_text_clipbottom,clipleftbg, cliprightbg;
var i_message=0;
var timer;
var textwidth;
var textcontent="";
if (fntweight==1) { fntweight="700"; }
else { fntweight="100"; }

function move_text_init() {
	gettextcontent();
	document.getElementById('move_text').innerHTML=textcontent;
	
	if (document.layers) {
		alert("dddd"); 
		document.move_textnetscape.document.write(textcontent);
		document.move_textnetscape.document.close();
		textwidth=document.move_textnetscape.document.width;
		document.move_textnetscape.top=scrollertop;
		document.move_textnetscape.left=scrollerleft+scrollerwidth;
		document.move_textnetscape.clip.left=0;
		document.move_textnetscape.clip.right=0;
		document.move_textnetscape.clip.top=0;
		document.move_textnetscape.clip.bottom=scrollerheight;
		scrolltext();
	}
	else
	//if (document.all)
	{
		
		backgroundimagecontent="<img src='"+messageimage[0]+"' width='"+scrollerwidth+"'>";
		document.all.move_text.innerHTML=textcontent;
		textwidth=move_text.offsetWidth;
		move_text_backgroundimage.innerHTML=backgroundimagecontent;
		document.all.move_text.style.height=scrollerheight;
		document.all.move_text.style.posTop=scrollertop;
		//document.all.move_text.style.filter="chroma(color="+messagecolor+")";
		document.all.move_text.style.posLeft=scrollerleft+scrollerwidth;
		document.all.move_text_backgroundimage.style.posTop=scrollertop;
		document.all.move_text_backgroundimage.style.posLeft=scrollerleft;
		clipleft=0;
		clipright=0;
		cliptop=0;
		clipbottom=scrollerheight;
		clipleftbg=scrollerwidth;
		cliprightbg=scrollerwidth;
		//alert("sss"+move_text_clipbottom);
		//document.all.move_text.style.clip="rect("+0+" "+0+" "+0+" "+0+")" 
		//alert("rect("+cliptop+" "+clipright+" "+clipbottom+" "+clipleft+")");
		//alert(document.all.move_text.style.clip);
		document.all.move_text.style.clip="rect("+cliptop+"px "+clipright+"px "+clipbottom+"px "+clipleft+"px)"; 
		document.all.move_text_backgroundimage.style.clip="rect("+cliptop+"px "+cliprightbg+"px "+clipbottom+"px "+clipleftbg+"px)";
		scrolltext();
	}
	
}

function scrolltext() {
    if (document.layers) {
		if (document.move_textnetscape.left>=scrollerleft-textwidth) {
			document.move_textnetscape.left-=ste
			document.move_textnetscape.clip.right+=step;
			if (document.move_textnetscape.clip.right>scrollerwidth) {
				document.move_textnetscape.clip.left+=step;
			}
			var timer=setTimeout("scrolltext()",pause);
		}
		else {
			changetext();
		}
	}
    else	
    //if (document.all)
    {
		if (document.all.move_text.style.posLeft>=scrollerleft-textwidth) {
			document.all.move_text.style.posLeft-=step;
			clipright+=step;
			clipleftbg-=step;
			if (clipright>scrollerwidth) {
				clipleft+=step;
			}
			if (document.all.move_text.style.posLeft<scrollerleft-textwidth+scrollerwidth) {
				cliprightbg-=step;
			}
			document.all.move_text.style.clip ="rect("+cliptop+"px "+clipright+"px "+clipbottom+"px "+clipleft+"px)";
			document.all.move_text_backgroundimage.style.clip="rect("+cliptop+"px "+cliprightbg+"px "+clipbottom+"px "+clipleftbg+"px)";
			var timer=setTimeout("scrolltext()",pause);
		}
		else {
			changetext();
		}
	}
   
}

function changetext() {
    i_message++;
	if (i_message>message.length-1) { i_message=0; }
	gettextcontent();
	
	if (document.layers) {
   		
		document.move_textnetscape.document.write(textcontent);
		document.move_textnetscape.document.close();
		textwidth=document.move_textnetscape.document.width;
		document.move_textnetscape.left=scrollerleft+scrollerwidth;
		document.move_textnetscape.clip.left=0;
		document.move_textnetscape.clip.right=0;	
        	
		scrolltext();
	}
	else
	//if (document.all)
	{

		move_text.innerHTML=textcontent;
		textwidth=move_text.offsetWidth;
        	backgroundimagecontent="<img src='"+messageimage[i_message]+"' width='"+scrollerwidth+"'>";
       		move_text_backgroundimage.innerHTML=backgroundimagecontent;
        	document.all.move_text.style.posLeft=scrollerleft+scrollerwidth;
		clipleft=0;
		clipright=0;
        	clipleftbg=scrollerwidth;
        	cliprightbg=scrollerwidth;
		document.all.move_text.style.clip="rect("+cliptop+"px "+clipright+"px "+clipbottom+"px "+clipleft+"px)";
        	document.all.move_text_backgroundimage.style.clip="rect("+cliptop+"px "+cliprightbg+"px "+clipbottom+"px "+clipleftbg+"px)";
        	scrolltext();
	//
	}

	
}

function gettextcontent() {
	textcontent="<span style='position:relative;font-size:"+fntsize+"pt;font-family:"+fntfamily+";font-weight:"+fntweight+"'>";
	textcontent+="<a href="+messageurl[i_message]+" target="+messagetarget[i_message]+">";
	textcontent+="<nobr><font color="+messagecolor+">"+message[i_message]+"</font></nobr></a></span>";
}

//window.onresize=move_text_init();

// - End of JavaScript - -->
</SCRIPT>

<script type="text/javascript">
  function select_pop_tab(tab_node) {
	document.getElementById('pop_tabs_current').id='';
	document.getElementById('pop_tabs_active').id='';
	tab_node.parentNode.id='pop_tabs_active';
	tab_node.id='pop_tabs_current';
	document.getElementById("top_popular_container").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>Обновление...</center>';
  }
</script>
</head>

<body onLoad="top_frame_load();">
<div id="move_text_backgroundimage" style="position:absolute;background-color:#B4FF54;left:-2000px;z-index:-1;"></div>
<div id="move_text" style="position:absolute;background-color:#B4FF54;left:-2000px;"></div>
<div id="move_textnetscape" style="position:absolute;left:-2000px;background-color:#B4FF54;"></div>
<div id="top_layer_back">
  <table cellpadding="0" cellspacing="0" border="0" style="background-image:url(images/top_back34.jpg);height:100%;" width="100%" ><tr><td>
  </td></tr></table>  
</div>
<div id="top_layer_popular_rotation">
  <table border="0" cellspacing="0" cellpadding="0"><tr><td>
  <div id="top_popular_container" style="height:99px;border-width:0px;border-color:black;border-style:solid;z-index:200;">
            <br/><span style="text-align:left;"><img src="images/busy.gif" /><br/>Обновление...</span>
  </div>
  </td></tr><tr><td>
  <div id="pop_tabs_navcontainer" style="width:320px;">
          <ul id="pop_tabs_navlist">
          <li id="pop_tabs_active"><a href="#" id="pop_tabs_current" onClick="select_pop_tab(this); curr_htupe=-1;">Все</a></li>
          <li><a href="#" onClick="select_pop_tab(this); curr_htupe=7;">Гостев. дома</a></li>
          <li><a href="#" onClick="select_pop_tab(this); curr_htupe=6;">Частн. сектор</a></li>
          <li><a href="#" onClick="select_pop_tab(this); curr_htupe=1;">Гостиницы</a></li>
          <!--<li><a href="#" onClick="select_pop_tab(this); curr_htupe=11;">Детск. отдых</a></li>-->
          </ul>
        </div>
   </td></tr></table>	
</div>
<div id="top_layer_front">
<div id="navcontainer">
	<ul id="navlist">
	<li id="active"><a href="MainFrame.php" title="Переход на главную страницу" target="mainFrame">{главная}</a> 
	<!--<ul id="subnavlist">
	<li id="subactive"><a href="#" id="subcurrent">Subitem one</a></li>
	<li><a href="#">Subitem two</a></li>
	</ul>-->
	</li>
	<li><a href="MainFrame.php?mp_mode=blog_list" title="Блог на сайте ANAPA-TUT" target="mainFrame">{блог}</a></li>
	<li><a href="#" title="Список форумов">{общение}</a></li>
	<li><a href="MainFrame.php?bid=1" title="Рекомендации и советы собирающимся на отдых" target="mainFrame">{советы}</a></li>
	<li><a href="MainFrame.php?bid=1" title="О недорогом отдыхе" target="mainFrame">{недорого}</a></li>
	<li><a href="MainFrame.php?bid=2" title="Детский отдых" target="mainFrame">{детский отдых}</a></li>
	<li><a href="MainFrame.php?bid=6" title="Транспорт на курорте" target="mainFrame">{транспорт}</a></li>
	<li><a href="MainFrame.php?bid=3" title="Лечение на курорте" target="mainFrame">{лечение}</a></li>
	<li><a href="MainFrame.php?mp_mode=ph_list" title="Фотогаллерея города-курорта Анапа" target="mainFrame">{фото}</a></li>
	<li><a href="MainFrame.php?bid=7" title="О разработчиках сайта" target="mainFrame">{о проекте}</a></li>
	</ul>
	
  </div>
<div style="border-width:2px;border-style:solid;border-bottom-color:#1DD11D;border-left-color:#FFFFFF;border-right-color:#FFFFFF;border-top-color:#FFFFFF;">
          <table width="100%" height="92" border="0" cellspacing="2" cellpadding="2" style="background-image:url('images/top_back_smpl1_4.jpg'); background-repeat:repeat-x;"><tr>
            <td width="310" style="background-image:url('images/top_back4_1_4.jpg'); background-repeat: no-repeat;">
              <table border="0" width="100%"><tr>
                <td width="350"  align="left" valign="top"><img style="height:78px;vertical-align:top;border-width:2px;border-style:solid;border-color:#FF9900;" src="images/logo/logo1.png"/></td>
                </tr>
              </table>
            </td>
        <td width="" valign="middle">
	</td>	
        <td width="120" valign="middle">
	    <a href="http://www.gismeteo.ru/city/daily/5211/"><img src="http://informer.gismeteo.ru/new/5211-10.GIF" alt="GISMETEO: Погода по г.Анапа" title="GISMETEO: Погода по г.Анапа" border="0"></a>	
	</td>
        <td width="120" align="center" valign="middle" >
	  <span class="logo_text">АНАПА - ТУТ</span>
          <div style="color:#bbbbbb;font-size:12px;text-align:center;">Разработано<br/><a href="http://ps-develop.ru/" style="color:#FF0000;">PS-DEVELOP (ps-develop.ru)</a></div>	
        </td>
    <!--<td width="50" align="right" valign="top">
	<a class="a_exp" border="5px" href="MainFrame.php?mp_mode=ph_list" title="Лучшие живые фото Анапы..." alt="Лучшие живые фото Анапы..." target="mainFrame"><div class="img_exp"><img src="images/gallery/water_fungus3.jpg" style="height:86px;"/></div></a>
    </td>-->
    <td width="100" align="right" valign="top">
	<a class="a_exp" border="5px" href="MainFrame.php?mp_mode=ph_list" title="Лучшие живые фото Анапы..." alt="Лучшие живые фото Анапы..." onClick="window.parent.frames[1].window.location='MainFrame.php?mp_mode=ph_list';" target="mainFrame"><div class="img_exp"><img src="images/gallery/seagull8.jpg"/></div></a>
    </td>
	</tr></table>
</div>
	
	<table border="0" cellspacing="0" cellpadding="0" width="100%" style="padding-left:10px;padding-right:10px;padding-bottom:2px;padding-top:2px;margin:2px;color:#FFFFFF;font-family:Arial;font-size:12px;">
		<tr>
			<?php
			  //$counter=0;
			  //while($counter<100) {
			  //   print "<td align=center id=chcol".$counter." name=id=chcol".$counter.">&nbsp</td>";
			  //$counter++;   
			  //}
			?>
			<td width="1000">&nbsp;</td>
			<td align=center id=chcol0 name=id=chcol0 width="130" bgcolor="#FF9900" valign="middle">Выгодно</td>
			<td align=center id=chcol1 name=id=chcol1 width="130" bgcolor="#75bcf2" valign="middle">Оптимально</td>
			<td align=center id=chcol2 name=id=chcol2 width="130" bgcolor="#1DD11D" valign="middle">Просто</td>
		</tr>
	</table>	
</div>

</body>
</html>
