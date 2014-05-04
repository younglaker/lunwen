<div id="main">
	<div class="list-nav">
		<ul class="list-nav-classify">
			<li><a href="">全部</a></li>
			<li><a href="" class="act">学校</a></li>
			<li><a href="">专业</a></li>
			<li><a href="">研究方向</a></li>
		</ul>
		<form class="search-block" action="">
            <input type="text" class="search-input-ctx" name="q" autocomplete="off" spellcheck="false" placeholder="搜索论文、作者">
            <button class="btn-search" type="submit">搜索</button>
        </form>
	</div>

	<div class="list-classify-block">
		<?php for($n=0;$n!=8;$n++): ?>
		<a href="">D.等离子物理运用</a></li>
		<?php endfor; ?>
	</div>

	<!-- <div class="list-ctx-block"> -->
		<table class="list-ctx-block">
			<tr>
				<th class="list-paper-num">序号</th>
				<th class="list-paper-serial">编号</th>
				<th class="list-paper-title">题名</th>
				<th class="list-paper-author">作者</th>
				<th class="list-paper-download">下载</th>
			</tr>

			<?php for($n=1;$n!=8;$n++): ?>
			<tr>
				<td class="list-paper-num"><?php echo $n; ?></td>
				<td class="list-paper-serial">I980.110</td>
				<td class="list-paper-title"><a href="">前端性能优化（Application Cache篇</a></td>
				<td class="list-paper-author">王小二</td>
				<td class="list-paper-download"><a href=""></a></td>
			</tr>
			<?php endfor; ?>
		</table>
	<!-- </div> -->

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