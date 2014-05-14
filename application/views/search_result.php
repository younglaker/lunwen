<div id="main">
	<div class="list-nav">
		<ul class="list-nav-classify">
			<li><a href="" class="act">搜索结果</a></li>
		</ul>
        <form class="search-block" action="<?php echo base_url()?>index.php/home/search" method="get">
			<input type="text" class="search-input-ctx" name="q" autocomplete="off" spellcheck="false" placeholder="搜索论文、作者、导师、学校">
			<button class="btn-search" type="submit">搜索</button>
		</form>
	</div>


	<table class="list-ctx-block">
		<tr>
			<th class="list-paper-num">序号</th>
			<th class="list-paper-serial">编号</th>
			<th class="list-paper-title">题名</th>
			<th class="list-paper-author">作者</th>
			<th class="list-paper-leader">导师</th>
			<th class="list-paper-download">下载</th>
		</tr>
        <?php 
        if($search) {
            $i = 1; foreach ($search as $key => $value)
		    {
		?>
		<tr>
            <td class="list-paper-num"><?= $i;?></td>
			<td class="list-paper-serial"><?= $value['number'];?></td>
            <td class="list-paper-title"><a href="<?= base_url()?>index.php/home/paper/<?= $value['id'];?>"><?= $value['title'];?></a></td>
			<td class="list-paper-author"><a href="<?= base_url() .'index.php/home/search?q='.$value['author'];?>"><?= $value['author'];?></a></td>
			<td class="list-paper-leader"><a href="<?= base_url() .'index.php/home/search?q='.$value['leader'];?>"><?= $value['leader'];?></a></td>
            <td class="list-paper-download"><a href="<?= base_url()  . $value['attachment'];?>"></a></td>
		</tr>
		<?php $i++; }}; ?>
    </table>

</div>
