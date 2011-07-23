<?php echo form_open_multipart('/user_manager/add_photo');?>
	<table cellspacing="0" cellpadding="0" border="0" class="comments_msg">
		<tr>
			<td class="lft"><span>Альбом:</span></td>
			<td>
				<div class="fix_height">
					<input type="text" name="new_alb_name" id="alb_name" value="" style="display:none;" />
					<select id="list_alb" name="album_id">
						{foreach $albums as $a}<option value="{$a.id}">{$a.name}</option>{/foreach}
					</select>
				</div>
				или <a href="#" class="dashed" id="nav_new" onclick="$('#list_alb').hide();$('#nav_new').hide();$('#nav_sel').show(); $('#alb_name').fadeIn(); return false;">создать новый?</a>
				<a href="#" class="dashed" id="nav_sel" style="display:none;" onclick="$('#alb_name').hide();$('#nav_sel').hide();$('#nav_new').show();$('#list_alb').fadeIn();  return false;">выбрать из существующих</a>
			</td>
		</tr>
		{for $i=1; $i<11; $i++}
		<tr class="photo_list" id="dp{$i}" {if $i>3}style="display:none;"{/if}>
			<td class="lft" id="ph_{$i}"><span>Фото {$i}:</span></td>
			<td><input type="file" name="photo{$i}" /></td>
		</tr>
		{/for}
		<tr>
			<td><input type="hidden" name="add_msg" value="tr" /></td>
			<td><a class="dashed" id="eshe" href="#" onclick="eshe(); return false;">добавить ещё</a></td>
		</tr>
		<tr>
			<td class="lft"></td>
			<td style="valign:top; padding:5px 25px 10px 25px;"></td>
		</tr>
	</table>
	<input type="submit" value="" class="save_add_photo">
	{form_csrf()}
</form>