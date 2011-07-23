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
					<div class="input"><label>Имя</label><div><input type="text" value="<?php if(isset($first_name)){ echo $first_name; } ?>" name="first_name" /></div></div>
					<div class="input"><label>Фамилия</label><div><input type="text" value="<?php if(isset($last_name)){ echo $last_name; } ?>" name="last_name" /></div></div>
					<div class="input"><label>Город</label><span>Минск</span></div>
					<div class="input"><label>Почта</label><div><input type="text" disabled="disabled" value="<?php if(isset($email)){ echo $email; } ?>" name="email" /></div></div>
					<div class="input"><label>Новый пароль:</label><div><input type="password" value="" name="new_password" /></div></div>
					<div class="input"><label>Повторите новый:</label><div><input type="password" value="" name="confirm_new_password" /></div></div>
					<div class="input"><label>Старый пароль</label><div><input type="password" value="" name="old_password" /></div></div>	
				</div>
				<div class="form data1 data2">
					<div class="input"><label>Ник</label><div><input type="text" value="<?php if(isset($username)){ echo $username; } ?>" name="username" /></div></div>
					<div class="input"><label>Телефон</label><div><input type="text" value="<?php if(isset($phone)){ echo $phone; } ?>" name="phone" /></div></div>
					<div class="input"><label>Пол</label>
						<div>
							<select name="sex">
								<option <?php if($sex == 'm'): ?>selected="selected"<?php endif; ?> value="m">Мужской</option>
								<option <?php if($sex == 'w'): ?>selected="selected"<?php endif; ?> value="w">Женский</option>
							</select>
						</div>
					</div>
					<div class="input">
						<label>Дата рождения</label>
						<div class="sel1">
							<select name="day">
								<?php for($i=1;$i<32;$i++){?><option value="<?php if(isset($i)){ echo $i; } ?>" <?php if($i==date("d", $age)): ?>selected="selected"<?php endif; ?>><?php if($i < 10): ?>0<?php endif; ?><?php if(isset($i)){ echo $i; } ?></option><?php } ?>
							</select>
						</div>
						<div class="sel1">
							<select name="month">
							<?php for($i=1;$i<13;$i++){?><option value="<?php if(isset($i)){ echo $i; } ?>" <?php if($i==date("m", $age)): ?>selected="selected"<?php endif; ?>><?php if($i < 10): ?>0<?php endif; ?><?php if(isset($i)){ echo $i; } ?></option><?php } ?>
							</select>
						</div>
						<div class="sel2">
							<select name="year">
							<?php for($i=1940;$i<2010;$i++){?><option value="<?php if(isset($i)){ echo $i; } ?>" <?php if($i==date("Y", $age)): ?>selected="selected"<?php endif; ?>><?php if(isset($i)){ echo $i; } ?></option><?php } ?>
							</select>
						</div>
					</div>
					<div class="input check">
						<label>&nbsp;</label>
						<label class="ch"><input type="checkbox" <?php if($newsletter == 1): ?>checked="checked"<?php endif; ?> value="1" name="newsletter" /><font>Получать рассылку</font></label>
					</div>
					<div class="input check">
						<label>&nbsp;</label>
						<label class="ch"><input type="checkbox" <?php if($notifications == 1): ?>checked="checked"<?php endif; ?> value="1" name="notifications" /><font>Получать уведомления</font></label>
					</div>

					<input type="hidden" name="go" value="1" />
				</div>
			<div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" alt="" /></div>
			<div class="inf_msg">
				<p style="color:green;"><?php if(isset($messages)){ echo $messages; } ?></p>
			</div>
		</div>
	</div>
	<div class="c_b">
		<span class="button4" onclick=" $('#gogogo').submit();"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="Сохранить" name="print" /></span><span class="r">&nbsp;</span></span>
	</div>
	<?php  echo form_csrf ();  ?>
</form>
<div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" alt="" /></div>
<div class="know"><p>Узнайте, как KuponTut.by может помочь Вам получить тысячи новых покупателей </p></div>
<div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" height="70" alt="" /></div>

<?php $mabilis_ttl=1311507022; $mabilis_last_modified=1311421955; //Z:\home\kupontut.il\www\application\modules\user_manager/templates/public/user_profile_edit.tpl ?>