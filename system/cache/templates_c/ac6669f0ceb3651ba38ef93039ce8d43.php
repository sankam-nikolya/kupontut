<script type="text/javascript">
var deliveryMethods_prices = new Array;
var currencySymbol = '<?php if(isset($CS)){ echo $CS; } ?>';
var totalPrice = '<?php echo ShopCore::app()->SCart->totalPrice() ?>';

<?php if(is_true_array($deliveryMethods)){ foreach ($deliveryMethods as $d){ ?>
    deliveryMethods_prices[<?php echo $d->getId() ?>] = '<?php echo $d->toCurrency() ?>';
<?php }} ?>
    function changeDeliveryMethod(id, free)
    { 
        document.getElementById('deliveryMethodId').value = id;

        if (free == true)
        { 
            document.getElementById('totalPriceText').innerHTML = totalPrice + ' ' + currencySymbol; 
         }
        else
        { 
            var result = parseFloat(deliveryMethods_prices[id]) + parseFloat(totalPrice);
            document.getElementById('totalPriceText').innerHTML = result.toFixed(2).toString() + ' ' + currencySymbol;
         }
     }

</script>
<div class="c_t"></div>
<div class="c_c">
	<div class="c_content">
		<div class="crumb"><span>Оформление заказа</span></div>
		<div class="zakaz">

			<?php if(!$items): ?>
				<?php echo ShopCore::t('Корзина пуста') ?>
			<?php else: ?>
			<?php if(is_true_array($items)){ foreach ($items as $key=>$item){ ?>
			<div class="kupon">
				<div class="tlw"></div>
				<div class="trw"></div>
				<div class="b_all"></div>
				<div class="img_all">
				<?php if($item['model'] ->getMainImage()): ?>
					<img src="<?php  echo productImageUrl ( $item['model'] ->getId() . '_main.jpg');  ?>" border="0" alt="image" />
                <?php endif; ?>
				</div>
				<div class="sale"><span>скидка</span><big>75</big><small>%</small></div>
				<div class="c"></div>
			</div>
			<a class="h2" target="_blank" href="<?php  echo shop_url ('product/' .  $item['model'] ->getUrl());  ?>"><?php  echo ShopCore::encode( $item['model'] ->getName())  ?></a>
			<div class="cena">
				
				<span>Цена</span><span>Количество</span><span>Стоимость</span><div class="clear"></div>
				<p><strong id="cena"><?php  echo  $item['price']   ?></strong> <?php if(isset($CS)){ echo $CS; } ?>. </p>
				<p><a href="#" class="minus">&nbsp;</a><label><input value="1" name="kol" type="text"></label><a href="#" class="plus">&nbsp;</a></p>
				<p><strong id="summ"><?php echo ShopCore::app()->SCart->totalPrice() ?></strong> <?php if(isset($CS)){ echo $CS; } ?>. </p>
			</div>
			<?php }} ?>
			<div class="clear"></div>
			<div class="pays">
				<h2>Выберите способ оплаты</h2>
				<p>
					<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/pay1.png" alt=""></a>
					<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/pay2.png" alt=""></a>
					<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/pay3.png" alt=""></a>
					<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/pay4.png" alt=""></a>
					<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/pay5.png" alt=""></a>
					<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/pay6.png" alt=""></a>
				</p>
				<div class="clear"></div>
				<label><input value="1" name="ch" type="checkbox"><span>При покупке купона Вы соглашаетесь с договором публичной <a target="_blank" href="/oferta">оферты</a></span></label>
			</div>
			<?php endif; ?>
		</div>
		<div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" alt=""></div>
	</div>
</div>
<div class="c_b1"></div>
<div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" alt="" height="20"></div>
<?php $mabilis_ttl=1311509902; $mabilis_last_modified=1311425300; //Z:\home\kupontut.il\www\templates\commerce\shop\default/cart.tpl ?>