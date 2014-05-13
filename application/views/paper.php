<div id="main">
	<div class="list-nav">
		<ul class="list-nav-classify">
			<!-- <li><a href="">全部</a></li> -->
			<li><a href="" class="act">论文详情</a></li>
<!-- 			<li><a href="">专业</a></li>
			<li><a href="">研究方向</a></li> -->
		</ul>
        <form class="search-block" action="<?php echo base_url()?>index.php/home/search" method="get">
            <input type="text" class="search-input-ctx" name="q" autocomplete="off" spellcheck="false" placeholder="搜索论文、作者">
            <button class="btn-search" type="submit">搜索</button>
        </form>
	</div>

	<div class="paper-block">
		<?php if (count($paper) === 0): ?>
			<h1 class="paper-title">论文不存在或者暂未通过审核</h1>
		<?php else: ?>
			<h1 class="paper-title"><?php echo $paper[0]['title']; ?></h1>
			<p class="paper-deal">
                <a href="<?= base_url() . $paper[0]['attachment'];?>">下载</a>
                <a href="<?php echo base_url();?>index.php/api/collection/<?php echo $paper[0]['id'];?>">收藏</a>
				<!-- 登录显示修改状态 -->
				<?php if ($uid !== FALSE): ?>
                    <a href="<?php echo base_url();?>index.php/admin/edit/<?php echo $paper[0]['id'];?>">修改</a>
				<?php endif ?>
			</p>
			<dl class="paper-info">
				<dt>编号：</dt>
				<dd><?php echo $paper[0]['number']; ?></dd>
				<dt>作者：</dt>
				<dd><?php echo $paper[0]['author']; ?></dd>
				<dt>导师：</dt>
				<dd><?php echo $paper[0]['leader']; ?></dd>
				<dt>学校：</dt>
				<dd><?php echo $paper[0]['university']; ?></dd>
				<dt>院系：</dt>
				<dd><?php echo $paper[0]['college']; ?></dd>
				<dt>专业：</dt>
				<dd><?php echo $paper[0]['specialty']; ?></dd>
				<dt>研究方向：</dt>
				<dd><?php echo $paper[0]['research']; ?></dd>
				<dt>发布时间：</dt>
				<dd><?php echo date("Y-m-d",strtotime($paper[0]['time'])); ?></dd>
			</dl>
			<h2 class="paper-sub-title">关键词：</h2>
			<div class="paper-keywords">低气压； 辉光放电； 等离子体； 电子密度； 数值模拟；</div>
			<h2 class="paper-sub-title">论文摘要：</h2>
			<div class="paper-intro"> <?php echo $paper[0]['summary']; ?> </div>			
		<?php endif ?>
	</div>
</div>
