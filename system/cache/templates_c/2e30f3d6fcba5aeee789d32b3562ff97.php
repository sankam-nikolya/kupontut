<?php $this->include_tpl('shop/default/sidebar', 'Z:\home\kupontut.il\www\templates\commerce'); ?>

<div class="products_list">

    <div id="titleExt">
        <h5 class="left"><?php  echo encode( $page['title'] )  ?></h5>
        <div class="right"></div>
        <div class="sp"></div>
    </div>

    <?php  echo $page['full_text'];  ?>

    <p>
        <a href="javascript:history.back(-1);"><?php  echo lang ('history_back');  ?></a>
    </p>
</div>
<?php $mabilis_ttl=1311066216; $mabilis_last_modified=1306159638; //Z:\home\kupontut.il\www\/templates/commerce/page_full.tpl ?>