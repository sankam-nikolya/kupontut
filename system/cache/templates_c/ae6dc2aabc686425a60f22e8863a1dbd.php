<?php # View ordered products ?>

<h5>Заказ № <?php echo $model->getId() ?></h5>
    <?php if($CI->session->flashdata('makeOrder') === true): ?>
    <div style="padding:10px;background-color:#f5f5dc;">
        Спасибо за Ваш заказ.
    </div>
    <?php endif; ?>

<div class="spLine"></div>

<div class="orderViewInfo">
    Оплачен: <?php if($model->getPaid() == true): ?> Да<?php else:  ?>Нет<?php endif; ?>
   <br/>Статус: <?php echo SOrders::$statuses[$model->getStatus()] ?>
    <?php if($model->getDeliveryMethod() > 0): ?>
        <br/>Способ доставки: <?php echo $model->getSDeliveryMethods()->getName() ?>
    <?php endif; ?>
</div>

<div class="spLine"></div>

<table class="cartTable" width="100%">
    <thead align="left">
        <th><?php echo ShopCore::t('Фото') ?></th>
        <th><?php echo ShopCore::t('Название') ?></th>
        <th><?php echo ShopCore::t('Цена') ?></th>
        <th><?php echo ShopCore::t('Количество') ?></th>
        <th><?php echo ShopCore::t('Всего') ?></th>
    </thead>
    <tbody>
    <?php if(is_true_array($model->getSOrderProductss())){ foreach ($model->getSOrderProductss() as $item){ ?>
    <?php $total = $total + $item->getQuantity() * $item->toCurrency() ?>
    <?php $product = $item->getSProducts() ?>
        <tr>
            <td style="width:90px;padding:2px;">
                <div style="width:90px;height:90px;overflow:hidden;">
                <?php if($product->getMainImage()): ?>
                    <img src="<?php  echo productImageUrl ($product->getId() . '_main.jpg');  ?>" border="0" alt="image" width="90" />
                <?php endif; ?>
                </div>
            </td>
            <td>
                <a href="<?php  echo shop_url ('product/' . $product->getUrl());  ?>"><?php echo ShopCore::encode($product->getName()) ?></a> <?php $item->getVariantName() ?>
            </td>
            <td><?php echo $item->toCurrency() ?> <?php if(isset($CS)){ echo $CS; } ?></td>
            <td>
                 <?php echo $item->getQuantity() ?> шт.
            </td>
            <td><?php echo $item->getQuantity() * $item->toCurrency() ?> <?php if(isset($CS)){ echo $CS; } ?></td>
        </tr>
    <?php }} ?>
    </tbody>
    <tfoot>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tfoot>
</table>

<div id="total">
    <span class="value" id="totalPriceText">
        <?php echo $total + $model->getDeliveryPrice() ?> <?php if(isset($CS)){ echo $CS; } ?>
    </span>
    <span class="label">
        <?php echo ShopCore::t('Итог') ?>
    </span>
</div>

<div class="sp"></div>
<h5>Способы оплаты</h5>
<ul>
    <?php if(is_true_array($paymentMethods)){ foreach ($paymentMethods as $pm){ ?>
    <li>
        <label><b><?php echo encode($pm->getName()) ?></b></label>
        <p>
            <?php echo $pm->getDescription() ?>
            <?php echo $pm->getPaymentForm($model) ?>
        </p>
    </li>
    <?php }} ?>
</ul>

<?php $mabilis_ttl=1311066115; $mabilis_last_modified=1294492060; //Z:\home\kupontut.il\www\templates\commerce\shop\default/order_view.tpl ?>