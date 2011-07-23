<div class="nav_msg">
	{if $type == 'in'}<span>Полученные</span>{else:}<a href="/user_manager/messages">Полученные</a>{/if}
	<span class="raz"></span>
	{if $type == 'out'}<span>Отправленные</span>{else:}<a href="/user_manager/outbox">Отправленные</a>{/if}
	<a href="/user_manager/create" id="create_msg"></a>
</div>

{if count($messages) }
<ul class="prps">
	{if 0}<div class="control"><span>{if $type == 'in'}Отправитель{else:}Получатель{/if}</span></div> {/if}
	{foreach $messages as $m}
	<li>
		<table cellpadding="0" cellspacing="0" border="0"><tr>
		<td class="personal">
			<a href="#">{$m.sender}</a>
			<span class="msg_date">{date('d.m.Y в H:m',$m.date)}</span>
		</td>
		<td class="pers_msg">
			<p>{$m.text}</p>
		</td></tr></table>
		{if $type == 'in'}<div class="control">
			<a href="/user_manager/create/{$m.user_id}" class="send">Ответить</a>
<a href="/user_manager/delete_msg/{$m.id}" {literal}onclick="if (!confirm('Вы точно хотите удалить это сообщение?')) return false; "{/literal} class="del">Удалить сообщение</a>
		</div>{/if}
	</li>
	{/foreach}
</ul>
{else:}
{if $type == 'in'}<p>Вам еще никто ничего не писал.</p>{else:}<p>Вы еще никому ничего не писали.</p>{/if}
{/if}