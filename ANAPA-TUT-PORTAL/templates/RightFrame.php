  
<table>
<tr>
    <td align="left" colspan="2" style="width:100%;" class="search_panel_txt">
				<div class="base_header_div">���������� �����. ������ �� ������ ������.</div>
				<div id="searchp_frame" class="base_div" style="border-style:dotted;border-width:1px;font-size:12px;width:100%;">
					<?php  
					include("templates/SearchPanelFrame.php"); ?>
				</div>
	</td>
</tr>  
<tr><td valign="top">
<table align="center" width="150" height="100" border="0" cellspacing="2" cellpadding="0">
  <tr align="center">
  <td  valign="top" align="center">
    <div class="base_header_div">� ����� ���� ���</div>
    <div class="img_shadow"><img alt="���� ������ �����" onclick=" addEnterClick('Foto anapa'); LoadGalleryById(1,1);" src="images/gallery/anapa_state2.jpg" style="width:200px;"/></div>
    <div class="img_shadow"><img alt="��������� �����" onclick="  addEnterClick('Foto aquaparks anapa'); LoadGalleryById(6,1);" src="images/gallery/anapa_aqua2.jpg" style="width:200px;"/></div>
    <div class="img_shadow"><img alt="����� �����" onclick=" addEnterClick('Foto beach anapa'); LoadGalleryById(7,1);" src="images/sand_beach2.jpg" style="width:200px;"/></div>
    <div class="img_shadow"><img alt="������� �����" onclick="  addEnterClick('Childs anapa'); LoadGalleryById(10,1);" src="images/child_rest2.jpg" style="width:200px;"/></div>
  </td></tr>  
  <tr align="center">
    
  <td  valign="top" align="left">
	
	<div style="padding:5px;">
	  <center>
	    <a href="#" class="OrderCallButton" onClick="document.getElementById('order_dialog').style.display='block';">�������� ���</a>
	  </center>
	</div>
	
	<div id="order_dialog" class="framed" style="display:none;">
        <div class="f_tt"></div>
        <div class="f_r"><div class="f_rr"></div>
            <div class="f_b"><div class="f_bb"><div></div></div>
                <div class="f_l"><div class="f_ll"><div></div></div>
                    <div class="f_c">
	
	<div class="send_msg_header_div">�������� ���������</div> 
	<table width="100%" border="0" cellspacing="2" cellpadding="0" class="OrdersFormsStyle">
	<tr><td style="text-align:center;padding:2px;">
		      <strong><div id="order_mail_header" class="send_msg_go_header_div">�������� �����</div></strong>
		      <strong><div id="order_mail_status"></div></strong>
		      ��� ���������� �������<BR>
			  <input id="order_eadress" name="" type="text" style="width:300px;font-size:14px;">
			  <BR>
			  ����� ������<BR>
			  <textarea id="order_text" name="" rows="6" style="width:300px;font-size:14px;"></textarea>
			  <BR>
			  <table><tr><td>  
			    <input type="button" name="Submit" value="��������� ������" onClick=" addEnterClick('Sendmsg all'); SendUserOrder();"/>
			  </td><td>
			    <input type="button" name="Submit" value="�������" onClick="document.getElementById('order_dialog').style.display='none';"/>
			  </td></tr></table>	
	 </td></tr></table>
	 
	                 </div>
                </div>
            </div>
          </div>
        </div>

	 
  </td></tr>   
  <tr><td> 	
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_txt">
	  <tr>
	    <td>
	      <div class="base_header_div">���������� � ���������</div>
	      <div id="vert_rating_list">
		<center>��������...</center>
	      </div>
	    </td>
	  </tr>
	  <tr>
	    <td></td>
	  </tr>
	  <tr>
	    <td> </td>
	  </tr>
	  <tr>
	    <td></td>
	  </tr>
	  <tr>
	    <td> </td>
	  </tr>
	  <tr>
	    <td></td>
	  </tr>
	  <tr>
	    <td></td>
	  </tr>
	  <tr>
	    <td> </td>
	  </tr>
	  <tr>
	    <td></td>
	  </tr>
	  <tr>
	    <td></td>
	  </tr>
	</table>
	</td>
  </tr>

</table>
</td>
<td align="left" valign="top">
  <table border="0" cellspacing="0" cellpadding="0">
    <tr><td>
      <a class="contact_link" href="#" onClick="window.external.addFavorite('http://anapa-tut.ru/', '�����-���. ��� �� ������ � �����.'); return false;">�������� � ���������</a>
    </td>
    </tr><tr>
    <td>
       <a class="contact_link" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://anapa-tut.ru/'); return false;" href="#" >������� ���������</a>
    </td>
    </tr>
    <tr><td>
      <a href="mailto:psdevelop@yandex.ru?" class="contact_link">�������� ��� (psdevelop@yandex.ru)</a>
    </td></tr>
  </table>
  <table cellpadding="0" cellspacing="2" width="200">
    <tr><td><div class="media_header_div">����� �� �����</div></td></tr>
    <tr><td><div class="img_shadow"><img onclick="addEnterClick('Fireshow'); LoadGalleryById(16,1);" src="images/gallery/fire/fire_show.jpg" style="width:200px;"/></div></td></tr>
    <tr><td style="background-color:#a0d1f6;height:100%;"></td></tr>
    <tr><td><div class="media_header_div">�������� �����</div></td></tr>
    <tr><td><div class="img_shadow"><img onclick="addEnterClick('Surf'); LoadGalleryById(13,1);" src="images/surf1.jpg" style="width:200px;"/></div></td></tr>
    <tr><td><div class="media_header_div">�������</div></td></tr>
    <tr><td style="background-color:#a0d1f6;height:100%;"></td></tr>
    <tr>
	    <td class="main_txt">
	      <div class="base_header_div">���������</div>
	      <ul class="info_links_list">
		<li class="info_links_list">����� �����</li>
		<li>�������� �����</li>
		<li>����� � ��������</li>
		<li>�����������</li>
		<li>������� �������� � ���������</li>
		<li>�������</li>
		<li>������ �����</li>
		<li>�����-�����������</li>
		<li>�������� ���������� ������ � �����</li>
		<li>������� �����, ����������</li>
		<li>������ �����</li>
		<li>����� �������, fire-show</li>
	      </ul>	
	    </td>
	  </tr>
    <tr><td><div class="media_header_div">����� ��������� �������</div></td></tr>
    <tr><td class="main_txt" style="visibility: none;">
      <!--<li>����� ����������� ����� (+���.����������) </li>
	 <li>����� ����������� ��������� (+�������)</li>
	 <li>����� ���������� ������� ��������</li>
	 <li>����� ��-����� � ��������</li>
	 <li>����� � ������� �����</li>
	 <li>��������������</li>-->
    </td></tr>
    <tr><td>
	  <table border="0">
	    <tr>
	      <td>
	      </td>
	      <td>
	      </td>
	    </tr>
	  </table>
    </td></tr>  
  </table>
</td></tr></table>

