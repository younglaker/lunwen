<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>学位论管理系统</title>
<meta content="width=device-width,initial-scale=1" name="viewport">
<link rel="stylesheet" href="<?php echo $css;?>/cssreset.css">
<link rel="stylesheet" href="<?php echo $css;?>/common.css">
</head>	
<body>

<!-- header -->
<div class="naver">
	<div class="container">
    	<div class="naver-brand">
        	<a href="<?php echo base_url(); ?>">学位论管理系统</a>
        </div>
        <div class="naver-sub">
        <?php if( !$uid ) { ?>
            <a href="<?php echo base_url();?>index.php/home/log">登录</a>
            <a href="<?php echo base_url();?>index.php/home/register">注册</a>
        <?php } else { ?>
            <a href="<?php echo base_url();?>index.php/home/homepage">个人中心</a>
            <?php if( $role > 1 ) { ?>
                <a href="<?php echo base_url();?>index.php/admin/paper">后台中心</a>
            <?php }?>
            <a href="<?php echo base_url();?>index.php/home/logout">注销</a>
        <?php }?>
        </div>
    </div>
</div>
<!-- /header -->
