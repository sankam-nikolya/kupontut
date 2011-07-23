<form action="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/settings/save" method="post" id="save_form" style="width:100%;">

<div id="settings_tabs">

<h4 title="Настройки">Настройки</h4>
<div>
	<div class="form_text">Название сайта:</div>
	<div class="form_input"><input type="text" name="title" value="<?php if(isset($site_title)){ echo $site_title; } ?>" class="textbox_long" /></div>
	<div class="form_overflow"></div>

	<div class="form_text">Краткое название сайта:</div>
	<div class="form_input"><input type="text" name="short_title" value="<?php if(isset($site_short_title)){ echo $site_short_title; } ?>" class="textbox_long" /></div>
	<div class="form_overflow"></div>

	<div class="form_text">Описание:</div>
	<div class="form_input"><input type="text" name="description" value="<?php if(isset($site_description)){ echo $site_description; } ?>" class="textbox_long" /></div>
	<div class="form_overflow"></div>

	<div class="form_text">Ключевые слова:</div>
	<div class="form_input"><input type="text" name="keywords" value="<?php if(isset($site_keywords)){ echo $site_keywords; } ?>" class="textbox_long" /></div>
	<div class="form_overflow"></div>

	<div class="form_text">Тема Редактора:</div>
	<div class="form_input">
	<select name="editor_theme">
        <?php if(is_true_array($editor_themes)){ foreach ($editor_themes as $theme => $v){ ?>
            <option value="<?php if(isset($theme)){ echo $theme; } ?>" <?php if($theme_selected == $theme): ?> selected="selected" <?php endif; ?> ><?php if(isset($v)){ echo $v; } ?></option>
        <?php }} ?>
	</select> <div class="lite">Изменения вступят в силу после перезагрузки панели управления</div>
	</div>
	<div class="form_overflow"></div>

	<div class="form_text">Шаблон:</div>

	<div class="form_input">
	<select name="template">
    <?php if(is_true_array($templates)){ foreach ($templates as $k => $v){ ?>
        <option value="<?php if(isset($k)){ echo $k; } ?>" <?php if($template_selected == $k): ?> selected="selected" <?php endif; ?> ><?php if(isset($k)){ echo $k; } ?></option>
    <?php }} ?>
	</select>
	</div>
	<div class="form_overflow"></div>

	<div class="form_text">Отключение сайта:</div>
	<div class="form_input">
	<select name="site_offline">
     <?php if(is_true_array($work_values)){ foreach ($work_values as $k => $v){ ?>
        <option value="<?php if(isset($k)){ echo $k; } ?>" <?php if($site_offline == $k): ?> selected="selected" <?php endif; ?> ><?php if(isset($v)){ echo $v; } ?></option>
     <?php }} ?>
	</select>
	</div>
	<div class="form_overflow"></div>
</div>

<h4 title="Настройки">Главная страница</h4>
<div>
	<div class="form_text">Категория: <input type="radio" name="main_type" value="category" <?php if($main_type == "category"): ?> checked="checked" <?php endif; ?> /> </div>
	<div class="form_input">
		<select name="main_page_cat">
			<?php  $this->view("cats_select.tpl", $this->template_vars);  ?>
		</select>
	</div>
	<div class="form_overflow"></div>

	<div class="form_text">Страница: <input type="radio" name="main_type" value="page" <?php if($main_type == "page"): ?> checked="checked" <?php endif; ?> /></div>
	<div class="form_input">
    	<input type="text" name="main_page_pid" class="textbox_long" style="width:100px" value="<?php if(isset($main_page_id)){ echo $main_page_id; } ?>" /> - ID страницы
	</div>
	<div class="form_overflow"></div>

    <div class="form_text">Модуль: <input type="radio" name="main_type" value="module" <?php if($main_type == "module"): ?> checked="checked" <?php endif; ?> /></div>
	<div class="form_input">
        <select name="main_page_module">
	        <?php if(is_true_array($modules)){ foreach ($modules as $m){ ?>
	            <?php $mData = modules::run('admin/components/get_module_info',$m['name']) ?>
	            <?php //if $mData['main_page'] === true ?>
	                <option <?php if($m['name'] == $main_page_module): ?>selected="selected"<?php endif; ?> value="<?php  echo $m['name'];  ?>"><?php echo $mData['menu_name'] ?></option>
	            <?php ///if ?>
	        <?php }} ?>
		</select>
	</div>
	<div class="form_overflow"></div>
</div>



<h4 title="SEO">Мета Теги</h4>
<div>

		<div class="form_text"></div>
		<div class="form_input"><b>Выводить в Meta Title:</b></div>
		<div class="form_overflow"></div>

		<div class="form_text">Название сайта</div>
		<div class="form_input">
		<select name="add_site_name">
		<option value="1" <?php if($add_site_name == "1"): ?>selected="selected"<?php endif; ?>>Да</option>
		<option value="0" <?php if($add_site_name == "0"): ?>selected="selected"<?php endif; ?> >Нет</option>
		</select>
		</div>

        <div class="form_overflow"></div>

		<div class="form_text">Название категории</div>
		<div class="form_input">
		<select name="add_site_name_to_cat">
		<option value="1" <?php if($add_site_name_to_cat == "1"): ?>selected="selected"<?php endif; ?>>Да</option>
		<option value="0" <?php if($add_site_name_to_cat == "0"): ?>selected="selected"<?php endif; ?>>Нет</option>
		</select>
		</div>

<div class="form_overflow"></div>

		<div class="form_text">Разделитель</div>
		<div class="form_input">
		<input type="text" value="<?php if(isset($delimiter)){ echo $delimiter; } ?>" name="delimiter" class="textbox_long" style="width:80px;" />
		</div>

        <div class="form_overflow"></div>

		<div class="form_text"></div>
		<div class="form_input"><b>Мета-теги страниц:</b></div>
		<div class="form_overflow"></div>

		<div class="form_text"><b>Meta Keywords</b><br/>Если не указаны:</div>
		<div class="form_input">
		<select name="create_keywords">
			<option value="auto" <?php if($create_keywords == "auto"): ?>selected="selected"<?php endif; ?>>Формировать атоматически</option>
			<option value="empty" <?php if($create_keywords == "empty"): ?>selected="selected"<?php endif; ?>>Оставить пустым</option>
		</select>
		</div>

        <div class="form_overflow"></div>

		<div class="form_text"><b>Meta Description</b><br/>Если не указано:</div>
		<div class="form_input">
		<select name="create_description">
			<option value="auto" <?php if($create_description == "auto"): ?>selected="selected"<?php endif; ?>>Формировать атоматически</option>
			<option value="empty" <?php if($create_description == "empty"): ?>selected="selected"<?php endif; ?>>Оставить пустым</option>
		</select>
		</div>



<div class="form_overflow"></div>


</div>

</div>

	<div class="form_text"></div>
	<div class="form_input">
	<input type="submit" name="button" class="button" value="Сохранить" onclick="ajax_me('save_form');" />
	</div>

<?php  echo form_csrf ();  ?></form>
<script type="text/javascript">
		var settings_tabs = new SimpleTabs('settings_tabs', { 
		selector: 'h4'
		 });
</script>

<?php $mabilis_ttl=1309007406; $mabilis_last_modified=1289911326; //X:\home\kupontut.il\www\/templates/administrator/settings.tpl ?>