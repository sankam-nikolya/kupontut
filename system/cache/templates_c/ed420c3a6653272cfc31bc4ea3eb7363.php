<?php include ('Z:\home\kupontut.il\www\application\libraries\mabilis/functions/func.truncate.php');  ?><div class="saPageHeader" style="float:left;width:100%;">

    <div style="float:right;padding:10px 10px 0 0">
        Фильтр: 
        <select name="CategoryId"  style="margin-right:15px;" onChange="filterPropertiesByCategory(this);">
        <option value="0">- Все категории -</option>
            <?php if(is_true_array($categories)){ foreach ($categories as $category){ ?>
            <?php $selected = '' ?>
            <?php if($filterCategory instanceof SCategory && $category->getId() == $filterCategory->getId()): ?>
                <?php $selected='selected="selected"' ?>
            <?php endif; ?>
                <option value="<?php echo $category->getId() ?>" <?php if(isset($selected)){ echo $selected; } ?> ><?php  echo str_repeat ('-',$category->getLevel());  ?> <?php echo ShopCore::encode($category->getName()) ?></option>
            <?php }} ?>
        </select>

           <input type="button" class="button_silver_130" value="Создать свойство" onclick="ajaxShop('properties/create');"/>
    </div>

    <h2>Просмотр свойств товаров</h2>
</div>


<?php if(sizeof($model) == 0): ?>
    <div id="notice" style="width: 500px; margin-top:50px;">Список свойств пустой.
        <a href="#" onclick="ajaxShop('properties/create'); return false;">Создать.</a>
    </div>
    <?php return ?>
<?php endif; ?>

<div id="sortable" style="clear:both;">
		  <table id="ShopProductsPropertiesHtmlTable">
		  	<thead>
                <th width="5px;">ID</th>
                <th>Название</th>
                <th width="100px;">
                    Позиция
                    <img src="/templates/administrator/images/save.png" align="absmiddle" style="cursor:pointer;width:22px;height:22px;"
                    onclick="SavePropertiesPositions(); return false;">
                </th>
                <th width="24px"></th>
			</thead>
			<tbody>
                <?php if(is_true_array($model)){ foreach ($model as $p){ ?>
                <tr id="prop<?php echo $p->getId() ?>">
                    <td><?php echo $p->getId() ?></td>
                    <td><a href="javascript:ajaxShop('properties/edit/<?php echo $p->getId() ?>');"><?php  echo func_truncate (ShopCore::encode($p->getName()),100);  ?></a></td>
                    <td>
                        <input type="text" value="<?php echo $p->getPosition() ?>" style="width:26px;" class="SPropertyPos" id="SProp<?php echo $p->getId() ?>">
                    </td>
                    <td><img onclick="confirm_shop_delete_property(<?php echo $p->getId() ?>);" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete.png"  style="cursor:pointer" width="16" height="16" title="Удалить" /></td>
                </tr>
                <?php }} ?>
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
                </tr>
			</tfoot>
		  </table>
</div>
    <script type="text/javascript">
        window.addEvent('domready', function(){ 
            shopProductPropertiesTable = new sortableTable('ShopProductsPropertiesHtmlTable', { overCls: 'over', sortOn: -1 ,onClick: function(){  } });
            shopProductPropertiesTable.altRow();
         });
    </script>

<?php $mabilis_ttl=1311344579; $mabilis_last_modified=1290522140; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\properties\list.tpl ?>