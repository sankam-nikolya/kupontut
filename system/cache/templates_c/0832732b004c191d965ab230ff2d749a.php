<div class="saPageHeader">
    <h2>Редактирование категории ID: <?php  echo $modelArray['Id'];  ?></h2>
</div>

<form method="post" action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>categories/edit/<?php  echo $modelArray['Id'];  ?>"  style="width:100%">

    <div class="form_text"><?php echo $model->getLabel('Name') ?>:</div>
    <div class="form_input">
        <input type="text" name="Name" value="<?php  echo ShopCore::encode( $modelArray['Name'] )  ?>" class="textbox_long" /> <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"></div>
    <div class="form_input">
        <label><input type="checkbox" value="1"  <?php if($model->getActive() == true): ?>checked="checked"<?php endif; ?>  name="Active" /> <?php echo $model->getLabel('Active') ?></label>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Url') ?>:</div>
    <div class="form_input">
        <input type="text" name="Url" value="<?php  echo $modelArray['Url'];  ?>" class="textbox_long" /> 
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('ParentId') ?>:</div>
    <div class="form_input">
        <select name="ParentId" value="">
            <option value="0">Нет</option>
            <?php if(is_true_array($categories)){ foreach ($categories as $category){ ?>
                <option 
                <?php if($category->getId()== $modelArray['Id']): ?>
                    disabled="disabled"
                <?php endif; ?>
                <?php if($category->getId()== $modelArray['ParentId']): ?>
                    selected="selected"
                <?php endif; ?>
                value="<?php echo $category->getId() ?>"> <?php  echo str_repeat ('-',$category->getLevel());  ?> <?php echo ShopCore::encode($category->getName()) ?></option>
            <?php }} ?>
        </select>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Description') ?>:</div>
    <div class="form_input">
        <textarea class="mceEditor" name="Description" ><?php  echo ShopCore::encode( $modelArray['Description'] )  ?></textarea>
    </div>
    <div class="form_overflow"></div>
    <div class="form_text"><?php echo $model->getLabel('MetaDesc') ?>:</div>
    <div class="form_input">
        <input type="text" name="MetaDesc" value="<?php  echo ShopCore::encode( $modelArray['MetaDesc'] )  ?>" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('MetaTitle') ?>:</div>
    <div class="form_input">
        <input type="text" name="MetaTitle" value="<?php  echo ShopCore::encode( $modelArray['MetaTitle'] )  ?>" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('MetaKeywords') ?>:</div>
    <div class="form_input">
        <input type="text" name="MetaKeywords" value="<?php  echo ShopCore::encode( $modelArray['MetaKeywords'] )  ?>" class="textbox_long" />
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
<?php $mabilis_ttl=1311066540; $mabilis_last_modified=1303832256; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\categories\edit.tpl ?>