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
		<div class="crumb">
			{if $CI->uri->segment(4) != 'current_stock'}
			<span>Прошедшие акции</span><a href="/shop/category/minsk/current_stock">Текущие акции</a>
			{else:}
			<span>Текущие акции</span><a href="/shop/category/minsk/past_actions">Прошедшие акции</a>
			{/if}
		</div>

		{if $totalProducts > 0}
			<div class="action_list">
			{$count = 1;}
			{foreach $products as $p}
				<div class="kupon">
					<div class="tlw"></div>
					<div class="trw"></div>
					<div class="img"><img src="{productImageUrl($p->getId() . '_small.jpg')}" alt="" /></div>
					<div class="sale"><span>скидка</span><big>{echo $p->toCurrency('OldPrice')}</big><small>%</small></div>
					<div class="c">
						<a href="{shop_url('product/' . $p->getUrl())}">{echo ShopCore::encode($p->getName())}</a>
						<p>Уже куплено<br /><strong>2</strong> купона</p>
						<p>Цена купона<br /><strong>{echo $p->firstVariant->toCurrency()} {$CS}. </strong></p>
					</div>
					<div class="b"></div>
				</div>
			{/foreach}
				<div class="clear"></div>
				<div class="pager">
					{$pagination}
				</div>
				<div class="clear"></div>
				
			</div>
		{else:}
			<p>
				{echo ShopCore::t('В категории нет продуктов')}.
			</p>
		{/if}
		<div class="right_block">
			<ul class="month_list">
				<li><a href="#">Январь</a></li>
				<li><a href="#">Февраль</a></li>
				<li><a href="#">Март</a></li>
				<li><a href="#">Апрель</a></li>
				<li><a href="#">Май</a></li>
				<li><a href="#">Июнь</a></li>
				<li><a href="#">Июль</a></li>
				<li><a href="#">Август</a></li>
				<li><a href="#">Сентябрь</a></li>
				<li><a href="#">Октябрь</a></li>
				<li><a href="#">Ноябрь</a></li>
				<li><a href="#">Декабрь</a></li>
			</ul>
		</div>                    
		<div class="clear"><img src="{$THEME}/images/x.gif" alt="" /></div>
	</div>
</div>
<div class="c_b1"></div>
<div class="clear"><img src="{$THEME}/images/x.gif" alt="" /></div>
<div class="know"><p>Узнайте, как KuponTut.by может помочь Вам получить тысячи новых покупателей </p></div>
<div class="clear"><img src="{$THEME}/images/x.gif" height="70" alt="" /></div>
