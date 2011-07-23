<!-- Create brand form -->
<div class="saPageHeader">
    <h2>Создание Бренда</h2>
</div>

<form method="post" action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>brands/edit/<?php echo $model->getId() ?>"  style="width:100%">

    <div class="form_text"><?php echo $model->getLabel('Name') ?>:</div>
    <div class="form_input">
        <input type="text" name="Name" value="<?php echo ShopCore::encode($model->getName()) ?>" class="textbox_long" /> <span class="required">*</span> 
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Url') ?>:</div>
    <div class="form_input">
        <input type="text" name="Url" value="<?php echo ShopCore::encode($model->getUrl()) ?>" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Description') ?>:</div>
    <div class="form_input">
        <textarea name="Description" class="mceEditor"><?php echo ShopCore::encode($model->getDescription()) ?></textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('MetaTitle') ?>:</div>
    <div class="form_input">
        <input type="text" name="MetaTitle" value="<?php echo ShopCore::encode($model->getMetaTitle()) ?>" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('MetaDescription') ?>:</div>
    <div class="form_input">
        <input type="text" name="MetaDescription" value="<?php echo ShopCore::encode($model->getMetaDescription()) ?>" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('MetaKeywords') ?>:</div>
    <div class="form_input">
        <input type="text" name="MetaKeywords" value="<?php echo ShopCore::encode($model->getMetaKeywords()) ?>" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

<div class="footer_panel" align="right"> 
   <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active"  onClick="ajaxShopForm(this);" />
   <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись" onClick="ajaxShopForm(this);" />
   <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать" onClick="ajaxShopForm(this);" />
</div> 

<?php  echo form_csrf ();  ?>
</form>

<script type="text/javascript">
    load_editor();
</script>
<?php $mabilis_ttl=1309008390; $mabilis_last_modified=1286549490; //X:\home\kupontut.il\www\/application/modules/shop/admin\templates\brands\edit.tpl ?>