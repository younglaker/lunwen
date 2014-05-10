<div id="main">
	<p class="mrg-top-10"><a href="<?php echo base_url();?>index.php/admin/upload" class="a-btn-lg">上传新论文</a></p>

	<h2 class="mrg-top-20">我的收藏</h2>
	<table class="list-ctx-block">
		<tr>
			<th class="list-paper-num">序号</th>
			<th class="list-paper-serial">编号</th>
			<th class="list-paper-title">题名</th>
			<th class="list-paper-author">作者</th>
			<th class="list-paper-download">操作</th>
		</tr>

		<?php foreach ($selfCollect as $key => $value) { ?>
		<tr>
			<td class="list-paper-num"><?= $value['id'];?></td>
			<td class="list-paper-serial"><?= $value['number'];?></td>
			<td class="list-paper-title"><a href=""><?= $value['author'];?></a></td>
			<td class="list-paper-author"><?= $value['id'];?></td>
			<td class="list-paper-deal">
				<a href="">取消收藏</a>
			</td>
		</tr>
		<?php }; ?>
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

		<?php foreach ($selfPublish as $key => $value) {
			# code...
		 ?>
		<tr>
			<td class="list-paper-num"><?= $value['id'];?></td>
			<td class="list-paper-serial"><?= $value['number'];?></td>
			<td class="list-paper-title"><a href=""><?= $value['title'];?></a></td>
			<td class="list-paper-author">
			<?php switch ($value['status']) {
				case '0':
					echo '审核中';
					break;
				
				case '1':
					echo '已发布';
					break;
			} ?>
			</td>
			<td class="list-paper-deal">
				<a href="">编辑</a>
				<a href="">删除</a>
			</td>
		</tr>
		<?php }; ?>
	</table>

	<!-- <div class="pager-block">
		<ul class="pager">
			<li><a href="">上一页</a></li>
			<li><a href="" class="act">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">4</a></li>
			<li><a href="">5</a></li>
			<li><a href="">下一页</a></li>
		</ul>
	</div> -->
</div>