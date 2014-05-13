<div id="main">
    <form action="<?php echo base_url()?>index.php/api/register" id="regist-form" class="log-reg-form" method="post">
        <p>
            <label for="regist-name">用户名</label>
            <input type="text" class="input-txt" id="regist-name" name="username">
        </p>
        <p>
            <label for="regist-psw">密码</label>
            <input type="password" class="input-txt" id="regist-psw" name="password">
        </p>
        <p>
            <label for="regist-psw-rp">确认密码</label>
            <input type="password" class="input-txt" id="regist-psw-rp" name="passconf">
        </p>
        <p>
            <input type="submit" class="submit" value="注册">
        </p>
    </form>
</div>
