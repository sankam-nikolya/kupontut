<div class="saPageHeader" style="float:left;width:100%;position:relative;">
    <h2 style="float:left;">Поиск</h2>

    <div style="float:left;clear:right;margin-top:9px;margin-left:48px">
        <a href="#" onclick="toggleShopSearchBox(); return false;">Изменить параметры &darr;</a>
    </div>

    <div id="shopTopSearchForm"> <!-- begin form block -->
        <form method="get" action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>search/index"  style="width:100%">
        <input type="hidden" name="s" value="1"> 
            <div class="form_text">Категория:</div>
            <div class="form_input">
                <select name="CategoryId" style="width:285px;" onChange="shopLoadProperiesByCategoryInSearch(this);">
                    <option value="">- Все -</option>
                    <?php if(is_true_array($categories)){ foreach ($categories as $category){ ?>
                    <?php if(isset(ShopCore::$_GET['CategoryId']) && ShopCore::$_GET['CategoryId'] == $category->getId()): ?>
                        <?php $selected='selected="selected"' ?>
                    <?php else: ?>
                        <?php $selected = '' ?>
                    <?php endif; ?>
                        <option <?php if(isset($selected)){ echo $selected; } ?> value="<?php echo $category->getId() ?>"><?php  echo str_repeat ('-',$category->getLevel());  ?> <?php echo ShopCore::encode($category->getName()) ?></option>
                    <?php }} ?>
                </select>
            </div>
            <div class="form_overflow"></div>

            <div class="form_text"></div>
            <div class="form_input">
                <input type="text" name="text" value="<?php echo encode(ShopCore::$_GET['text']) ?>" class="textbox_long" />
                <div class="lite">Укажите название или артикул</div>
            </div>
            <div class="form_overflow"></div>

            <div class="form_text"></div>
            <div class="form_input">
                <select name="Active" style="margin-left: 100px">
                    <option value="">-</option>
                    <option <?php if(ShopCore::$_GET['Active'] == 'true'): ?> selected="selected" <?php endif; ?> value="true">Активен</option>
                    <option <?php if(ShopCore::$_GET['Active'] == 'false'): ?> selected="selected" <?php endif; ?> value="false">Неактивен</option>
                </select>

                <select name="Hit">
                    <option value="">-</option>
                    <option <?php if(ShopCore::$_GET['Hit'] == 'true'): ?> selected="selected" <?php endif; ?> value="true">Хит</option>
                    <option <?php if(ShopCore::$_GET['Hit'] == 'false'): ?> selected="selected" <?php endif; ?> value="false">Не хит</option>
                </select>
				
		<select name="Hot">
                    <option value="">-</option>
                    <option <?php if(ShopCore::$_GET['Hot'] == 'true'): ?> selected="selected" <?php endif; ?> value="true">Новинка</option>
                    <option <?php if(ShopCore::$_GET['Hot'] == 'false'): ?> selected="selected" <?php endif; ?> value="false">Не новинка</option>
                </select>
				
		<select name="Action">
                    <option value="">-</option>
                    <option <?php if(ShopCore::$_GET['Action'] == 'true'): ?> selected="selected" <?php endif; ?> value="true">Акция</option>
                    <option <?php if(ShopCore::$_GET['Action'] == 'false'): ?> selected="selected" <?php endif; ?> value="false">Не акция</option>
                </select>
            </div>
            <div class="form_overflow"></div>

            <div id="productPropertiesContainer"><?php if(isset($fieldsForm)){ echo $fieldsForm; } ?></div>

            <div class="form_text"></div>
            <div class="form_input">
                <input type="submit" id="footerButton" name="_startSearch" value="Начать поиск" class="active"  onClick="ajaxShopForm(this,'shopAdminPage');" />
            </div>
            <div class="form_overflow"></div>
        </form>
    </div> <!-- end form block -->
</div>
<style type="text/css">
#shopTopSearchForm { 
    background-color:#fff;
    width:500px;
    margin-left:100px;
    margin-top:35px;
    z-index:99999;
    position:absolute;
    border:1px solid silver;
    clear:both;
    display:none;
 }
</style>

<script type="text/javascript">
function toggleShopSearchBox()
{ 
    if($('shopTopSearchForm').getStyle('display') == 'none')
    { 
        $('shopTopSearchForm').setStyle('display','block');
     }else{ 
        $('shopTopSearchForm').setStyle('display','none');
     }
 }
</script>
<?php $mabilis_ttl=1311160188; $mabilis_last_modified=1307635392; //Z:\home\kupontut.il\www\/application/modules/shop/admin\templates\search\form.tpl ?>