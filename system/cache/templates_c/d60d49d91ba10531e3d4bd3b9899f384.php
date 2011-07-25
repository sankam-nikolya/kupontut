<form action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>/settings/update" method="post" style="width:100%;">
<input type="hidden" name="systemTemplatePath" id="systemTemplatePath" value="<?php echo ShopCore::app()->SSettings->systemTemplatePath ?>"/>

    <div id="shopSettingsTabs">

        <h4 title="Внешний вид">Внешний вид</h4>
        <div> <!-- Begin look tab -->
            <div class="form_text">Количество товаров на сайте</div>
            <div class="form_input">
                <input type="text" value="<?php echo ShopCore::app()->SSettings->frontProductsPerPage ?>" name="frontProductsPerPage" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Количество товаров в панели управления</div>
            <div class="form_input">
                <input type="text" value="<?php echo ShopCore::app()->SSettings->adminProductsPerPage ?>" name="adminProductsPerPage" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text"></div>
            <div class="form_input">
                <b>Шаблон</b>
            </div>
            <div class="form_overflow"></div>

            <div class="form_text"></div>
            <div class="form_input">
                <?php if($templates): ?>
                    <?php if(is_true_array($templates)){ foreach ($templates as $t){ ?>
                        <div class="templateScreenshot" style="float:left;">
                            <?php if(file_exists($t . '/screenshot.png')): ?>
                            <div style="float:left;">
                                <img src="<?php echo $t . '/screenshot.png' ?>" width="100" height="100"
                                onclick="setSystemTemplate(this, '<?php if(isset($t)){ echo $t; } ?>');"
                                alt="<?php if(isset($t)){ echo $t; } ?>"
                                title="<?php if(isset($t)){ echo $t; } ?>"
                                <?php if($t == ShopCore::app()->SSettings->systemTemplatePath): ?>
                                    class="active" 
                                <?php endif; ?>
                                />
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php }} ?>
                <?php else: ?>
                    Список шаблонов пустой.
                <?php endif; ?>
            </div>
            <div class="form_overflow"></div>
        </div> <!-- End of look tab -->

        <h4 title="Настройки">Изображения</h4>
        <div> <!-- Begin images tab -->
            <div class="form_text">Основное изображение</div>
            <div class="form_input">
                <input type="text" value="<?php echo ShopCore::app()->SSettings->mainImageWidth ?>" name="images[mainImageWidth]" class="textbox_short" style="width:28px;" />
                x
                <input type="text" value="<?php echo ShopCore::app()->SSettings->mainImageHeight ?>" name="images[mainImageHeight]" class="textbox_short" style="width:28px;" /> px
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Маленькое изображение</div>
            <div class="form_input">
                <input type="text" value="<?php echo ShopCore::app()->SSettings->smallImageWidth ?>" name="images[smallImageWidth]" class="textbox_short" style="width:28px;" />
                x
                <input type="text" value="<?php echo ShopCore::app()->SSettings->smallImageHeight ?>" name="images[smallImageHeight]" class="textbox_short" style="width:28px;" /> px
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Дополнительные изображения</div>
            <div class="form_input">
                <input type="text" value="<?php echo ShopCore::app()->SSettings->addImageWidth ?>" name="images[addImageWidth]" class="textbox_short" style="width:28px;" />
                x
                <input type="text" value="<?php echo ShopCore::app()->SSettings->addImageHeight ?>" name="images[addImageHeight]" class="textbox_short" style="width:28px;" /> px
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Качество</div>
            <div class="form_input">
                <input type="text" value="<?php echo ShopCore::app()->SSettings->imagesQuality ?>" name="images[quality]" class="textbox_short" style="width:80px;" /> %
            </div>
            <div class="form_overflow"></div>
        </div> <!-- end of images tab -->

        <h4 title="Заказы">Заказы</h4>
        <div> <!-- Begin orders tab -->
            <div class="form_text">Отправлять email</div>
            <div class="form_input">
                <select name="orders[sendUserEmail]">
                    <option <?php if(ShopCore::app()->SSettings->ordersSendMessage=='true'): ?>selected<?php endif; ?> value="true">Да</option>
                    <option <?php if(ShopCore::app()->SSettings->ordersSendMessage=='false'): ?>selected<?php endif; ?> value="false">Нет</option>
                </select>
                <div class="lite">Отправлять пользователю письмо о совершении заказа.</div>
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Email адрес отправителя</div>
            <div class="form_input">
                <input type="text" value="<?php echo ShopCore::app()->SSettings->ordersSenderEmail ?>" name="orders[senderEmail]" class="textbox_long" />
                <div class="lite">Например: noreply@example.com</div>
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Имя отправителя</div>
            <div class="form_input">
            <input type="text" value="<?php echo ShopCore::app()->SSettings->ordersSenderName ?>" name="orders[senderName]" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Тема сообщения</div>
            <div class="form_input">
            <input type="text" value="<?php echo ShopCore::app()->SSettings->ordersMessageTheme ?>" name="orders[theme]" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Формат сообщения</div>
            <div class="form_input">
                <select name="orders[messageFormat]">
                    <option <?php if(ShopCore::app()->SSettings->ordersMessageFormat=='text'): ?>selected<?php endif; ?> value="text">text</option>
                    <option <?php if(ShopCore::app()->SSettings->ordersMessageFormat=='html'): ?>selected<?php endif; ?> value="html">html</option>
                </select>
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Текст сообщения</div>
            <div class="form_input">
                <textarea rows="10" cols="10" style="width:550px;height:250px" name="orders[userMessageText]"><?php echo ShopCore::encode(ShopCore::app()->SSettings->ordersMessageText) ?></textarea>

                <div>
                    <b>Вы можете использовать следующие переменные:</b><br/>
                    %userName% - Имя пользователя совершившего заказ<br/>
                    %userEmail% - Email адрес заказчика<br/>
                    %userPhone% - Номер телефона заказчика<br/>
                    %userDeliver% - Адрес доставки кторый указал пользователь<br/>
                    %orderId% - ID заказа<br/>
                    %orderKey% - Ключь для просмотра заказа<br/>
                    %orderLink% - Ссылка по которой можно просмотреть заказ<br/>
                </div>
            </div>
            <div class="form_overflow"></div>
        </div> <!-- End of orders tab -->

    </div> <!-- end shopSettingsTabs -->


    <div class="form_text"></div>
    <div class="form_input">
        <input type="submit" name="button" class="button" value="Сохранить" onclick="ajaxShopForm(this);" />
    </div>

<?php  echo form_csrf ();  ?>
</form>

<br/>
<br/>
<script type="text/javascript">
		var SSettings_tabs = new SimpleTabs('shopSettingsTabs', { 
		    selector: 'h4'
		 });

		function setSystemTemplate(el, path)
		{ 
		    $('systemTemplatePath').value = path;
		    $$('.templateScreenshot img').removeClass('active');
		    el.addClass('active');
		 }
</script>
<?php $mabilis_ttl=1311629278; $mabilis_last_modified=1291624714; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\settings\settings.tpl ?>