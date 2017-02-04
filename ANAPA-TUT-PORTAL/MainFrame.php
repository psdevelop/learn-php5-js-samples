<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<!--<META HTTP-EQUIV="Page-Enter" CONTENT="BlendTrans(Duration=2.0)">-->
<link href="styles/main_frame.css" rel="stylesheet" type="text/css">
<link href="styles/attached.css" rel="stylesheet" type="text/css">	

<script language="JavaScript" type="text/javascript" src="ajax.js"></script><!--цепляем аякс-->
<script language="JavaScript" type="text/javascript" src="anapatut.js"></script><!--дополнительные функции для сайта-->
<script type="text/javascript" src="jquery-1.4.2.js"></script>
<script language="JavaScript" type="text/javascript">
function ChangeSearchHType() {
   GetVertRatingList();
}

function main_frame_load() {
   GetVertRatingList();
   GetBest(1,0,3);
   
   //window.parent.frames[0].window.document.body.innerHTML="Hallo";
   if (GetParam(window.location.search,"mp_mode")=="ph_list")
	{
	   LoadGalleryById(0);
	}
   else if (GetParam(window.location.search,"mp_mode")=="blog_list")
	{
	   LoadBlogPage(-1,"blog_list");
	}
   else if (GetParam(window.location.search,"hid")!="")
   {
	GetHotelInfo(GetParam(window.location.search,"hid"));
	addByHotelClick(GetParam(window.location.search,"hid"),"Hotel from main params");
	
   }
   else if(GetParam(window.parent.window.location.search,"hid")!="")
   {
	GetHotelInfo(GetParam(window.parent.window.location.search,"hid"));
	addByHotelClick(GetParam(window.parent.window.location.search,"hid"),"Hotel from index params");
   }
   else if (GetParam(window.location.search,"bid")!="")
   {
	LoadBlogPage(GetParam(window.location.search,"bid"),"blog_content");
	addByHotelClick(GetParam(window.location.search,"bid"),"Blog from main params");
   }
   else if(GetParam(window.parent.window.location.search,"bid")!="")
   {
	LoadBlogPage(GetParam(window.parent.window.location.search,"bid"),"blog_content");
	addByHotelClick(GetParam(window.parent.window.location.search,"bid"),"Blog from index params");
   }
   else
   {
	LoadBlogDiv(-1);
   }
}

var MainPartXMLHttp = getXMLHttp_();

function LoadMainPart() {
   addEnterClick("LoadingMainPage");
   url = "MainSitePart.php";
   //alert(url); 
   MainPartXMLHttp.open("GET", url, true);
   MainPartXMLHttp.onreadystatechange = MainPartLoadHandlerFunction;
   MainPartXMLHttp.send(null);
}

function MainPartLoadHandlerFunction() {
//если завершено
   if (MainPartXMLHttp.readyState == 4) {
      document.getElementById("main_part").innerHTML = MainPartXMLHttp.responseText;
      //alert("ddd");
      main_frame_load();
      addEnterClick("Main page is loaded.");
}
}

</script>
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" onLoad="LoadMainPart();">
<div id="myalt" class="base_hint_div">
</div>
<div id="top_layer_back">
</div>
<table border="0" width="100%">      
      <tr><td>		
		<div id="main_part">
			<br/><center><img src="images/busy.gif" /><br/>Загрузка...</center>
		</div>
      </td></tr>
      <tr><td>
	<table border="0" width="100%">
	<tr>
		<td><table border="0"><tr>
					<td><div style="font-size:9px;color:#BBBBBB;">Строка внутреннего состояния сайта. </div></td>
					<td><div id="add_click_state" style="font-size:9px;color:#BBBBBB;">Все хорошо.</div></td>
		</tr></table></td>
                <td style="width:100px;">
					<!--Rating@Mail.ru counter-->
			<script language="javascript"><!--
			d=document;var a='';a+=';r='+escape(d.referrer);js=10;//--></script>
			<script language="javascript1.1"><!--
			a+=';j='+navigator.javaEnabled();js=11;//--></script>
			<script language="javascript1.2"><!--
			s=screen;a+=';s='+s.width+'*'+s.height;
			a+=';d='+(s.colorDepth?s.colorDepth:s.pixelDepth);js=12;//--></script>
			<script language="javascript1.3"><!--
			js=13;//--></script><script language="javascript" type="text/javascript"><!--
			d.write('<a href="http://top.mail.ru/jump?from=1834605" target="_top">'+
			'<img src="http://de.cf.bb.a1.top.mail.ru/counter?id=1834605;t=140;js='+js+
			a+';rand='+Math.random()+'" alt="Рейтинг@Mail.ru" border="0" '+
			'height="40" width="88"><\/a>');if(11<js)d.write('<'+'!-- ');//--></script>
			<noscript><a target="_top" href="http://top.mail.ru/jump?from=1834605">
			<img src="http://de.cf.bb.a1.top.mail.ru/counter?js=na;id=1834605;t=140" 
			height="40" width="88" border="0" alt="Рейтинг@Mail.ru"></a></noscript>
			<script language="javascript" type="text/javascript"><!--
			if(11<js)d.write('--'+'>');//--></script>
			<!--// Rating@Mail.ru counter-->
		</td>
                <td style="width:100px;">
			<!--LiveInternet counter--><script type="text/javascript"><!--
				document.write("<a href='http://www.liveinternet.ru/click' "+
				"target=_blank><img src='//counter.yadro.ru/hit?t14.6;r"+
				escape(document.referrer)+((typeof(screen)=="undefined")?"":
				";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
				screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
				";"+Math.random()+
				"' alt='' title='LiveInternet: показано число просмотров за 24"+
				" часа, посетителей за 24 часа и за сегодня' "+
				"border='0' width='88' height='31'><\/a>")
				//--></script><!--/LiveInternet-->
		</td>
	</tr>
	</table>
      </td>
  </tr></table>    
</body>
</html>