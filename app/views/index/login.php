<?php
    require_once 'head.php';
?>
<link rel="stylesheet" href="/static/css/login.css">
<body>
<div class="container">
    <div class="form row">
        <div class="form-horizontal col-md-offset-3" id="login_form">
            <h3 class="form-title">LOGIN</h3>
            <div class="col-md-9">
                <div class="form-group">
                    <i class="fa fa-user fa-lg"></i>
                    <input class="form-control required" type="text" placeholder="Username" id="username" name="username" autofocus="autofocus" maxlength="20" value="sujianhui"/>
                </div>
                <div class="form-group">
                    <i class="fa fa-lock fa-lg"></i>
                    <input class="form-control required" type="password" placeholder="Password" id="password" name="password" maxlength="8" value="sujianhui"/>
                </div>
                <div class="form-group">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="1"/>记住我
                    </label>
                </div>
                <div class="form-group col-md-offset-9">
                    <button type="submit" class="btn btn-success pull-right" name="submit">登录</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        document.title = '登录';
        let btn = $('.btn');
        btn.on('click',function(){
            //获取用户名
            let username = $('#username').val();
            //获取密码
            let password = $('#password').val();
            if(username === ''){
                alert('用户名不能为空!');
            }else if(password === ''){
                alert('密码不能为空!');
            }
            $.ajax(
                {
                    type: "post",
                    url: "loginDo",
                    data: {"username": username},
                    dataType: "JSON",
                    success: function(data){
                        alert('success!');
                    }

                });
        });

    });
</script>


