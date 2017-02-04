function getOptionsCodeByBooleans(opt1, opt2, opt3, opt4, opt5, opt6, opt7, opt8,
                        opt9, opt10, opt11, opt12, opt13, opt14, opt15, opt16) {
res = 0;
if(opt1) res=res+1; res = res<<1;
if(opt2) res=res+1; res = res<<1;
if(opt3) res=res+1; res = res<<1;
if(opt4) res=res+1; res = res<<1;
if(opt5) res=res+1; res = res<<1;
if(opt6) res=res+1; res = res<<1;
if(opt7) res=res+1; res = res<<1;
if(opt8) res=res+1; res = res<<1;
if(opt9) res=res+1; res = res<<1;
if(opt10) res=res+1; res = res<<1;
if(opt11) res=res+1; res = res<<1;
if(opt12) res=res+1; res = res<<1;
if(opt13) res=res+1; res = res<<1;
if(opt14) res=res+1; res = res<<1;
if(opt15) res=res+1; res = res<<1;
if(opt16) res=res+1; 

return res;
}

var HotelsXMLHttp = getXMLHttp_();

function HotelsSearch(htype, block, block_num) {
//составл€ем линк и отправл€ем запрос
url = "HotelsSearch.php?htype="+htype+"&block=9&block=9";
HotelsXMLHttp.open("GET", url, true);
HotelsXMLHttp.onreadystatechange = HotelsSearchHandlerFunction;
HotelsXMLHttp.send(null);
}
 
function HotelsSearchHandlerFunction() {
//если завершено
   if (HotelsXMLHttp.readyState == 4) {
      document.getElementById("center_iframe").innerHTML = HotelsXMLHttp.responseText;
}
}

function GetAnapaBusShedule() {
    GetIFrameToCenter("http://www.avtovokzaly.ru/raspisanie/anapa/avtovokzal/0/");
}

function GetTrainTimeTable(date) {
    GetIFrameToCenter("http://pass.rzd.ru/isvp/public/pass/express?time_interval_start=&time_interval_end=&src=%CC%EE%F1%EA%E2%E0&dst=%C0%ED%E0%EF%E0&date="+date+"&Intervl=&schd_id=2&layer_id=4925&refererLayerId=0&action=submit&STRUCTURE_ID=735");
}

function GetIFrameToCenter(iframe_link) {
    iframeinnerhtml = "<iframe src='"+iframe_link+"' width='1050px' height='1050px' frameborder='0' marginwidth='0' marginheight='0'></iframe>";
    document.getElementById("center_iframe").innerHTML = iframeinnerhtml;
}

var SendUserOrderXMLHttp = getXMLHttp_();

function SendUserOrder() {
//составл€ем линк и отправл€ем запрос
url = "SendUserOrder.php?order_eadress="+document.getElementById("order_eadress").value+
  "&order_text="+document.getElementById("order_text").value;
document.getElementById("order_mail_status").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>ѕодождите, отсылка сообщени€...</center>';
SendUserOrderXMLHttp.open("GET", url, true);
SendUserOrderXMLHttp.onreadystatechange = SendUserOrderHandlerFunction;
SendUserOrderXMLHttp.send(null);   
}

function SendUserOrderHandlerFunction() {
//если завершено
   if (SendUserOrderXMLHttp.readyState == 4) {
      document.getElementById("order_mail_status").innerHTML = SendUserOrderXMLHttp.responseText;
      //document.getElementById('order_dialog').style.display='none';
}
}

var SendUserToOwnerOrderXMLHttp = getXMLHttp_();

function SendUserToOwnerOrder() {
//составл€ем линк и отправл€ем запрос
url = "SendUserOrder.php?order_eadress="+document.getElementById("to_owner_order_eadress").value+
  "&order_text="+document.getElementById("to_owner_order_text").value+document.getElementById("promptlevel").value+" ID="+
  document.getElementById("object_id").innerHTML;
document.getElementById("to_owner_order_mail_status").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>ќтсылка сообщени€...</center>';
SendUserToOwnerOrderXMLHttp.open("GET", url, true);
SendUserToOwnerOrderXMLHttp.onreadystatechange = SendUserToOwnerOrderHandlerFunction;
SendUserToOwnerOrderXMLHttp.send(null);   
}

