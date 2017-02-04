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

function loadGenreLangBooks(genre_id)  {
    document.getElementById("mod_center").innerHTML = 
            "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
    $.ajax({
      url: "ajax/getGenreLangContentCenter.php?genre_id="+genre_id+
              "&lang_id="+document.getElementById("lang_filt").value,
      success: function(data){
        //alert( "Прибыли данные: " + data );
       // alert(document.getElementById("lang_filt").value);
       document.getElementById("mod_center").innerHTML =
            data;    
      }
    })();
}

function searchBooks()  {
    document.getElementById("mod_center").innerHTML = 
            "<img id=\"loader_img\" src=\"images/ajax-loader.gif\"/>";
    $.ajax({
      url: "ajax/searchBooks.php"+
              "?like_str="+document.getElementById("like_str").value,
      success: function(data){
        //alert( "Прибыли данные: " + data );
       // alert(document.getElementById("lang_filt").value);
       document.getElementById("mod_center").innerHTML =
            data;    
      }
    })();
}

function addToCard(book_id)  {
    $.ajax({
      url: "ajax/addToCard.php?book_id="+book_id,
      success: function(data){
        //alert( book_id );
        
          //sleep(5);
          //document.getElementById("card").innerHTML =
          //  data; 
          refreshCreateCard();
      }
    })();
}

function addNewBook()    {
    $.ajax({
      url: "ajax/addNewBook.php?lang_id="+
              encodeURIComponent(document.getElementById("lang_sel").value)+
              "&bk_price="+encodeURIComponent(document.getElementById("bk_price").value)+
              "&bk_name="+encodeURIComponent(document.getElementById("bk_name").value)+
              "&genre_id="+encodeURIComponent(document.getElementById("genre_sel").value)+
              "&bk_maker="+encodeURIComponent(document.getElementById("bk_maker").value)+
              "&bk_year="+encodeURIComponent(document.getElementById("bk_year").value)+
              "&bk_authors="+encodeURIComponent(document.getElementById("bk_authors").value),
      success: function(data){
        //alert( "Прибыли данные: " + data );
        
          //sleep(5);
          //document.getElementById("card").innerHTML =
          //  data; 
          document.getElementById("add_result").innerHTML = 
                  "Посл. добавление: "+data;
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




