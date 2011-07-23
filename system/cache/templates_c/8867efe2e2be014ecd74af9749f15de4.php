<form method="post" action="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/categories/create/update/<?php if(isset($id)){ echo $id; } ?>" id="edit_cat_form" style="width:100%;">

<div id="edit_cat_tabs">
<h4>Параметры</h4>
    <div style="padding:2px;">
        <?php if(count($langs) > 1): ?>
        <div class="form_text">Редактировать на языке:</div>
        <div class="form_input">
            <?php if(is_true_array($langs)){ foreach ($langs as $l){ ?>
                <a href="javascript:translate_category_window(<?php if(isset($id)){ echo $id; } ?>, <?php  echo $l['id'];  ?>);" style="padding-right:5px;"><?php  echo $l['lang_name'];  ?></a>
            <?php }} ?>
        </div>
        <div class="form_overflow"></div>
        <?php endif; ?>

        <div class="form_text">Название:</div>
        <div class="form_input"><input type="text" name="name" id="cat_name" value="<?php if(isset($name)){ echo $name; } ?>" class="textbox_long" /></div>
        <div class="form_overflow"></div>

        <div class="form_text">URL:</div>
        <div class="form_input">
            <input type="text" name="url" id="cat_url" value="<?php if(isset($url)){ echo $url; } ?>" class="textbox_long" />
           <img onclick="translite_cat_name($('cat_name').value);" align="absmiddle" style="cursor:pointer" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/translit.png" width="16" height="16" /> 
        </div>
        <div class="form_overflow"></div>

        <div class="form_text">Родитель:</div>
        <div class="form_input">
            <select name="parent_id">
            <option value="0">Нет</option>
            <?php   $this->view("cats_select.tpl", $this->template_vars) ?>
            </select>
        </div>
        <div class="clear"></div>

        <div class="form_text">Группа полей:</div>
        <div class="form_input">
            <?php $f_groups = $this->CI->load->module('cfcm/cfcm_forms')->prepare_groups_select() ?>
            <select name="category_field_group">
                <option value="-1">Нет</option>
            <?php if(is_true_array($f_groups)){ foreach ($f_groups as $k => $v){ ?>
                <option value="<?php if(isset($k)){ echo $k; } ?>" <?php if($k == $category_field_group): ?> selected="selected" <?php endif; ?>><?php if(isset($v)){ echo $v; } ?></option>
            <?php }} ?>
            </select>
            <div class="lite">Выберите группу полей для категории.</div>
        </div>
        <div class="clear"></div>

        <div class="form_text">Группа полей страниц:</div>
        <div class="form_input">
            <?php $f_groups = $this->CI->load->module('cfcm/cfcm_forms')->prepare_groups_select() ?>
            <select name="field_group">
                <option value="-1">Нет</option>
            <?php if(is_true_array($f_groups)){ foreach ($f_groups as $k => $v){ ?>
                <option value="<?php if(isset($k)){ echo $k; } ?>" <?php if($k == $field_group): ?> selected="selected" <?php endif; ?>><?php if(isset($v)){ echo $v; } ?></option>
            <?php }} ?>
            </select>
            <div class="lite">Выберите группу полей, которая будет отображаться при создании страниц в данной категории.</div>
        </div>
        <div class="clear"></div>

        <div class="form_text">Изображение:</div>
        <div class="form_input">
            <input type="text" name="image" id="cat_image" value="<?php if(isset($image)){ echo $image; } ?>" class="textbox_long" />
            <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/images.png" width="16" height="16" title="Выбрать Изображение" style="cursor:pointer;" align="absmiddle"  onclick="tinyBrowserPopUp('image', 'cat_image');" />
        </div>
        <div class="form_overflow"></div>

        <div class="form_text">Описание:</div>
        <div class="form_input">
             <textarea name="short_desc" id="short_desc" class="mceEditor textarea"><?php  echo htmlspecialchars ($short_desc);  ?></textarea>
        </div>
        <div class="form_overflow"></div>

        <div class="form_text">Позиция:</div>
        <div class="form_input"><input type="text" name="position" value="<?php if(isset($position)){ echo $position; } ?>" class="textbox_long" /></div>
        <div class="form_overflow"></div>

        <div class="form_text"></div>
        <div class="form_input"><h3>Отображение страниц</h3></div>
        <div class="clear"></div>

        <div class="form_text">Сортировать:</div>
        <div class="form_input">
            <select name="order_by">
            <option value="publish_date" <?php if($order_by == "publish_date"): ?> selected="selected" <?php endif; ?>>По дате</option>    
            <option value="title" <?php if($order_by == "title"): ?> selected="selected" <?php endif; ?>>По Алфавиту</option>    
            <option value="position" <?php if($order_by == "position"): ?> selected="selected" <?php endif; ?>>По Позиции</option> 
            </select>

            <select name="sort_order">
            <option value="desc" <?php if($sort_order == "desc"): ?> selected="selected" <?php endif; ?>>Убыванию</option> 
            <option value="asc" <?php if($sort_order == "asc"): ?> selected="selected" <?php endif; ?>>Возрастанию</option>    
            </select>
        </div>
        <div class="clear"></div>

        <div class="form_text">Записей на странице:</div>
        <div class="form_input">
           <input type="text" name="per_page" value="<?php if(isset($per_page)){ echo $per_page; } ?>" class="textbox_long" /> 
        </div>
        <div class="clear"></div>

        <div class="form_text"></div>
        <div class="form_input">
           <label><input type="checkbox" name="comments_default" value="1" <?php if($comments_default == 1): ?> checked="checked" <?php endif; ?>  />  Комментирование страниц по умолчанию</label> 
        </div>
        <div class="clear"></div>

        <div class="form_text">Отображать страницы с других категорий:</div>
        <div class="form_input">

        <select name="fetch_pages[]"  multiple="multiple">
            <?php if(is_true_array($include_cats)){ foreach ($include_cats as $c){ ?>
            <?php if($c['id']  == $id): ?>
               <option disabled="disabled" value="<?php   echo $c['id'];  ?>"> <?php for($i=0; $i <  $c['level'] ;$i++){?>-<?php } ?> <?php  echo $c['name'];  ?></option>
            <?php else: ?>
                <option value="<?php   echo $c['id'];  ?>"<?php if(is_true_array($fetch_pages)){ foreach ($fetch_pages as $k => $v){ ?><?php if($v ==  $c['id']): ?> selected="selected" <?php endif; ?><?php }} ?>><?php for($i=0; $i <  $c['level'] ;$i++){?>-<?php } ?> <?php  echo $c['name'];  ?></option> 
            <?php endif; ?>
            <?php }} ?>
        </select>
        </div>
        <div class="clear"></div>

        <div class="form_text">Главный шаблон:</div>
        <div class="form_input">
            <input type="text" name="main_tpl" value="<?php if(isset($main_tpl)){ echo $main_tpl; } ?>" class="textbox_short" /> .tpl
            <div class="lite">Главный шаблон категории. По умолчанию  main.tpl</div> 
        </div>
        <div class="form_overflow"></div>

        <div class="form_text">Шаблон категории:</div>
        <div class="form_input">
            <input type="text" name="tpl" value="<?php if(isset($tpl)){ echo $tpl; } ?>" class="textbox_short" /> .tpl
            <div class="lite">Основний шаблон категории. По умолчанию  category.tpl</div>
        </div>
        <div class="form_overflow"></div>

        <div class="form_text">Шаблон страниц:</div>
        <div class="form_input">
            <input type="text" name="page_tpl" value="<?php if(isset($page_tpl)){ echo $page_tpl; } ?>" class="textbox_short" /> .tpl
            <div class="lite">Шаблон просмотра страниц. По умолчанию  page_full.tpl</div>    
        </div>
        <div class="form_overflow"></div>
    </div>


