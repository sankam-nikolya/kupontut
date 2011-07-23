<div class="saPageHeader" style="width:100%;">
    <h2>Создание способа оплаты</h2>
</div>

<form method="post" action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>/paymentmethods/create"  style="width:100%">

    <div class="form_text"><?php echo $model->getLabel('Name') ?>:</div>
    <div class="form_input">
        <input type="text" name="Name" value="" class="textbox_long" /> <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">Валюта:</div>
    <div class="form_input">
        <select name="CurrencyId" style="width:280px;">
        <?php if(is_true_array($currencies)){ foreach ($currencies as $c){ ?>
            <option value="<?php echo $c->getId() ?>">
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
        <label><input type="checkbox" name="Active" checked="checked" value="1" /><?php echo $model->getLabel('Active') ?></label>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"><?php echo $model->getLabel('Description') ?>:</div>
    <div class="form_input">
        <textarea name="Description" value="" class="mceEditor"></textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="footer_panel" align="right"> 
       <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active" onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onClick="ajaxShopForm(this);" />
    </div>

<?php  echo form_csrf ();  ?>
</form>

<script type="text/javascript">
    load_editor();
</script>
<?php $mabilis_ttl=1311066159; $mabilis_last_modified=1287062758; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\paymentMethods\create.tpl ?>