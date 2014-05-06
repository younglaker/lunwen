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

		<?php for($n=1;$n!=8;$n++): ?>
		<tr>
			<td class="list-paper-num"><?php echo $n; ?></td>
			<td class="list-paper-serial">I980.110</td>
			<td class="list-paper-title"><a href="">前端性能优化（Application Cache篇</a></td>
			<td class="list-paper-author">王小二</td>
			<td class="list-paper-deal">
				<a href="">发布</a>
				<a href="">删除</a>
			</td>
		</tr>
		<?php endfor; ?>
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
