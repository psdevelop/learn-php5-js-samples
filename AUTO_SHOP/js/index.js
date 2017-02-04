function on_doc_load()  {
    document.getElementById("s_foother").innerHTML = 
	"<b>Превед </b>медвед!"+ 
	"Сайт успешно загружен... ENJOY...";
    refreshCreateCard();
	//.........................
	//startLoader();
}

function stopLoader()	{

}

function adminLogin()   {
    if ((document.getElementById("adm_login").value=='admin') && 
            (document.getElementById("adm_login").value=='admin'))  {
        document.getElementById("mod_center").innerHTML = 
            "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
        $.ajax({
          url: "ajax/adminPanel.php",
          success: function(data){
            //alert( "Прибыли данные: " + data );

           document.getElementById("mod_center").innerHTML =
                data;    
          }
        })();
    }   else
    alert('Неверные логин или пароль администратора!');
}

function startLoader()	{
	document.getElementById("body_loader_img").
                innerHTML = "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
}

function refreshCreateCard()    {
    document.getElementById("card").innerHTML = 
            "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
    $.ajax({
      url: "ajax/refreshCreateCard.php",
      success: function(data){
        //alert( "Прибыли данные: " + data );
        
          //sleep(5);
          document.getElementById("card").innerHTML =
            data;    
      }
    })();
}

function loadNews(news_id)  {
    document.getElementById("mod_center").innerHTML = 
            "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
    $.ajax({
      url: "ajax/getOneNewsCenter.php?news_id="+news_id,
      success: function(data){
        //alert( "Прибыли данные: " + data );
        
       document.getElementById("mod_center").innerHTML =
            data;    
      }
    })();
}

function loadCatProducts(cat_id)  {
    document.getElementById("mod_center").innerHTML = 
            "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
    $.ajax({
      url: "ajax/getCatContentCenter.php?cat_id="+cat_id,
      success: function(data){
        //alert( "Прибыли данные: " + data );
        
       document.getElementById("mod_center").innerHTML =
            data;    
      }
    })();
}

function searchProducts()  {
    document.getElementById("mod_center").innerHTML = 
            "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
    $.ajax({
      url: "ajax/searchProducts.php"+
              "?like_str="+encodeURIComponent(document.getElementById("like_str").value),
      success: function(data){
        //alert( "Прибыли данные: " + data );
       // alert(document.getElementById("lang_filt").value);
       document.getElementById("mod_center").innerHTML =
            data;    
      }
    })();
}

function addToCard(product_id)  {
    $.ajax({
      url: "ajax/addToCard.php?product_id="+product_id,
      success: function(data){
        //alert( "Прибыли данные: " + data );
        
          //sleep(5);
          //document.getElementById("card").innerHTML =
          //  data; 
          refreshCreateCard();
      }
    })();
}

function addNewProduct()    {
    $.ajax({
      url: "ajax/addNewProduct.php?pr_name="+
              encodeURIComponent(document.getElementById("pr_name").value)+
              "&pr_price="+encodeURIComponent(document.getElementById("pr_price").value)+
              "&pr_mark="+encodeURIComponent(document.getElementById("pr_mark").value)+
              "&cat_id="+encodeURIComponent(document.getElementById("cat_sel").value),
      success: function(data){
        //alert( "Прибыли данные: " + data );
        
          //sleep(5);
          //document.getElementById("card").innerHTML =
          //  data; 
          document.getElementById("add_result").innerHTML = 
                  "Посл. добавление: "+document.getElementById("cat_sel").value+","+
                  document.getElementById("pr_name").value+","+
                  document.getElementById("pr_price").value+","+
                  document.getElementById("pr_mark").value+".<br/>"+data;
      }
    })();
}

function resetCard()    {
    $.ajax({
      url: "ajax/resetCard.php",
      success: function(data){
        //alert( "Прибыли данные: " + data );
        
          //sleep(5);
          //document.getElementById("card").innerHTML =
          //  data; 
          refreshCreateCard();
      }
    })();
}

function explodeCard()  {
    document.getElementById("mod_center").innerHTML = 
            "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
    $.ajax({
      url: "ajax/getCardContent.php",
      success: function(data){
        //alert( "Прибыли данные: " + data );
        
       document.getElementById("mod_center").innerHTML =
            data;    
      }
    })();
}

function createNewOrder()  {
    var family, clname, surname, adres, tr_select;
    
    family=document.getElementById("family").value;
    clname=document.getElementById("clname").value;
    surname=document.getElementById("surname").value;
    adres=document.getElementById("adr").value;
    tr_select=document.getElementById("tr_select").value;
    
    document.getElementById("mod_center").innerHTML = 
            "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
    
    $.ajax({
      url: "ajax/getCardContent.php?add_order=yes&family="+
              encodeURIComponent(family)+
              "&name="+encodeURIComponent(clname)+
              "&surname="+encodeURIComponent(surname)+
              "&adres="+encodeURIComponent(adres)+
              "&tr_select="+encodeURIComponent(tr_select),
      success: function(data){
        //alert( "Прибыли данные: " + data );
        
//          alert("ajax/getCardContent.php?add_order=yes&family="+
//              encodeURIComponent(document.getElementById("family").value)+
//              "&name="+encodeURIComponent(document.getElementById("clname").value)+
//              "&surname="+encodeURIComponent(document.getElementById("surname").value)+
//              "&adres="+encodeURIComponent(document.getElementById("adr").value));  
          document.getElementById("mod_center").innerHTML =
                data;
            refreshCreateCard();
      }
    })();
}

$(document).ready(function() {
   // put all your jQuery goodness in here.
   
 });




