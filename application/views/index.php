<div id="main">
	<div class="ctx-center">
		<img src="<?php echo $img;?>/title.png" alt="">
        <form id="search-form-index" action="<?php echo base_url()?>index.php/home/search" method="get">
			<select name="search-classify" id="search-classify">
				<option value="标题">标题</option>
				<option value="作者">作者</option>
				<!-- <option value="编号">编号</option>
				<option value="导师">导师</option> -->
			</select>
			<input type="text" name="q" id="search-ctx">
			<input type="submit" id="search-btn" value="搜索" >
			<a href="<?php echo base_url('index.php/home/lister')?>"> >>随便看看</a>
		</form>
	</div>
	<div class="recommend-block">
		<ul class="recommend-list">
			<h2><span>最新论文</span></h2>
			<?php 
				$count = count($newpaper);
				for($n=0;$n < $count;$n++): ?>
			<li><a href="<?php echo base_url('index.php/home/paper\/').$newpaper[$n]['id']; ?>"><?php echo $newpaper[$n]['title']; ?></a></li>
			<?php endfor; ?>
		</ul>

		<ul class="recommend-list">
			<h2><span>最热论文</span></h2>
			<?php 
				$count = count($hotpaper);
				for($n=0;$n < $count;$n++): ?>
			<li><a href="<?php echo base_url('index.php/home/paper\/').$hotpaper[$n]['id']; ?>"><?php echo $hotpaper[$n]['title']; ?></a></li>
			<?php endfor; ?>
		</ul>
	</div>
</div>
