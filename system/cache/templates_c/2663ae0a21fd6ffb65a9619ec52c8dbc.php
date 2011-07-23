<?php include ('Z:\home\kupontut.il\www\application\libraries\mabilis/functions/func.truncate.php');  ?><!-- Search products list -->

<?php if(isset($form)){ echo $form; } ?>

<?php if($totalProducts == 0): ?>
    <div id="notice" style="width: 500px; margin-top:50px;">
        Запрос вернул пустой результат.
    </div>
    <?php return ?>
<?php endif; ?>

<div id="sortable" style="clear:both;">
		  <table id="ShopProductsHtmlTable">
		  	<thead>
                <th width="1px"><input type="checkbox" onclick="ShopSwitchChecks(this);"/></th>
                <th width="5px">ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th width="18px"></th>
                <th width="18px"></th>
		<th width="18px"></th>
                <th width="18px"></th>
                <th width="100px">Цена</th>
			</thead>
			<tbody>
        <?php if(is_true_array($products)){ foreach ($products as $p){ ?>
        <?php $variants = $p->getProductVariants() ?>
		<tr id="productRow<?php echo $p->getId() ?>" class="row">
            <td width="1px"><input type="checkbox" class="chbx" rel="<?php echo $p->getId() ?>" onclick="productsListcheckForChecked();"/></td>
            <td><?php echo $p->getId() ?></td>
            <td>
                <a id="editProductLink<?php echo $p->getId() ?>" href="#"
                <?php if($p->getActive() == false): ?> class="productNotActivated" <?php endif; ?>
                onClick="ajaxShop('products/edit/<?php echo $p->getId() ?>?redirect=<?php if(isset($cur_uri_str)){ echo $cur_uri_str; } ?>'); return false;"><?php  echo func_truncate (ShopCore::encode($p->getName()),100);  ?></a>
            </td>
            <td>
                <?php echo $p->getMainCategory()->getName() ?>
            </td>
            <td>
                <?php if($p->getActive() == true): ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/tick_16.png" title="Активен" onclick="shopChangeProductActive(this, <?php echo $p->getId() ?>);" rel="true"/>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/tick_16_empty.png"  title="Активен" onclick="shopChangeProductActive(this, <?php echo $p->getId() ?>);" rel="false"/>
                <?php endif; ?>
            </td>
            <td>
                <?php if($p->getHit() == true): ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/star_16.png" title="Хит" onclick="shopChangeProductHit(this, <?php echo $p->getId() ?>);" rel="true"/>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/star_16_empty.png" title="Хит" onclick="shopChangeProductHit(this, <?php echo $p->getId() ?>);" rel="false"/>
                <?php endif; ?>
            </td>
            <td>
                <?php if($p->getHot() == true): ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/hot_16.png" title="Новинка" onclick="shopChangeProductHot(this, <?php echo $p->getId() ?>);" rel="true"/>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/hot_16_empty.png" title="Новинка" onclick="shopChangeProductHot(this, <?php echo $p->getId() ?>);" rel="false"/>
                <?php endif; ?>
            </td>
            <td>
                <?php if($p->getAction() == true): ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/action_16.png" title="Акция" onclick="shopChangeProductAction(this, <?php echo $p->getId() ?>);" rel="true"/>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/action_16_empty.png" title="Акция" onclick="shopChangeProductAction(this, <?php echo $p->getId() ?>);" rel="false"/>
                <?php endif; ?>
            </td>
            <td>
                <?php if(sizeof($variants) == 1): ?>
                    <?php echo $variants[0]->getPrice() ?> <?php if(isset($CS)){ echo $CS; } ?>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/arrow-315.png" title="Посмотреть варианты"  onclick="showVariantsWindow('vBlock<?php echo $p->getId() ?>');"/>
                    <div style="display:none;">
                    <div id="vBlock<?php echo $p->getId() ?>">
                        <table width="100%" cellpadding="3" cellspacing="2">
                        <thead>
                            <th>Название</th>
                            <th>Цена</th>
                        </thead>
                        <tbody>
                            <?php if(is_true_array($variants)){ foreach ($variants as $v){ ?>
                            <tr>
                                <td><?php echo $v->getName() ?></td>
                                <td><?php echo $v->getPrice() ?> <?php if(isset($CS)){ echo $CS; } ?></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
                <?php endif; ?>
            </td>
		</tr>
        <?php }} ?>
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
                                        <td></td>
					<td></td>
                </tr>
			</tfoot>
		  </table>
</div>

<div style="float:right;padding:10px 10px 0 0" class="pagination">
        <?php if(isset($pagination)){ echo $pagination; } ?>
</div>

<div style="padding:10px 10px 0 20px;">
    <b>Всего товаров:</b> <?php if(isset($totalProducts)){ echo $totalProducts; } ?>
</div>

<div class="footer_panel" align="right" id="productsListFooter" style="display:none;">
    <input id="footerImageButton" class="Tick" value="&nbsp;" type="button" onclick="shopProductsList_changeActive('<?php echo $CI->uri->uri_string() ?>?<?php  echo http_build_query (ShopCore::$_GET);  ?>');" title="Изменить 'Активен'">
    <input id="footerImageButton" class="Star" value="&nbsp;" type="button" onclick="shopProductsList_changeHit('<?php echo $CI->uri->uri_string() ?>?<?php  echo http_build_query (ShopCore::$_GET);  ?>');" title="Изменить 'Хит'">
	<input id="footerImageButton" class="Hot" value="&nbsp;" type="button" onclick="shopProductsList_changeHot('<?php echo $CI->uri->uri_string() ?>?<?php  echo http_build_query (ShopCore::$_GET);  ?>');" title="Изменить 'Новинка'">
	<input id="footerImageButton" class="Action" value="&nbsp;" type="button" onclick="shopProductsList_changeAction('<?php echo $CI->uri->uri_string() ?>?<?php  echo http_build_query (ShopCore::$_GET);  ?>');" title="Изменить 'Акция'">
</div>
    <script type="text/javascript">
        window.addEvent('domready', function(){ 
            shopProductsTable = new sortableTable('ShopProductsHtmlTable', { overCls: 'over', sortOn: -1 ,onClick: function(){  } });
            shopProductsTable.altRow();
         });
    </script>

<?php $mabilis_ttl=1311160188; $mabilis_last_modified=1308233576; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\search\list.tpl ?>