function SendUserToOwnerOrderHandlerFunction() {
//если завершено
   if (SendUserToOwnerOrderXMLHttp.readyState == 4) {
      document.getElementById("to_owner_order_mail_status").innerHTML = SendUserToOwnerOrderXMLHttp.responseText;
}
}

var PanelHotelSearchXMLHttp = getXMLHttp_();

function SearchHotels(htype_select, sregion_select, see_distance_select, min_prise_pers, search_options, block_num, block_len) {
    url = "HotelsSearch.php?htype="+
      htype_select+
      "&block="+block_len+"&block_num="+block_num+"&region_id="+
      sregion_select+
      "&sea_dist="+
      see_distance_select+
      "&min_price_pers="+
      min_prise_pers+
      "&output_type=main_panel_search_result&obj_options="+
      search_options;
      PanelHotelSearchXMLHttp.open("GET", url, true);
      document.getElementById("center_iframe").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>«агрузка...</center>';
      PanelHotelSearchXMLHttp.onreadystatechange = SearchFromPanelHandlerFunction;
      PanelHotelSearchXMLHttp.send(null);
}

function SearchFromPanel() {
if (document.getElementById("search_panel_status").innerHTML!="")
  document.getElementById("search_panel_status").innerHTML = "";
//ѕолучаем переменную опций поиска
search_options=getOptionsCodeByBooleans(
	document.getElementById("Eat").checked,
	document.getElementById("Parking").checked,
	document.getElementById("Cook").checked,
	document.getElementById("Shop").checked,
	document.getElementById("Solaris").checked,
	document.getElementById("Media").checked,
	document.getElementById("Internet").checked,
	document.getElementById("Condition").checked,
	document.getElementById("Sauna").checked,
	document.getElementById("Dance").checked,
	document.getElementById("Bath").checked,
	document.getElementById("Sand").checked,
	document.getElementById("HasTransport").checked,
	false,
	false,
	false);

if (document.getElementById("min_price_pers").value=="") {
	min_prise_pers=0;
}

else {
	if (isNaN(document.getElementById("min_price_pers").value))
	  {
		document.getElementById("search_panel_status").innerHTML =
		  "«начение пол€ ÷≈Ќј не €вл€етс€ числом";
		return -1;
	  }
	else
	  {
		min_prise_pers=document.getElementById("min_price_pers").value;
	  }
   }
   
   SearchHotels(document.getElementById("htype_select").value,
                document.getElementById("sregion_select").value,
                document.getElementById("see_distance_select").value,
                min_prise_pers,
                search_options,0,9);

  }

function SearchFromPanelHandlerFunction() {
//если завершено
   if (PanelHotelSearchXMLHttp.readyState == 4) {
      document.getElementById("center_iframe").innerHTML = PanelHotelSearchXMLHttp.responseText;
}
}

var VertRatingListXMLHttp = getXMLHttp_();

function GetVertRatingList() {
//составл€ем линк и отправл€ем запрос
url = "HotelsSearch.php?output_type=vertical_rating_panel&htype="+
      document.getElementById("htype_select").value;
document.getElementById("vert_rating_list").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>«агрузка...</center>';
VertRatingListXMLHttp.open("GET", url, true);
VertRatingListXMLHttp.onreadystatechange = VertRatingListHandlerFunction;
VertRatingListXMLHttp.send(null);   
}

function VertRatingListHandlerFunction() {
//если завершено
   if (VertRatingListXMLHttp.readyState == 4) {
      document.getElementById("vert_rating_list").innerHTML = VertRatingListXMLHttp.responseText;
}
}

var GetBestXMLHttp = getXMLHttp_();

