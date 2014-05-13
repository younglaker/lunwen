<div id="main">
    <form action="<?php echo base_url()?>index.php/api/modifypsw" id="modify-form" class="log-reg-form" method="post">
        <p>
            <label for="modify-psw-old">旧密码</label>
            <input type="password" class="input-txt" id="modify-psw-old" name="modify-psw-old">
        </p>
        <p>
            <label for="modify-psw-new">新密码</label>
            <input type="password" class="input-txt" id="modify-psw-new" name="modify-psw-new">
        </p>
        <p>
            <label for="modify-psw-conf">确认密码</label> 
            <input type="password" class="input-txt" id="modify-psw-conf" name="modify-psw-conf">
        </p>
        <p>
            <input type="submit" class="submit" value="提交">
        </p>
    </form>
</div>
