<div class="nav_msg">
	<a href="/user_manager/messages">Полученные</a>
	<span class="raz"></span>
	<a href="/user_manager/outbox">Отправленные</a>
</div>
<form action="/user_manager/create" method="post">
	<table cellspacing="0" cellpadding="0" border="0" class="comments_msg">
		<tr>
			<td class="lft"><span>Кому:</span></td>
			<td>
				{if strlen($username_rec) > 0}
					<input type="text" name="sender" value="{$username_rec}" {if $username_rec != ''}disabled="disabled"{/if} />
					<input type="hidden" name="recipient_id" value="{$user_id_rec}" />
				{else:}
					<select name="recipient_id">
						{foreach $users as $k=>$u}<option value="{$k}">{$u.username}</option>{/foreach}
					</select>
				{/if}
			</td>
		</tr>
		<tr>
			<td class="lft"><span>Сообщение:</span></td>
			<td>
				<textarea cols="50" rows="10" id="text" name="text"></textarea>
			</td>
		</tr>
		<tr>
			<td class="lft"></td>
			<td style="valign:top; padding:5px 25px 10px 25px;">
				<input type="hidden" name="add_msg" value="tr" />
				<input type="submit" value="" class="send">
			</td>
		</tr>
	</table>
	{form_csrf()}
</form>