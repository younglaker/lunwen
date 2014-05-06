<div id="main">
	<div class="list-nav">
		<ul class="list-nav-classify">
			<li><a href="<?php echo base_url();?>index.php/admin/paper">论文管理</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/users" class="act">用户管理</a></li>
			<li><a href="<?php echo base_url();?>index.php/admin/approval">审批论文</a></li>
		</ul>
		<form class="search-block" action="">
            <input type="text" class="search-input-ctx" name="q" autocomplete="off" spellcheck="false" placeholder="搜索论文、作者">
            <button class="btn-search" type="submit">搜索</button>
        </form>
	</div>

	<table class="list-ctx-block">
		<tr>
			<th class="ctx-center">序号</th>
			<th class="">用户名</th>
			<th>权限</th>
			<th class="">操作</th>
		</tr>

		<?php $i = 1; foreach( $userlist as $key => $value ): {?>
		<tr>
			<td class="ctx-center"><?php echo $i; ?></td>
            <td class=""><?php echo $value['name'];?></td>
            <?php if( $value['role'] < 1 ) {?>
                <td>普通用户</td>
                <td class="">
                <a href="<?php echo base_url();?>index.php/api/setrole/<?php echo $value['id'];?>/1">设为管理员</a>
                    <a href="<?php echo base_url();?>index.php/api/userdelete/<?php echo $value['id'];?>">删除</a>
                </td>
            <?php } else {?>
                <td>管理员</td>
                <td class="">
                <a href="<?php echo base_url();?>index.php/api/setrole/<?php echo $value['id'];?>/0">取消管理员</a>
                    <a href="<?php echo base_url();?>index.php/api/userdelete/<?php echo $value['id'];?>">删除</a>
                </td>
            <?php }?>
		</tr>
        <?php $i++ ?> 
		<?php } endforeach; ?>
	</table>

	<div class="pager-block">
		<ul class="pager">
			<li><a href="">上一页</a></li>
			<li><a href="" class="act">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">4</a></li>
			<li><a href="">5</a></li>
			<li><a href="">下一页</a></li>
		</ul>
	</div>
</div>