function GetBest(current_num, step, display_len) {
 if (step<=100) {  
   //составл€ем линк и отправл€ем запрос
   url = "BestObject.php?current_num="+current_num+"&step="+step+"&display_len="+display_len;
   document.getElementById("best_offers").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>«агрузка...</center>';
   GetBestXMLHttp.open("GET", url, true);
   GetBestXMLHttp.onreadystatechange = GetBestHandlerFunction;
   GetBestXMLHttp.send(null);
 }
}

function GetBestHandlerFunction() {
//если завершено
   if (GetBestXMLHttp.readyState == 4) {
      document.getElementById("best_offers").innerHTML = GetBestXMLHttp.responseText;

  $(function(){
    $('.img_exp').hover(function(){ 
      $(this).children('img').stop().animate({width:"300px",height:"200px"}, 400);
    }, function(){ $(this).children('img').stop().animate({width:"200px",height:"150px"}, 400); });
  });

}
}

var BlogDivXMLHttp = getXMLHttp_();

function LoadBlogDiv(blog_num) {
//составл€ем линк и отправл€ем запрос
url = "Blogs.php?out_type=blog_div";
BlogDivXMLHttp.open("GET", url, true);
document.getElementById("blog_themes").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>«агрузка...</center>';
BlogDivXMLHttp.onreadystatechange = LoadBlogDivHandlerFunction;
BlogDivXMLHttp.send(null);
}
 
function LoadBlogDivHandlerFunction() {
//если завершено
   if (BlogDivXMLHttp.readyState == 4) {
      document.getElementById("blog_themes").innerHTML = BlogDivXMLHttp.responseText;
}
}

var PhGalleryXMLHttp = getXMLHttp_();

function LoadGalleryById(pg_id, start_num) {
   if (pg_id<=0) {
      url = "FotoGallery.php?out_type=galleries_list";
   }
   else
     {
        url = "FotoGallery.php?out_type=gallery_content&phg_id="+pg_id+"&start_num="+start_num;
     }
   //alert(url); 
   PhGalleryXMLHttp.open("GET", url, true);
   document.getElementById("center_iframe").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>«агрузка...</center>';
   PhGalleryXMLHttp.onreadystatechange = LoadPhGalleryHandlerFunction;
   PhGalleryXMLHttp.send(null);
}

function LoadPhGalleryHandlerFunction() {
//если завершено
   if (PhGalleryXMLHttp.readyState == 4) {
      document.getElementById("center_iframe").innerHTML = PhGalleryXMLHttp.responseText;
}
}

var BlogPageXMLHttp = getXMLHttp_();

function LoadBlogPage(blog_id, out_type) {
   url = "Blogs.php?out_type="+out_type+"&blog_id="+blog_id;
   //alert(url); 
   BlogPageXMLHttp.open("GET", url, true);
   document.getElementById("center_iframe").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>«агрузка...</center>';
   BlogPageXMLHttp.onreadystatechange = LoadBlogPageHandlerFunction;
   BlogPageXMLHttp.send(null);
}

function LoadBlogPageHandlerFunction() {
//если завершено
   if (BlogPageXMLHttp.readyState == 4) {
      document.getElementById("center_iframe").innerHTML = BlogPageXMLHttp.responseText;
}
}

var HotelInfoXMLHttp = getXMLHttp_();

function GetHotelInfo(hotel_id) {
   url = "HotelInfo.php?hotel_id="+hotel_id;
   //alert(url); 
   HotelInfoXMLHttp.open("GET", url, true);
   document.getElementById("center_iframe").innerHTML = '<br/><center><img src="images/busy.gif" /><br/>«агрузка...</center>';
   HotelInfoXMLHttp.onreadystatechange = HotelInfoHandlerFunction;
   HotelInfoXMLHttp.send(null);
}

function HotelInfoHandlerFunction() {
//если завершено
   if (HotelInfoXMLHttp.readyState == 4) {
      document.getElementById("center_iframe").innerHTML = HotelInfoXMLHttp.responseText;
}
}

