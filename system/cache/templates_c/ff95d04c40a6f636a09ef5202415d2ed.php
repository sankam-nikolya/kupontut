<div class="saPageHeader">
    <h2>Редактирование Валюты</h2>
</div>

<form method="post" action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>currencies/edit/<?php echo $model->getId() ?>"  style="width:100%">

    <div class="form_text"><?php echo $model->getLabel('Name') ?>:</div>
    <div class="form_input">
        <input type="text" name="Name" value="<?php echo ShopCore::encode($model->getName()) ?>" class="textbox_long" /> <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Code') ?>:</div>
    <div class="form_input">
        <input type="text" name="Code" value="<?php echo ShopCore::encode($model->getCode()) ?>" class="textbox_long" /> <span class="required">*</span> 
        <div class="lite">(например: USD)</div>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text"><?php echo $model->getLabel('Symbol') ?>:</div>
    <div class="form_input">
        <input type="text" name="Symbol" value="<?php echo ShopCore::encode($model->getSymbol()) ?>" class="textbox_long" /> <span class="required">*</span> 
        <div class="lite">(например: $)</div>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text"><?php echo $model->getLabel('Rate') ?>:</div>
    <div class="form_input">
        <input type="text" name="Rate" value="<?php echo $model->getRate() ?>" class="textbox_short" /> 
        = 
        1.000 <?php if(isset($CS)){ echo $CS; } ?>
    </div>
    <div class="form_overflow"></div>


    <div class="footer_panel" align="right"> 
       <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active" onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onClick="ajaxShopForm(this);" />
    </div>

<?php  echo form_csrf ();  ?>
</form>
<?php $mabilis_ttl=1311148371; $mabilis_last_modified=1307537016; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\currencies\edit.tpl ?>