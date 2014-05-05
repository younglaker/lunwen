<div id="main">
	<div class="list-nav">
		<ul class="list-nav-classify">
			<li><a href="">论文管理</a></li>
			<li><a href="" class="act">用户管理</a></li>
			<li><a href="">审批论文</a></li>
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

		<?php for($n=1;$n!=5;$n=$n+2): ?>
		<tr>
			<td class="ctx-center"><?php echo $n; ?></td>
			<td class="">王小二</td>
			<td>普通用户</td>
			<td class="">
				<a href="">设为管理员</a>
				<a href="">删除</a>
			</td>
		</tr>
		<tr>
			<td class="ctx-center"><?php echo $n+1; ?></td>
			<td class="">张三</td>
			<td>管理员</td>
			<td class="">
				<a href="">取消管理员</a>
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