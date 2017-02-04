<table style="width:100%;">
<tr>
    <td align="left" colspan="2" class="search_panel_txt">
	<div class="send_msg_go_header_div" >Отправить сообщение владельцу объекта</div>
    </td>
</tr>
<tr>
    <td>
      <table width="100%" border="0" cellspacing="2" cellpadding="0" class="OrdersFormsStyle">
        <tr><td>Введенные вами данные станут доступны владельцу объекта, находящегося над формой отправки
	</td></tr>
	<tr><td style="text-align:center;padding:10px;">
                   <strong><div id="to_owner_order_mail_status"></div></strong>
	           Ваш контактный телефон<BR/>
		       <input id="to_owner_order_eadress" name="" type="text" style="width:220px;">
		       <BR/>Выберите уровень срочности<BR/>
		       <select id="promptlevel" name="promptlevel" size="1" style="width:300px;" class="search_field">
		         <option value="Срочно" selected="true">Срочно</option>
			 <option value="Побыстрей">Побыстрей</option>
			 <option value="По мере поступления (до 1 суток)" selected="true">По мере поступления (до 1 суток)</option>
		       </select>
		       <BR/>	
		       <!--Мин.цена: <div id="min_rent_price"></div><BR/>
		       <table>
			<tr>
			  <td>
			    Дней:<input id="to_owner_days_count" type="text" style="width:70px;">
			  </td>
			  <td>
			    Итого:<div id="to_owner_summary_price"></div>
			  </td>  
			</tr> 
		       </table>	    
		       <BR/>-->	
		       Текст заявки<BR/>
		       <textarea id="to_owner_order_text" name="" rows="5" style="width:300px;"></textarea>
		       <BR/>
		       <input type="button" name="Submit" value="Отправить заявку" onClick="SendUserToOwnerOrder();">
		   </td></tr>
                   </table>
    </td>
</tr>
</table>

