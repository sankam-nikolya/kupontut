<div class="saPageHeader">
    <h2>Создание категории</h2>
</div>

<form method="post" action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>categories/create"  style="width:100%">

    <div class="form_text"><?php echo ShopCore::encode($model->getLabel('Name')) ?>:</div>
    <div class="form_input">
        <input type="text" name="Name" value="" class="textbox_long" /> <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"></div>
    <div class="form_input">
        <label><input type="checkbox" value="1"  <?php if($model->getActive() == true): ?>checked="checked"<?php endif; ?>  name="Active" /> <?php echo $model->getLabel('Active') ?></label>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Url') ?>:</div>
    <div class="form_input">
        <input type="text" name="Url" value="" class="textbox_long" /> 
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('ParentId') ?>:</div>
    <div class="form_input">
        <select name="ParentId" value="">
            <option value="0">Нет</option>
            <?php if(is_true_array($categories)){ foreach ($categories as $category){ ?>
                <option value="<?php echo $category->getId() ?>"><?php  echo str_repeat ('-',$category->getLevel());  ?> <?php echo ShopCore::encode($category->getName()) ?></option>
            <?php }} ?>
        </select>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Description') ?>:</div>
    <div class="form_input">
        <textarea class="mceEditor" name="Description" ></textarea>
    </div>
    <div class="form_overflow"></div>
    <div class="form_text"><?php echo $model->getLabel('MetaDesc') ?>:</div>
    <div class="form_input">
        <input type="text" name="MetaDesc" value="" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('MetaTitle') ?>:</div>
    <div class="form_input">
        <input type="text" name="MetaTitle" value="" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('MetaKeywords') ?>:</div>
    <div class="form_input">
        <input type="text" name="MetaKeywords" value="" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"></div>
    <div class="form_input">
        <!-- <input type="submit" name="button" class="button_130" value="Создать" onclick="ajax_me(this.form);" /> -->
    </div>
    <div class="form_overflow"></div>    

<?php  echo form_csrf ();  ?>

<div class="footer_panel" align="right"> 
   <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active"  onclick="ajaxShopForm(this);" />
   <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись" onclick="ajaxShopForm(this);" />
   <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onclick="ajaxShopForm(this);" />
</div>

</form>
<script type="text/javascript">
    load_editor();
</script>

<?php $mabilis_ttl=1309008421; $mabilis_last_modified=1303832256; //X:\home\kupontut.il\www\/application/modules/shop/admin\templates\categories\create.tpl ?>