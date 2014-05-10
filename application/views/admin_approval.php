<div id="main">
	<div class="list-nav">
        <ul class="list-nav-classify">
            <li><a href="<?php echo base_url();?>index.php/admin/paper">论文管理</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/users">用户管理</a></li>
			<li><a href="<?php echo base_url();?>index.php/admin/approval" class="act">审批论文</a></li>
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
			<th class="list-paper-download">操作</th>
		</tr>
        <?php $i = 1; foreach( $paperlist as $key => $value ): {?>
		<tr>
			<td class="list-paper-num"><?php echo $i; ?></td>
            <td class="list-paper-serial"><?php echo $value['number'];?></td>
            <td class="list-paper-title"><a href="<?php echo base_url().'/'.$value['attachment'];?>"><?php echo $value['title'];?></a></td>
            <td class="list-paper-author"><?php echo $value['name']; ?></td>
			<td class="list-paper-deal">
                <a href="<?php echo base_url();?>index.php/admin/edit/<?php echo $value['id'];?>/1">发布</a>
                <a href="<?php echo base_url();?>index.php/api/paperdelete/<?php echo $value['id'];?>">删除</a>
			</td>
		</tr>
        <?php $i++ ?> 
		<?php } endforeach; ?>
    </table>

	<div class="pager-block">
    <ul class="pager">
            <?php
                if(!empty($paperlist)) {
                    if($current > 1) {?> 
                        <li><a href="<?php echo base_url();?>index.php/admin/approval/<?php echo $current - 1;?>">上一页</a></li>
                    <?php } ?>
                    <?php for($i = 1; $i <= $paperlist[0]['total']; $i++) {?>
                        <li><a href="<?php echo base_url();?>index.php/admin/approval/<?php echo $i;?>" <?php if($i == $current) {?>class="act"<?php }?> > <?php echo $i;?></a></li>
                    <?php }?>
                    <?php if($current < $paperlist[0]['total']) {?> 
                        <li><a href="<?php echo base_url();?>index.php/admin/approval/<?php echo $current + 1;?>">下一页</a></li>
                    <?php } 
                }
            ?>
		</ul>
	</div>
</div>
