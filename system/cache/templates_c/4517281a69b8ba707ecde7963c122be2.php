<div class="saPageHeader">
    <h2>Редактирование брендов</h2>
</div>

<?php if(sizeof($model)==0): ?>
    <div id="notice" style="width: 500px; ">Список брендов пустой.
        <a href="#" onclick="ajaxShop('brands/create'); return false;">Создать.</a>
    </div>

    <?php return ?>
<?php endif; ?>

<div id="sortable">
		  <table id="ShopBrandsTable">
		  	<thead>
                <th width="5px">ID</th>
                <th>Название</th>
                <th>URL</th>
                <th width="15px"></th>
			</thead>
			<tbody>
		<?php if(is_true_array($model)){ foreach ($model as $c){ ?>
		<tr id="brandRow<?php echo $c->getId() ?>">
			<td><?php echo $c->getId() ?></td>
			<td onclick="javascript:ajaxShop('brands/edit/<?php echo $c->getId() ?>');"><?php echo ShopCore::encode($c->getName()) ?></td>
			<td><a href="<?php echo shop_url('brands/'.$c->getUrl()) ?>"><?php echo shop_url('brands/'.$c->getUrl()) ?></a></td>
            <td><img onclick="confirm_shop_delete_brand(<?php echo $c->getId() ?>);" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete.png"  style="cursor:pointer" width="16" height="16" title="Удалить" /></td>
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
            var ShopBrandsTable = new sortableTable('ShopBrandsTable', { overCls: 'over', sortOn: -1 ,onClick: function(){  } });
            ShopBrandsTable.altRow();
         });

        function confirm_shop_delete_brand(id)
        { 
            alertBox.confirm('<h1>Удалить бренд ID: ' + id + '? </h1>', { onComplete:
                function(returnvalue) { 
                    if(returnvalue)
                    { 
                        $('brandRow' + id).setStyle('background-color','#D95353');
                        var req = new Request.HTML({ 
                            method: 'post',
                            url: shop_url + 'brands/delete',
                            evalResponse: true,
                            onComplete: function(response) { 
                                $('brandRow' + id).dispose();
                                if ($$('#ShopBrandsTable tbody tr').length == 0)
                                { 
                                    ajaxShop('brands/c_list');
                                 }
                             }
                         }).post({ 'id': id });
                     }
                 }
             });
         }
        </script>

<?php $mabilis_ttl=1309008383; $mabilis_last_modified=1289920626; //X:\home\kupontut.il\www\/application/modules/shop/admin\templates\brands\list.tpl ?>