var hide=true;//глобальна€ переменна€, отвечающа€ будет ли строка передана в подсказку

/*function movePic(e,word){
oCanvas = document.getElementsByTagName(
   (document.compatMode && document.compatMode == "CSS1Compat") ? "HTML" : "BODY" )[0];
myalt=document.getElementById("myalt");
// x-координата, где произошЄл вызов подсказки
_x = window.event ? event.clientX + oCanvas.scrollLeft : e.pageX;
// y-координата, где произошЄл вызов подсказки
_y = window.event ? event.clientY + oCanvas.scrollTop : e.pageY;
_dx=5
left=false;right=false;

if(_dx+_x+myalt.clientWidth>document.body.clientWidth){
	_x=document.body.clientWidth-myalt.clientWidth-_dx;left=true;}
if(_dx+_y+myalt.clientHeight>document.body.clientHeight){
	_y=document.body.clientHeight-myalt.clientHeight-_dx;right=true;}
if(left&&right)_y=document.body.clientHeight-myalt.clientHeight-_dx*4;
myalt.style.left=_x;
myalt.style.top=_y+document.body.scrollTop;
if(hide){
	myalt.innerHTML=word;
	myalt.style.visibility="visible";
	hide=false;
	}
} */
function hidePic(){
	myalt.style.visibility="hidden";
	myalt.innerHTML="";
	myalt.style.top=0;
	myalt.style.left=0;
	hide=true;
}

function movePic(word){
myalt.innerHTML=word;
_x=window.event.clientX;
_y=window.event.clientY;//сохранение координат курсора мыши в переменные
_dx=50;//смещение подскаки вправо и влево относительно координат мыши
//ќпределение, помещаетс€ ли подсказка между курсором и кра€ми экрана
left=false;right=false;
if(_dx+_x+myalt.clientWidth>document.body.clientWidth){_x=document.body.clientWidth-myalt.clientWidth-_dx;left=true;}
if(_dx+_y+myalt.clientHeight>document.body.clientHeight){_y=document.body.clientHeight-myalt.clientHeight-_dx;right=true;}
//если объект в нижнем правом углу, подсказка всплывает над курсором
if(left&&right)_y=document.body.clientHeight-myalt.clientHeight-_dx*4;
//помещение подсказки в найденные коородинаты
myalt.style.left=_x+20;
myalt.style.top=_y+document.body.scrollTop+20;//смещение подскази в зависимости от высоты прокрученной части документа
myalt.style.visibility="visible";
}

function GetParam(search, name){
name=name+"=";
var gp="";
   if (search!='') {
      if (search.indexOf (name, 0)!=-1){
         var startpos=search.indexOf(name, 0)+name.length;
         var endpos=search.indexOf("&",startpos);
         if (endpos<startpos) { endpos=search.length; }
         var gp=search.substring(startpos,endpos);
      }
      else {
         gp="";
      }
   }
   else {
   gp="";
   }
return gp;
}

function addByHotelClick(hid, comment) {
   AddClickRow(0,1,"none",hid,comment,Date());
}

function addEnterClick(comment) {
   AddClickRow(1,0,"none",-1,comment,Date());
}

var addClickXMLHttp = getXMLHttp_();

function AddClickRow(isenter, ishotel, ipaddr, hid, comment, state) {
   url = "AddClick.php?isenter="+isenter+"&ishotel="+ishotel+"&ipaddr="+ipaddr+"&hid="+hid+"&comment="+comment+"&state="+state;
   //alert(url); 
   addClickXMLHttp.open("GET", url, true);
   addClickXMLHttp.onreadystatechange = addClickHandlerFunction;
   addClickXMLHttp.send(null);
}

function addClickHandlerFunction() {
//если завершено
   if (addClickXMLHttp.readyState == 4) {
      document.getElementById("add_click_state").innerHTML = addClickXMLHttp.responseText;
}
}
