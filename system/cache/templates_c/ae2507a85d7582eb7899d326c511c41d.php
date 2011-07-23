<div class="prof_data">
	<div class="foto">
		<img src="<?php if(strlen($ava) AND $ava != 0): ?>/uploads/<?php if(isset($ava)){ echo $ava; } ?><?php else: ?>/images/def_ava.gif<?php endif; ?>" border="0" />
	</div>
	<div class="pr_right">
		<h4><?php  echo $user_data['0']['username'];  ?></h4>
		<?php if($username ==  $user_data['0']['username']): ?><a href="/user_manager/profile_edit" class="edit">Редактировать аккаунт</a><?php endif; ?>
		
		<?php if(strlen( $user_data['0']['status'] )): ?>
		<div class="status"><?php  echo $user_data['0']['status'];  ?></div>
		<?php else: ?>
		<div class="status">статус не указан</div>
		<?php endif; ?>
		<table cellspacing="0" cellpadding="0" border="0" class="data_user">
			<?php if(strlen( $user_data['0']['city'] )): ?>
				<tr>
					<td><span>Город:</span></td>
					<td><?php  echo $user_data['0']['city'];  ?></td>
				</tr>
			<?php endif; ?>	
			<?php if(strlen( $user_data['0']['phone'] )): ?>
				<tr>
					<td><span>Телефон:</span></td>
					<td><?php  echo $user_data['0']['phone'];  ?></td>
				</tr>
			<?php endif; ?>
			<?php if(strlen( $user_data['0']['first_name'] )): ?>
				<tr>
					<td><span>Имя:</span></td>
					<td><?php  echo $user_data['0']['first_name'];  ?></td>
				</tr>
			<?php endif; ?>
			<?php if(strlen( $user_data['0']['last_name'] )): ?>
				<tr>
					<td><span>Фамилия:</span></td>
					<td><?php  echo $user_data['0']['last_name'];  ?></td>
				</tr>
			<?php endif; ?>
			<?php if($user_data['0']['age']  > 0): ?>
				<tr>
					<td><span>Возраст:</span></td>
					<td><?php  echo $user_data['0']['age'];  ?></td>
				</tr>
			<?php endif; ?>
			<?php if(strlen( $user_data['0']['sex'] )): ?>
				<tr>
					<td><span>Пол:</span></td>
					<td><?php if($user_data['0']['sex']  == 'w'): ?>Женский<?php endif; ?><?php if($user_data['0']['sex']  == 'm'): ?>Мужской<?php endif; ?></td>
				</tr>
			<?php endif; ?>
			<?php if(strlen( $user_data['0']['hobbies'] )): ?>
				<tr>
					<td><span>Увлечения:</span></td>
					<td><?php  echo $user_data['0']['hobbies'];  ?></td>
				</tr>
			<?php endif; ?>
			<?php if(strlen( $user_data['0']['about'] )): ?>
				<tr>
					<td><span>О себе:</span></td>
					<td><?php  echo $user_data['0']['about'];  ?></td>
				</tr>
			<?php endif; ?>
		</table>
		
	</div>
</div><?php $mabilis_ttl=1311491702; $mabilis_last_modified=1310038740; //Z:\home\kupontut.il\www\application\modules\user_manager/templates/public/user_profile.tpl ?>