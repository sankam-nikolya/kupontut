<div class="c_t"></div>
        	<div class="c_c">
            	<div class="c_content">
                    <div class="crumb"><span>Личный кабинет</span></div>
                    <ul class="menu_lk">
                    	<li><a href="/user_manager">Мои данные</a></li>
                        <li class="active"><a href="#">Мои купоны</a> <?php if($count_active > 0): ?><span>(активных: <?php if(isset($count_active)){ echo $count_active; } ?>)</span><?php endif; ?></li>
                        <li><a href="/user_manager/account">Лицевой счет</a> 30000 руб.</li>
                    </ul>

					<div class="action_list">	
						<?php if($totalProducts > 0 || 1): ?>
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
						<?php else: ?>
							<p><?php echo ShopCore::t('В категории нет продуктов') ?>.</p>
						<?php endif; ?>
					</div>		

                    <div class="right_block">
                    	<div class="show">
                        	<span>Показать:</span><br />
                            <a <?php if($CI->uri->segment(3) == 'all'): ?>class="active"<?php endif; ?> href="/user_manager/kupon/all">Все</a><br />
                            <a <?php if($CI->uri->segment(3) != 'completed' && $CI->uri->segment(3) != 'all'): ?>class="active"<?php endif; ?> href="/user_manager/kupon/active">Активные</a><br />
                            <a <?php if($CI->uri->segment(3) == 'completed'): ?>class="active"<?php endif; ?> href="/user_manager/kupon/completed">Завершенные</a>
                        </div>
                    </div>                    
                    <div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" alt="" /></div>
                </div>
            </div>
        	<div class="c_b1"></div>
            <div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" alt="" /></div>
            <div class="know"><p>Узнайте, как KuponTut.by может помочь Вам получить тысячи новых покупателей </p></div>
            <div class="clear"><img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/x.gif" height="70" alt="" /></div><?php $mabilis_ttl=1311663728; $mabilis_last_modified=1311578249; //Z:\home\kupontut.il\www\application\modules\user_manager/templates/public/user_kupon.tpl ?>