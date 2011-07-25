<div class="saPageHeader">
    <h2>Редактирование категорий</h2>
</div>

<?php if(sizeof($tree)==0): ?>
    <div id="notice" style="width: 500px; ">Список категорий пустой.
        <a href="#" onclick="ajaxShop('categories/create'); return false;">Создать.</a>
    </div>

    <?php return ?>
<?php endif; ?>

<div id="sortable">
		  <table id="ShopCatsHtmlTable">
		  	<thead>
                <th width="5px">ID</th>
                <th>Имя</th>
                <th>URL</th>
                <th>Активная</th>
                <th>
                    Позиция
                    <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/save.png" align="absmiddle" style="cursor:pointer;width:22px;height:22px;" 
                    onclick="SaveCategoriesPositions(); return false;" />  
                </th>
                <th width="15px"></th>
			</thead>
			<tbody>
		<?php if(is_true_array($tree)){ foreach ($tree as $c){ ?>
		<tr <?php if(!$c->getActive()): ?>class="unactiveCategory"<?php endif; ?>>
			<td><?php echo $c->getId() ?></td>
			<td onclick="javascript:ajaxShop('categories/edit/<?php echo $c->getId() ?>');">
                <?php  echo str_repeat ('-',$c->getLevel());  ?>
                <?php if($c->getLevel()==0): ?>
                    <b><?php echo ShopCore::encode($c->getName()) ?></b>
                <?php else: ?>
                    <?php echo ShopCore::encode($c->getName()) ?>
                <?php endif; ?>
            </td>
			<td><a href="<?php  echo shop_url ('category/' . $c->getFullPath());  ?>" target="_blank"><?php echo $c->getFullPath() ?></a></td>
			<td><?php if($c->getActive()): ?> Да <?php else: ?> Нет <?php endif; ?></td>
            <td>
                <input type="text" value="<?php echo $c->getPosition() ?>" style="width:26px;" class="SCategoryPos" id="SCat<?php echo $c->getId() ?>" /> 
            </td>
            <td><img onclick="confirm_shop_category(<?php echo $c->getId() ?>);" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete.png"  style="cursor:pointer" width="16" height="16" title="Удалить" /></td>
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
                </tr>
			</tfoot>
		  </table>
</div>
		<script type="text/javascript">
			window.addEvent('domready', function(){ 
				shopCatsTable = new sortableTable('ShopCatsHtmlTable', { overCls: 'over', sortOn: -1 ,onClick: function(){  } });
                shopCatsTable.altRow();
			 });

function confirm_shop_category(id)
{ 
alertBox.confirm('<h1>Удалить категорию ID: ' + id + '? </h1>', { onComplete:
	function(returnvalue) { 
        if(returnvalue)
        { 
            var req = new Request.HTML({ 
                method: 'post',
                url: shop_url + 'categories/delete',
                evalResponse: true,
                onComplete: function(response) {   
                    ajaxShop('categories/c_list');
                    loadShopSidebarCats();
                 }
             }).post({ 'id': id });
         }
	 }
 });
 }

        </script>

<?php $mabilis_ttl=1311627699; $mabilis_last_modified=1303832256; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\categories\list.tpl ?>