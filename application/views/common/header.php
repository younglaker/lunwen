<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>论文库</title>
<meta content="width=device-width,initial-scale=1" name="viewport">
<link rel="stylesheet" href="<?php echo $css;?>/cssreset.css">
<link rel="stylesheet" href="<?php echo $css;?>/common.css">
</head>	
<body>

<!-- header -->
<div class="naver">
	<div class="container">
    	<div class="naver-brand">
        	<a href="./">论文库</a>
        </div>
        <div class="naver-sub">
        <?php if( !$uid ) { ?>
            <a href="<?php echo base_url();?>index.php/home/log">登录</a>
            <a href="<?php echo base_url();?>index.php/home/register">注册</a>
        <?php } else { ?>
            <a href="<?php echo base_url();?>index.php/home/homepage">个人中心</a>
            <a href="<?php echo base_url();?>index.php/home/logout">注销</a>
        <?php }?>
        </div>
    </div>
</div>
<!-- /header -->
