<div id="main">
	<p class="mrg-top-10"><a href="" class="a-btn-lg">上传新论文</a></p>

	<h2 class="mrg-top-20">我的收藏</h2>
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
				<a href="">取消收藏</a>
			</td>
		</tr>
		<?php endfor; ?>
	</table>

	<h2 class="mrg-top-20">我的上传</h2>
	<table class="list-ctx-block">
		<tr>
			<th class="list-paper-num">序号</th>
			<th class="list-paper-serial">编号</th>
			<th class="list-paper-title">题名</th>
			<th class="list-paper-author">状态</th>
			<th class="list-paper-download">操作</th>
		</tr>

		<?php for($n=1;$n!=8;$n++): ?>
		<tr>
			<td class="list-paper-num"><?php echo $n; ?></td>
			<td class="list-paper-serial">I980.110(没发布为无)</td>
			<td class="list-paper-title"><a href="">前端性能优化（Application Cache篇</a></td>
			<td class="list-paper-author">审核中（审核不通过/已发布）</td>
			<td class="list-paper-deal">
				<a href="">编辑</a>
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