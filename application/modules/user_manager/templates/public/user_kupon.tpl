<div class="c_t"></div>
        	<div class="c_c">
            	<div class="c_content">
                    <div class="crumb"><span>Личный кабинет</span></div>
                    <ul class="menu_lk">
                    	<li><a href="/user_manager">Мои данные</a></li>
                        <li class="active"><a href="#">Мои купоны</a> {if $count_active > 0}<span>(активных: {$count_active})</span>{/if}</li>
                        <li><a href="/user_manager/account">Лицевой счет</a> 30000 руб.</li>
                    </ul>

					<div class="action_list">	
						{if $totalProducts > 0 || 1}
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
						{else:}
							<p>{echo ShopCore::t('В категории нет продуктов')}.</p>
						{/if}
					</div>		

                    <div class="right_block">
                    	<div class="show">
                        	<span>Показать:</span><br />
                            <a {if $CI->uri->segment(3) == 'all'}class="active"{/if} href="/user_manager/kupon/all">Все</a><br />
                            <a {if $CI->uri->segment(3) != 'completed' && $CI->uri->segment(3) != 'all'}class="active"{/if} href="/user_manager/kupon/active">Активные</a><br />
                            <a {if $CI->uri->segment(3) == 'completed'}class="active"{/if} href="/user_manager/kupon/completed">Завершенные</a>
                        </div>
                    </div>                    
                    <div class="clear"><img src="{$THEME}/images/x.gif" alt="" /></div>
                </div>
            </div>
        	<div class="c_b1"></div>
            <div class="clear"><img src="{$THEME}/images/x.gif" alt="" /></div>
            <div class="know"><p>Узнайте, как KuponTut.by может помочь Вам получить тысячи новых покупателей </p></div>
            <div class="clear"><img src="{$THEME}/images/x.gif" height="70" alt="" /></div>