<div id="main">
	<div class="list-nav">
		<ul class="list-nav-classify">
			<li><a href="" class="act">搜索结果</a></li>
		</ul>
		<form class="search-block" action="">
			<input type="text" class="search-input-ctx" name="q" autocomplete="off" spellcheck="false" placeholder="搜索论文、作者">
			<button class="btn-search" type="submit">搜索</button>
		</form>
	</div>


	<table class="list-ctx-block">
		<tr>
			<th class="list-paper-num">序号</th>
			<th class="list-paper-serial">编号</th>
			<th class="list-paper-title">题名</th>
			<th class="list-paper-author">作者</th>
			<th class="list-paper-download">下载</th>
		</tr>

		<?php  foreach ($lister as $key => $value)
		 {	
		?>
		<tr>
			<td class="list-paper-num"><?= $value['id'];?></td>
			<td class="list-paper-serial"><?= $value['publisher_id'];?></td>
			<td class="list-paper-title"><a href=""><?= $value['title'];?></a></td>
			<td class="list-paper-author"><?= $value['author'];?></td>
			<td class="list-paper-download"><a href=""></a></td>
		</tr>
		<?php }; ?>
	</table>

	<div class="pager-block">
		<ul class="pager">
			<?php 
                if(!empty($lister)) {
                    if($current > 1) {?> 
                    <li><a href="<?php echo base_url();?>index.php/home/lister/<?php echo $current - 1;?>">上一页</a></li>
                <?php } ?>
                <?php for($i = 1; $i <= $lister[0]['total']; $i++) {?>
                    <li><a href="<?php echo base_url();?>index.php/home/lister/<?php echo $i;?>" <?php if($i == $current) {?>class="act"<?php }?> > <?php echo $i;?></a></li>
                <?php }?>
                <?php if($current < $lister[0]['total']) {?> 
                    <li><a href="<?php echo base_url();?>index.php/home/lister/<?php echo $current + 1;?>">下一页</a></li>
                <?php 
                }
            } 
            ?>
		</ul>
	</div>
</div>