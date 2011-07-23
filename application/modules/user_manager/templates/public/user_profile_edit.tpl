<form action="http://kupontut.il/user_manager" 	id="gogogo" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="c_t"></div>
	<div class="c_c">
		<div class="c_content">
			<div class="crumb"><span>Личный кабинет</span></div>
			<ul class="menu_lk">
				<li class="active"><a href="#">Мои данные</a></li>
				<li><a href="/user_manager/kupon">Мои купоны</a> <span>(нет активных)</span></li>
				<li><a href="/user_manager/account">Лицевой счет</a> 30000 руб.</li>
			</ul>

			
				<div class="form data1">
					<div class="input"><label>Имя</label><div><input type="text" value="{$first_name}" name="first_name" /></div></div>
					<div class="input"><label>Фамилия</label><div><input type="text" value="{$last_name}" name="last_name" /></div></div>
					<div class="input"><label>Город</label><span>Минск</span></div>
					<div class="input"><label>Почта</label><div><input type="text" disabled="disabled" value="{$email}" name="email" /></div></div>
					<div class="input"><label>Новый пароль:</label><div><input type="password" value="" name="new_password" /></div></div>
					<div class="input"><label>Повторите новый:</label><div><input type="password" value="" name="confirm_new_password" /></div></div>
					<div class="input"><label>Старый пароль</label><div><input type="password" value="" name="old_password" /></div></div>	
				</div>
				<div class="form data1 data2">
					<div class="input"><label>Ник</label><div><input type="text" value="{$username}" name="username" /></div></div>
					<div class="input"><label>Телефон</label><div><input type="text" value="{$phone}" name="phone" /></div></div>
					<div class="input"><label>Пол</label>
						<div>
							<select name="sex">
								<option {if $sex == 'm'}selected="selected"{/if} value="m">Мужской</option>
								<option {if $sex == 'w'}selected="selected"{/if} value="w">Женский</option>
							</select>
						</div>
					</div>
					<div class="input">
						<label>Дата рождения</label>
						<div class="sel1">
							<select name="day">
								{for $i=1;$i<32;$i++}<option value="{$i}" {if $i==date("d", $age)}selected="selected"{/if}>{if $i < 10}0{/if}{$i}</option>{/for}
							</select>
						</div>
						<div class="sel1">
							<select name="month">
							{for $i=1;$i<13;$i++}<option value="{$i}" {if $i==date("m", $age)}selected="selected"{/if}>{if $i < 10}0{/if}{$i}</option>{/for}
							</select>
						</div>
						<div class="sel2">
							<select name="year">
							{for $i=1940;$i<2010;$i++}<option value="{$i}" {if $i==date("Y", $age)}selected="selected"{/if}>{$i}</option>{/for}
							</select>
						</div>
					</div>
					<div class="input check">
						<label>&nbsp;</label>
						<label class="ch"><input type="checkbox" {if $newsletter == 1}checked="checked"{/if} value="1" name="newsletter" /><font>Получать рассылку</font></label>
					</div>
					<div class="input check">
						<label>&nbsp;</label>
						<label class="ch"><input type="checkbox" {if $notifications == 1}checked="checked"{/if} value="1" name="notifications" /><font>Получать уведомления</font></label>
					</div>

					<input type="hidden" name="go" value="1" />
				</div>
			<div class="clear"><img src="{$THEME}/images/x.gif" alt="" /></div>
			<div class="inf_msg">
				<p style="color:green;">{$messages}</p>
			</div>
		</div>
	</div>
	<div class="c_b">
		<span class="button4" onclick=" $('#gogogo').submit();"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="Сохранить" name="print" /></span><span class="r">&nbsp;</span></span>
	</div>
	{form_csrf()}
</form>
<div class="clear"><img src="{$THEME}/images/x.gif" alt="" /></div>
<div class="know"><p>Узнайте, как KuponTut.by может помочь Вам получить тысячи новых покупателей </p></div>
<div class="clear"><img src="{$THEME}/images/x.gif" height="70" alt="" /></div>

