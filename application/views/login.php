<div id="main">
<form action="<?php echo base_url();?>index.php/api/login" id="login-form" class="log-reg-form" method="post">
		<p>
			<label for="login-name">用户名</label>
			<input type="text" class="input-txt" id="login-name" name="username">
		</p>
		<p>
			<label for="login-psw">密码</label>
			<input type="password" class="input-txt" id="login-psw" name="password">
		</p>
		<p>
			<input type="submit" class="submit" value="登录">
		</p>
	</form>
</div>
