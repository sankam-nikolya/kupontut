<div class="saPageHeader" style="width:100%;">
    <h2>Создание способа оплаты</h2>
</div>

<form method="post" action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>/paymentmethods/edit/<?php echo $model->getId() ?>"  style="width:100%">

    <div class="form_text"><?php echo $model->getLabel('Name') ?>:</div>
    <div class="form_input">
        <input type="text" name="Name" value="<?php echo ShopCore::encode($model->getName()) ?>" class="textbox_long" /> <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">Валюта:</div>
    <div class="form_input">
        <select name="CurrencyId" style="width:280px;">
        <?php if(is_true_array($currencies)){ foreach ($currencies as $c){ ?>
            <option value="<?php echo $c->getId() ?>" <?php if($c->getId() == $model->getCurrencyId()): ?>selected="selected"<?php endif; ?>>
                <?php echo ShopCore::encode($c->getName()) ?> 
                (<?php echo $c->getRate() ?>
                <?php echo $c->getSymbol() ?> = 1 <?php if(isset($CS)){ echo $CS; } ?>)
            </option>
        <?php }} ?>
        </select>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"></div>
    <div class="form_input">
        <label><input type="checkbox" value="1" name="Active" <?php if($model->getActive() == true): ?> checked="checked" <?php endif; ?> /><?php echo $model->getLabel('Active') ?></label>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Description') ?>:</div>
    <div class="form_input">
        <textarea name="Description" value="" class="mceEditor"><?php echo ShopCore::encode($model->getDescription()) ?></textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">Система оплаты:</div>
    <div class="form_input">
        <select name="PaymentSystemName" onchange="loadPaymentSystemConfigForm(this.value, <?php echo $model->getId() ?>);">
            <option value="0">Нет</option>
            <?php  $result = ShopCore::app()->SPaymentSystems->getList(); 
 if(is_true_array($result)){ foreach ($result as $key=>$val){ ?>
                <option value="<?php if(isset($key)){ echo $key; } ?>" <?php if($model->getPaymentSystemName() == $key): ?>selected="selected"<?php endif; ?>><?php echo encode( $val['listName'] )  ?></option>
            <?php }} ?>
        </select>
    </div>
    <div class="form_overflow"></div>

    <!-- Begin config form -->
    <div class="form_input" id="paymentSystemConfigureBox">
        <?php if(isset($paymentSystemForm)){ echo $paymentSystemForm; } ?>
    </div>
    <!-- End config form -->


    <div class="footer_panel" align="right"> 
       <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active" onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onClick="ajaxShopForm(this);" />
    </div>

<?php  echo form_csrf ();  ?>
</form>
<script type="text/javascript">
    load_editor();

    function loadPaymentSystemConfigForm(val, modelId)
    { 
        ajax_div('paymentSystemConfigureBox', shop_url + 'paymentmethods/getAdminForm/' + val + '/' + modelId);
     }
</script>
<?php $mabilis_ttl=1311066194; $mabilis_last_modified=1294488748; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\paymentMethods\edit.tpl ?>