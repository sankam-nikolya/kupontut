<?php include ('Z:\home\kupontut.il\www\application\libraries\mabilis/functions/func.truncate.php');  ?><div id="sortable">
		  <table id="pages_table" >
		  	<thead>
                <th width="5px">ID</th>
				<th>Заголовок</th>
				<th>Страниц</th>
				<th>URL</th>
				<th></th>
			</thead>
			<tbody>
		<?php if(is_true_array($tree)){ foreach ($tree as $item){ ?>
		<tr id="<?php  echo $item['number'];  ?>">
			<td class=""><?php  echo $item['id'];  ?></td>
			<td onclick="edit_category(<?php  echo $item['id'];  ?>); return false;">
            <?php if($item['parent_id']  == "0"): ?>
            <b><?php  echo func_truncate ( $item['name'] , 100);  ?></b>
            <?php else: ?>
                |<?php for($i=0;$i<= $item['level'] ;$i++){?>
                    -
                <?php } ?>
                    <?php  echo func_truncate ( $item['name'] , 100);  ?>
            <?php endif; ?>
            </td>
            <td><?php  echo $item['pages'];  ?></td>
			<td><a href="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?><?php  echo $item['path_url'];  ?>" target="_blank"><?php  echo func_truncate ( $item['url'] , 75);  ?></a></td>
			<td  class="rightAlign">
        	<img onclick="confirm_delete_cat('<?php  echo str_replace (array("'",'"'), '',  $item['name'] );  ?>', <?php  echo $item['id'];  ?> );" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete_page.png"  style="cursor:pointer" width="16" height="16" title="Удалить" />
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
                </tr>
			</tfoot>
		  </table>
</div>
		<script type="text/javascript">
			window.addEvent('domready', function(){ 
				pages_table = new sortableTable('pages_table', { overCls: 'over', sortOn: -1 ,onClick: function(){  } });
                pages_table.altRow();
			 });
        </script>

<?php $mabilis_ttl=1311075390; $mabilis_last_modified=1263995964; //Z:\home\kupontut.il\www\/templates/administrator/category_list.tpl ?>