<h4>Мета Теги</h4>
    <div>
        <div class="form_text">Meta Title:</div>
        <div class="form_input"><input type="text" name="title" value="<?php if(isset($title)){ echo $title; } ?>" class="textbox_long" /></div>
        <div class="form_overflow"></div>

        <div class="form_text">Meta Description:</div>
        <div class="form_input"><textarea name="description" rows="2" cols="48"><?php if(isset($description)){ echo $description; } ?></textarea></div>
        <div class="form_overflow"></div>

        <div class="form_text">Meta Keywords:</div>
        <div class="form_input"><textarea name="keywords" rows="2" cols="48"><?php if(isset($keywords)){ echo $keywords; } ?></textarea></div>
        <div class="form_overflow"></div>
    </div>

    <?php ($hook = get_hook('admin_tpl_edit_category')) ? eval($hook) : NULL; ?>

</div>

<?php  echo form_csrf ();  ?>

<div class="footer_block" align="right">
    <input type="submit" name="button" class="button_silver_130" value="Сохранить" onclick="ajax_me('edit_cat_form');" />
    <input type="submit" name="button" class="button" value="Отмена" onclick="ajax_div('page', base_url + 'admin/categories/cat_list'); return false;" />
</div>

</form>
<script type="text/javascript">
		var edit_cat_tabs = new SimpleTabs('edit_cat_tabs', { 
    		selector: 'h4'
		 });

        load_editor();

        function translate_category_window(cat_id, lang)
        { 
            MochaUI.search_p_Window = function(){ 
                new MochaUI.Window({ 
                    id: 'translate_category_w',
                    title: 'Первевод категории',
                    loadMethod: 'xhr',
                    contentURL: base_url + 'admin/categories/translate/' + cat_id + '/' + lang,
                    width: 600,
                    height: 600
                 });
             }
               
            MochaUI.search_p_Window();
         }

</script>

<?php $mabilis_ttl=1311075395; $mabilis_last_modified=1290434476; //Z:\home\kupontut.il\www\/templates/administrator/category_edit.tpl ?>