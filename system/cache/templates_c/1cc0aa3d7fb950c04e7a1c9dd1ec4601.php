<div class="c_t"></div>
<div class="c_c">
	<div class="c_content">
		<div class="sn4">
			<span>Рассказать друзьям:</span>
			<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/mail.png" alt="" /></a>
			<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/vk.png" alt="" /></a>
			<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/tw.png" alt="" /></a>
			<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/face.png" alt="" /></a>
			<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/jj.png" alt="" /></a>
			<a href="#"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/plus.png" alt="" /></a>
		</div>
		<div class="crumb">
			<?php if($CI->uri->segment(4) != 'current_stock'): ?>
			<span>Прошедшие акции</span><a href="/shop/category/minsk/current_stock">Текущие акции</a>
			<?php else: ?>
			<span>Текущие акции</span><a href="/shop/category/minsk/past_actions">Прошедшие акции</a>
			<?php endif; ?>
		</div>

		<?php if($totalProducts > 0): ?>
			<div class="action_list">
			<?php $count = 1; ?>
			<?php if(is_true_array($products)){ foreach ($products as $p){ ?>
				<div class="kupon">
					<div class="tlw"></div>
					<div class="trw"></div>
					<div class="img"><img src="<?php  echo productImageUrl ($p->getId() . '_small.jpg');  ?>" alt="" /></div>
					<div class="sale"><span>скидка</span><big><?php echo $p->toCurrency('OldPrice') ?></big><small>%</small></div>
					<div class="c">
						<a href="<?php  echo shop_url ('product/' . $p->getUrl());  ?>"><?php echo ShopCore::encode($p->getName()) ?></a>
						<p>Уже куплено<br /><strong>2</strong> купона</p>
						<p>Цена купона<br /><strong><?php echo $p->firstVariant->toCurrency() ?> <?php if(isset($CS)){ echo $CS; } ?>. </strong></p>
					</div>
					<div class="b"></div>
				</div>
			<?php }} ?>
				<div class="clear"></div>
				<div class="pager">
					<?php if(isset($pagination)){ echo $pagination; } ?>
				</div>
				<div class="clear"></div>
				
			</div>
		<?php else: ?>
			<p>
				<?php echo ShopCore::t('В категории нет продуктов') ?>.
			</p>
		<?php endif; ?>
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
		<div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" alt="" /></div>
	</div>
</div>
<div class="c_b1"></div>
<div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" alt="" /></div>
<div class="know"><p>Узнайте, как KuponTut.by может помочь Вам получить тысячи новых покупателей </p></div>
<div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" height="70" alt="" /></div>
<?php $mabilis_ttl=1311630902; $mabilis_last_modified=1311423646; //Z:\home\kupontut.il\www\templates\commerce\shop\default/category.tpl ?>