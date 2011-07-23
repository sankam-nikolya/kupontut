<div id="titleExt"><h5>{widget('path')}<span class="ext">{$category.name}</span></h5></div>
{$category.short_desc}
{if $no_pages}
        <p>{$no_pages}</p>
{/if}
<div class="action_list">
{foreach $pages as $page}
	<div class="kupon">
		<div class="tlw"></div>
		<div class="trw"></div>
		<div class="img"><img src="images/1.jpg" alt="" /></div>
		<div class="sale"><span>скидка</span><big>75</big><small>%</small></div>
		<div class="c">
			<a href="{site_url($page.full_url)}">{$page.title}</a>
			<p>Уже куплено<br /><strong>2</strong> купона</p>
			<p>Цена купона<br /><strong>5 500 руб. </strong></p>
		</div>
		<div class="b"></div>
	</div>
	<li><a href=""></a></li>
{/foreach}
</div>
<div class="pagination" align="center">
    {$pagination}
</div>
