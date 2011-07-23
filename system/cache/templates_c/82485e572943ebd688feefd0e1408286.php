<div class="saPageHeader">
    <h2>Редактирование способов доставки</h2>
</div>

<?php if(sizeof($model)==0): ?>
    <div id="notice" style="width: 500px; ">Список пустой.
        <a href="#" onclick="ajaxShop('deliverymethods/create'); return false;">Создать.</a>
    </div>

    <?php return ?>
<?php endif; ?>

<div id="sortable">
		  <table id="ShopDeliveryMethodsTable">
		  	<thead>
                <th width="5px">ID</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Бесплатен от</th>
                <th>Активен</th>
                <th width="15px"></th>
			</thead>
			<tbody>
		<?php if(is_true_array($model)){ foreach ($model as $c){ ?>
		<tr id="deliverymethodRow<?php echo $c->getId() ?>">
			<td><?php echo $c->getId() ?></td>
			<td onclick="javascript:ajaxShop('deliverymethods/edit/<?php echo $c->getId() ?>');"><?php echo ShopCore::encode($c->getName()) ?></td>
            <td><?php echo $c->getPrice() ?> <?php if(isset($CS)){ echo $CS; } ?></td>
            <td><?php echo $c->getFreeFrom() ?> <?php if(isset($CS)){ echo $CS; } ?></td>
            <td><?php if($c->getEnabled()): ?> Да <?php else: ?> Нет <?php endif; ?></td> 
            <td><img onclick="confirm_shop_delete_dm(<?php echo $c->getId() ?>);" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete.png"  style="cursor:pointer" width="16" height="16" title="Удалить" /></td>
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
                </tr>
			</tfoot>
		  </table>
</div>
		<script type="text/javascript">
			window.addEvent('domready', function(){ 
				var ShopDeliveryMethodsTable = new sortableTable('ShopDeliveryMethodsTable', { overCls: 'over', sortOn: -1 ,onClick: function(){  } });
                ShopDeliveryMethodsTable.altRow();
			 });

function confirm_shop_delete_dm(id)
{ 
alertBox.confirm('<h1>Удалить способ доставки ID: ' + id + '? </h1>', { onComplete:
	function(returnvalue) { 
        if(returnvalue)
        { 
            $('deliverymethodRow' + id).setStyle('background-color','#D95353');
            var req = new Request.HTML({ 
                method: 'post',
                url: shop_url + 'deliverymethods/delete',
                evalResponse: true,
                onComplete: function(response) {   
                    $('deliverymethodRow' + id).dispose();
                    if ($$('#ShopDeliveryMethodsTable tbody tr').length == 0)
                    { 
                        ajaxShop('deliverymethods/c_list'); 
                     }
                 }
             }).post({ 'id': id });
         }
	 }
 });
 }

        </script>

<?php $mabilis_ttl=1311413989; $mabilis_last_modified=1289920762; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\deliveryMethods\list.tpl ?>