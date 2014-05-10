<div id="main">
	<div class="list-nav">
		<ul class="list-nav-classify">
        <li><a href="<?php echo base_url() ?>index.php/home/lister" <?php if($location == 'all') { ?> class="act" <?php }?>>全部</a></li>
            <li><a href="<?php echo base_url() ?>index.php/home/lister/university" <?php if($location == 'university') { ?> class="act" <?php }?>>学校</a></li>
			<li><a href="<?php echo base_url() ?>index.php/home/lister/specialty" <?php if($location == 'specialty') { ?> class="act" <?php }?>>专业</a></li>
			<li><a href="<?php echo base_url() ?>index.php/home/lister/research" <?php if($location == 'research') { ?> class="act" <?php }?>>研究方向</a></li>
		</ul>
        <form class="search-block" action="<?php echo base_url()?>index.php/home/search" method="get">
                    <input type="text" class="search-input-ctx" name="q" autocomplete="off" spellcheck="false" placeholder="搜索论文、作者">
                    <button class="btn-search" type="submit">搜索</button>
        </form>
	</div>

    <div class="list-classify-block">
        
        <?php 
            if($item) {
            foreach ($item as $key => $value) {
        ?>
            <a href="<?php echo base_url();?>index.php/home/lister/<?=$location?>/<?=$value[$location]?>"><?= $value[$location]?></a></li>
        <?php 
        }}; ?> 
    </div>

	<table class="list-ctx-block">
		<tr>
			<th class="list-paper-num">序号</th>
			<th class="list-paper-serial">编号</th>
			<th class="list-paper-title">题名</th>
			<th class="list-paper-author">作者</th>
			<th class="list-paper-download">下载</th>
		</tr>

		<?php $i = 1; foreach ($lister as $key => $value)
		 {
			
		?>
		<tr>
            <td class="list-paper-num"><?= $i;?></td>
			<td class="list-paper-serial"><?= $value['number'];?></td>
            <td class="list-paper-title"><a href="<?= base_url()?>index.php/home/paper/<?= $value['id'];?>"><?= $value['title'];?></a></td>
			<td class="list-paper-author"><a href="<?= base_url() .'index.php/home/search?q='.$value['name'];?>"><?= $value['name'];?></a></td>
            <td class="list-paper-download"><a href="<?= base_url() . $value['attachment'];?>"></a></td>
		</tr>
		<?php $i++; }; ?>
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
