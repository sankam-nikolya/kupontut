<script type="text/javascript">
var deliveryMethods_prices = new Array;
var currencySymbol = '{$CS}';
var totalPrice = '{echo ShopCore::app()->SCart->totalPrice()}';

{foreach $deliveryMethods as $d}
    deliveryMethods_prices[{echo $d->getId()}] = '{echo $d->toCurrency()}';
{/foreach}

{literal}
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
{/literal}
</script>
<div class="c_t"></div>
<div class="c_c">
	<div class="c_content">
		<div class="crumb"><span>Оформление заказа</span></div>
		<div class="zakaz">

			{if !$items}
				{echo ShopCore::t('Корзина пуста')}
			{else:}
			{foreach $items as $key=>$item}
			<div class="kupon">
				<div class="tlw"></div>
				<div class="trw"></div>
				<div class="b_all"></div>
				<div class="img_all">
				{if $item.model->getMainImage()}
					<img src="{productImageUrl($item.model->getId() . '_main.jpg')}" border="0" alt="image" />
                {/if}
				</div>
				<div class="sale"><span>скидка</span><big>75</big><small>%</small></div>
				<div class="c"></div>
			</div>
			<a class="h2" target="_blank" href="{shop_url('product/' . $item.model->getUrl())}">{echo ShopCore::encode($item.model->getName())}</a>
			<div class="cena">
				
				<span>Цена</span><span>Количество</span><span>Стоимость</span><div class="clear"></div>
				<p><strong id="cena">{echo $item.price}</strong> {$CS}. </p>
				<p><a href="#" class="minus">&nbsp;</a><label><input value="1" name="kol" type="text"></label><a href="#" class="plus">&nbsp;</a></p>
				<p><strong id="summ">{echo ShopCore::app()->SCart->totalPrice()}</strong> {$CS}. </p>
			</div>
			{/foreach}
			<div class="clear"></div>
			<div class="pays">
				<h2>Выберите способ оплаты</h2>
				<p>
					<a href="#"><img src="{$THEME}/images/pay1.png" alt=""></a>
					<a href="#"><img src="{$THEME}/images/pay2.png" alt=""></a>
					<a href="#"><img src="{$THEME}/images/pay3.png" alt=""></a>
					<a href="#"><img src="{$THEME}/images/pay4.png" alt=""></a>
					<a href="#"><img src="{$THEME}/images/pay5.png" alt=""></a>
					<a href="#"><img src="{$THEME}/images/pay6.png" alt=""></a>
				</p>
				<div class="clear"></div>
				<label><input value="1" name="ch" type="checkbox"><span>При покупке купона Вы соглашаетесь с договором публичной <a target="_blank" href="/oferta">оферты</a></span></label>
			</div>
			{/if}
		</div>
		<div class="clear"><img src="{$THEME}/images/x.gif" alt=""></div>
	</div>
</div>
<div class="c_b1"></div>
<div class="clear"><img src="{$THEME}/images/x.gif" alt="" height="20"></div>
