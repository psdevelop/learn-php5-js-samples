var XMLHttp = getXMLHttp_();

function ssearch() {
//document.getElementById("find").style.visibility = "visible"; //���������� ��������
//var ssearch = document.getElementById("ssearch").value; //�������� �������� �� �����
//���������� ���� � ���������� ������
url = "search.php?x=" + ssearch;
XMLHttp.open("GET", url, true);
XMLHttp.onreadystatechange = handlerFunction;
XMLHttp.send(null);
}
 
function handlerFunction() {
//���� ��������� �� ������ �������� � ������� ��������� � ���� result
if (XMLHttp.readyState == 4) {
//document.getElementById("find").style.visibility = "hidden";
//document.getElementById("result").innerHTML = XMLHttp.responseText;
}
}
 
function getXMLHttp_() {
if (window.XMLHttpRequest) {
try {
XMLHttp = new XMLHttpRequest();
} catch (e) { }
} else if (window.ActiveXObject) {
try {
XMLHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) { }
}
}
return XMLHttp;
}