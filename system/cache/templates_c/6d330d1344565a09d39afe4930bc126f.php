<div class="saPageHeader">
    <h2>Редактирование способов оплаты</h2>
</div>

<?php if(sizeof($model)==0): ?>
    <div id="notice" style="width: 500px; ">Список способов оплаты пустой.
        <a href="#" onclick="ajaxShop('paymentmethods/create'); return false;">Создать.</a>
    </div>

    <?php return ?>
<?php endif; ?>

<div id="sortable">
		  <table id="ShopPaymentMethodsTable">
		  	<thead>
                <th width="5px">ID</th>
                <th>Название</th>
                <th>Валюта</th>
                <th>Активен</th>
                <th>
                    Позиция
                    <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/save.png" align="absmiddle" style="cursor:pointer;width:22px;height:22px;" 
                    onclick="SavePaymentMethodsPositions(); return false;" />   
                </th>
                <th width="16px"></th>
			</thead>
			<tbody>
		<?php if(is_true_array($model)){ foreach ($model as $c){ ?>
		<tr id="paymentMethodRow<?php echo $c->getId() ?>">
			<td><?php echo $c->getId() ?></td>
			<td onclick="javascript:ajaxShop('paymentmethods/edit/<?php echo $c->getId() ?>');"><?php echo ShopCore::encode($c->getName()) ?></td>
			<td><?php echo ShopCore::encode($c->getCurrency()->getName()) ?></td>
            <td><?php if($c->getActive()): ?> Да <?php else: ?> Нет <?php endif; ?></td>
            <td>
                <input type="text" value="<?php echo $c->getPosition() ?>" style="width:26px;" rel="<?php echo $c->getId() ?>" name="PaymentPos[<?php echo $c->getId() ?>]" class="SPaymentPos" />
            </td>
            <td><img onclick="confirm_shop_delete_pm(<?php echo $c->getId() ?>);" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete.png"  style="cursor:pointer" width="16" height="16" title="Удалить" /></td>
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
				var ShopPaymentMethodsTable = new sortableTable('ShopPaymentMethodsTable', { overCls: 'over', sortOn: -1 ,onClick: function(){  } });
                ShopPaymentMethodsTable.altRow();
			 });

            function confirm_shop_delete_pm(id)
            { 
            alertBox.confirm('<h1>Удалить способ оплаты ID: ' + id + '? </h1>', { onComplete:
                function(returnvalue) { 
                    if(returnvalue)
                    { 
                        $('paymentMethodRow' + id).setStyle('background-color','#D95353');
                        var req = new Request.HTML({ 
                            method: 'post',
                            url: shop_url + 'paymentmethods/delete',
                            evalResponse: true,
                            onComplete: function(response) {   
                                $('paymentMethodRow' + id).dispose();
                                if ($$('#ShopPaymentMethodsTable tbody tr').length == 0)
                                { 
                                    ajaxShop('paymentmethods/index'); 
                                 }
                             }
                         }).post({ 'id': id });
                     }
                 }
             });
             }

function SavePaymentMethodsPositions()
{ 
    var item_pos = new Array();

    var items = $('ShopPaymentMethodsTable').getElements('input');
    items.each(function(el,i) { 
        if(el.hasClass('SPaymentPos')) 
        { 
            item_pos[el.getAttribute('rel')] = el.value;
         }  
     });

    var req = new Request.HTML({ 
       method: 'post',
       url: shop_url + 'paymentmethods/savePositions',
       onRequest: function() {   },
       onComplete: function(response) {  
            ajaxShop('paymentmethods/index');
        }
     }).post({ 'positions': item_pos  });  
 }

        </script>

<?php $mabilis_ttl=1311066187; $mabilis_last_modified=1289920792; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\paymentMethods\list.tpl ?>