<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"E:\xampp\htdocs\BaiPiao-PHP\public/../application/index\view\index\index.html";i:1562807312;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/all.css">
    <link rel="stylesheet" href="static/css/index.css">
    <title>baipiao</title>
</head>

<body>
    <div class="ui_body">
        <div class="container col-md-6 login_card">
            <div class="card">
                <div class="card-header">管理员登陆</div>
                <div class="card-body">

                    <form method="POST" action="<?php echo url('index/Index/home'); ?>">
                        <div class="form-group">
                            <label for="usr">用户名:</label>
                            <input type="text" class="form-control" id="rootusr" name="rootusr">
                        </div>
                        <div class="form-group">
                            <label for="pwd">密码:</label>
                            <input type="password" class="form-control" id="rootpwd" name="rootpwd">
                        </div>
                        <button class="btn" id="rootsub">登录</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="static/js/jquery-3.4.1.min.js"></script>
    <script src="static/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="static/js/index.js"></script>
</body>

</html>