<div class="c_t"></div>
<div class="c_c">
	<div class="c_content">
		<div class="sn4">
			<span>Рассказать друзьям:</span>
			<a href="#"><img src="{$THEME}/images/mail.png" alt="" /></a>
			<a href="#"><img src="{$THEME}/images/vk.png" alt="" /></a>
			<a href="#"><img src="{$THEME}/images/tw.png" alt="" /></a>
			<a href="#"><img src="{$THEME}/images/face.png" alt="" /></a>
			<a href="#"><img src="{$THEME}/images/jj.png" alt="" /></a>
			<a href="#"><img src="{$THEME}/images/plus.png" alt="" /></a>
		</div>
		<div class="crumb"><span>Текущие акции</span><a href="#">Прошедшие акции (43)</a></div>
		
		{$page = ShopCore::app()->SPropertiesRenderer->renderPropertiesArrayKey($model);}
		
		<div class="action_img">
			<span class="button3"><span class="l">&nbsp;</span><span class="c">{$page.29}</span><span class="r">&nbsp;</span></span>
			<div class="title"><span>{echo ShopCore::encode($model->getName())}</span></div>
			<div> <img src="{productImageUrl($model->getMainImage())}" border="0" alt="image" /></div>
		</div>
		<div class="infs">
			<div class="inf_pos">
				<form action="/shop/cart/add" method="post" id="buy">
					<a href="#" class="button4" onclick="$('#buy').submit(); return false;">
						<span class="l">&nbsp;</span>
						<span class="c">Купить купон</span>
						<span class="r">&nbsp;</span>
					</a>
					<input type="hidden" name="variantId" value="{echo $model->firstVariant->getId()}" />
					<input type="hidden" name="quantity" value="1" />
					<input type="hidden" name="productId" value="{echo $model->getId()}" />
					{form_csrf()}
				</form>
				{$model->firstVariant}
				<span>Цена купона</span><br /><strong>{echo $model->firstVariant->toCurrency()} {$CS}.</strong>
			</div>
			<div class="inf_pos">
				<div class="sal">
					<p><span>Цена купона</span><br /><strong>{echo $model->firstVariant->toCurrency()} {$CS}.</strong></p>
					<div class="sale"><span>скидка</span><big>{echo $model->toCurrency('OldPrice')}</big><small>%</small></div>
					<p class="stoimost"><span>Стоимость</span><br /><strong>{echo $page.30 - $page.30*($model->toCurrency('OldPrice')/100) + $model->firstVariant->toCurrency()} {$CS}.</strong></p>
				</div>
			</div>
			<div class="inf_pos">
				<div class="timer">
					{if $model->created > time()}
					<span id="time_to_end" rel="{echo $model->created}" rev="{echo time()}">До завершения акции осталось:</span>
{literal}<script language="JavaScript">countdown = $('#time_to_end').attr('rel')-$('#time_to_end').attr('rev');document.write("<div class='dig' id='cd'></div>\n");do_cd(); </script>{/literal}
					
					<div class="day"><span>Дней</span><span>Часов</span><span>Минут</span><span>Секунд</span></div>
					{else:}
						<span>&nbsp;</span>
						<div class="day"><span>&nbsp;Акция уже состоялась!</span></div>
					
					{/if}
				</div>

				
			</div>
			<div class="inf_pos">
				<div class="gift">
					<a href="#">Сделать подарок</a>
				</div>
			</div>
			<div class="inf_pos polz">
				<span><strong>Куплено купонов: 44</strong>, остаток {echo $model->firstVariant->getStock()}. Ещё есть время <a href="#">купить!</a></span>
				<div class="polz_prog">
					<div class="r">&nbsp;</div>
					<div class="l">&nbsp;</div>
					<div class="c">
						<img src="{$THEME}/images/x.gif" height="27" width="150" alt="" />
					</div>
				</div>
				<div class="polz_bg">
					<div class="r">&nbsp;</div>
					<div class="l">&nbsp;</div>
					<div class="c">&nbsp;</div>
				</div>
				<div class="last">400</div>
				<div class="first">0</div>
			</div>
		</div>
	
		<div class="clear"><img src="{$THEME}/images/x.gif" alt="" /></div>
		
		{if $model->getRelatedProductsModels()}
		<div class="action_dop">
			<h2>Дополнительные акции!</h2>
			{foreach $model->getRelatedProductsModels() as $ps}
				{$ps->firstVariant}
				<div class="kupon">
					<div class="tlw"></div>
					<div class="tr"></div>
					<div class="img"><img src="{productImageUrl($ps->getId() . '_small.jpg')}" alt="" /></div>
					<div class="sale"><span>скидка</span><big>{echo $ps->toCurrency('OldPrice')}</big><small>%</small></div>
					<div class="c">
						<a href="{shop_url('product/' . $ps->getUrl())}">{echo ShopCore::encode($ps->getName())}</a>
						<p>Уже куплено<br /><strong>2</strong> купона</p>
						<p>Цена купона<br /><strong>{echo $ps->firstVariant->toCurrency()} {$CS}.</strong></p>
					</div>
					<div class="b"></div>
				</div>
			{/foreach}
		</div>
		{/if}
		
		<div class="inf_adres">
			<div>
				<h2><a href="#">{$page.28}</a></h2>
				{if strlen($page.20)}<p>
					<span id="addr" rel="{$page.20}">Адрес:</span><br />
					{$page.20}<br />
					{if strlen($page.23)}<a href="{$page.23}">{$page.23}</a>{/if}
				</p>{/if}
				{if strlen($page.22)}<p><span>Время:</span>{$page.22}</p>{/if}
				{if strlen($page.21)}<p><span>Телефоны:</span><br />{$page.21}</p>{/if}
				{if strlen($page.20)}<p><span>Карта:</span></p>
{literal}
<script src="http://api-maps.yandex.ru/1.1/index.xml?key=AMdcJU4BAAAAfwP1IAIADK67rHzOPvDwXl9ivYBERZcY4Z0AAAAAAAAAAAA92XaNAls7_r-m3gvE9NVmAc7w7Q=="
type="text/javascript"></script>
<script type="text/javascript">
	window.onload = function () {
		var map = new YMaps.Map(document.getElementById("YMapsID"));
			
		function showAddress (value) {
			var geocoder = new YMaps.Geocoder(value, {results: 1, boundedBy: map.getBounds()});
			YMaps.Events.observe(geocoder, geocoder.Events.Load, function () {
				if (this.length()) {
					geoResult = this.get(0);
					map.addOverlay(geoResult);
					map.setBounds(geoResult.getBounds());
				}else {
				   // alert("Ничего не найдено") 
				   $("#YMapsID").html("Ничего не найдено");
				}
			});
		
			// Процесс геокодирования завершен с ошибкой
			YMaps.Events.observe(geocoder, geocoder.Events.Fault, function (gc, error) {
				$("#YMapsID").html("Ничего не найдено");
			})
		}
		var addr = $('#addr').attr('rel');
		showAddress('Беларусь, ' + addr);
	}
</script>{/literal}
				<div id="YMapsID" style="width:240px;height:185px"></div>{/if}
			</div>
		</div>
		<div class="inf_desc">
			<h2>Описание акции</h2>
			 {echo $model->getShortDescription()}
		</div>
		<div class="clear"><img src="{$THEME}/images/x.gif" alt="" /></div>
  </div>
 </div>
<div class="c_b1"></div>
<div class="clear"><img src="{$THEME}/images/x.gif" alt="" /></div>
<div class="know"><p>Узнайте, как KuponTut.by может помочь Вам получить тысячи новых покупателей </p></div>
<div class="clear"><img src="{$THEME}/images/x.gif" height="70" alt="" /></div>

