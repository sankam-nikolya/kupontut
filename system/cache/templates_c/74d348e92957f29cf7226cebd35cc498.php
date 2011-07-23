<div class="saPageHeader" style="width:100%;">
    <h2>Создание свойства товара</h2>
</div>


<form method="post" action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>properties/create"  style="width:100%">

    <div class="form_text"><?php echo $model->getLabel('Name') ?>:</div>
    <div class="form_input">
        <input type="text" name="Name" value="" class="textbox_long" /> <span class="required">*</span> 
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('CsvName') ?>:</div>
    <div class="form_input">
        <input type="text" name="CsvName" value="" class="textbox_long" /> <span class="required">*</span>
        <div class="lite">Поле должно содержать только латинские символы.</div>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"> </div>
    <div class="form_input">
        <label><input type="checkbox" checked="checked" value="1" name="Active" /><?php echo $model->getLabel('Active') ?></label>
        <br/>
        <label><input type="checkbox" <?php if($model->getShowOnSite() == true): ?>checked="checked"<?php endif; ?> value="1" name="ShowOnSite" /><?php echo $model->getLabel('ShowOnSite') ?></label> 
        <br/>
        <label><input type="checkbox" value="1" name="ShowInCompare" /><?php echo $model->getLabel('ShowInCompare') ?></label>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('UseInCategories') ?>:</div>
    <div class="form_input">
        <select name="UseInCategories[]" multiple="multiple" style="width:285px;height:150px;">
            <?php if(is_true_array($categories)){ foreach ($categories as $category){ ?>
                <option value="<?php echo $category->getId() ?>"><?php  echo str_repeat ('-',$category->getLevel());  ?> <?php echo ShopCore::encode($category->getName()) ?></option>
            <?php }} ?>
        </select>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Data') ?>:</div>
    <div class="form_input">
        <textarea name="Data" ></textarea>  
    </div>
    <div class="form_overflow"></div>

    <div class="footer_panel" align="right"> 
       <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active" onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onClick="ajaxShopForm(this);" />
    </div>

<?php  echo form_csrf ();  ?>
</form>
<?php $mabilis_ttl=1311344194; $mabilis_last_modified=1303832256; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\properties\create.tpl ?>