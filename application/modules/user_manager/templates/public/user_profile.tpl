<div class="prof_data">
	<div class="foto">
		<img src="{if strlen($ava) AND $ava != 0}/uploads/{$ava}{else:}/images/def_ava.gif{/if}" border="0" />
	</div>
	<div class="pr_right">
		<h4>{$user_data.0.username}</h4>
		{if $username == $user_data.0.username}<a href="/user_manager/profile_edit" class="edit">Редактировать аккаунт</a>{/if}
		
		{if strlen($user_data.0.status)}
		<div class="status">{$user_data.0.status}</div>
		{else:}
		<div class="status">статус не указан</div>
		{/if}
		<table cellspacing="0" cellpadding="0" border="0" class="data_user">
			{if strlen($user_data.0.city)}
				<tr>
					<td><span>Город:</span></td>
					<td>{$user_data.0.city}</td>
				</tr>
			{/if}	
			{if strlen($user_data.0.phone)}
				<tr>
					<td><span>Телефон:</span></td>
					<td>{$user_data.0.phone}</td>
				</tr>
			{/if}
			{if strlen($user_data.0.first_name)}
				<tr>
					<td><span>Имя:</span></td>
					<td>{$user_data.0.first_name}</td>
				</tr>
			{/if}
			{if strlen($user_data.0.last_name)}
				<tr>
					<td><span>Фамилия:</span></td>
					<td>{$user_data.0.last_name}</td>
				</tr>
			{/if}
			{if $user_data.0.age > 0}
				<tr>
					<td><span>Возраст:</span></td>
					<td>{$user_data.0.age}</td>
				</tr>
			{/if}
			{if strlen($user_data.0.sex)}
				<tr>
					<td><span>Пол:</span></td>
					<td>{if $user_data.0.sex == 'w'}Женский{/if}{if $user_data.0.sex == 'm'}Мужской{/if}</td>
				</tr>
			{/if}
			{if strlen($user_data.0.hobbies)}
				<tr>
					<td><span>Увлечения:</span></td>
					<td>{$user_data.0.hobbies}</td>
				</tr>
			{/if}
			{if strlen($user_data.0.about)}
				<tr>
					<td><span>О себе:</span></td>
					<td>{$user_data.0.about}</td>
				</tr>
			{/if}
		</table>
		
	</div>
</div>