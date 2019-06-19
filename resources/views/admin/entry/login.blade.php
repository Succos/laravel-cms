<html lang="zh-CN"><head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>账户登录 - </title>
    <link rel="stylesheet" href="/statics/admin/css/bootstrap.min.css?v=1.7.0">
    <link rel="stylesheet" href="/statics/admin/css/common.css?v=1.7.0">
    <script>var _csrf = "iOHMEsVy70yXyXkThi9PJMPR8C590Y398GFx43Hb9dK9drTaijB9M9xD2cpUqSM06_4IHgtPjUCZN-yQX4z5nQ==";</script>
    <script src="/statics/admin/js/jquery.min.js?v=1.7.0"></script>
    <script src="/statics/admin/js/popper.min.js?v=1.7.0"></script>
    <script src="/statics/admin/js/bootstrap.min.js?v=1.7.0"></script>
    <script src="/statics/admin/js/common.js?v=1.7.0"></script>
    <style id="tsbrowser_video_independent_player_style" type="text/css">                                                            [tsbrowser_force_max_size] {                                                   width: 100% !important;                                                      height: 100% !important;                                                     left: 0px !important;                                                        top: 0px !important;                                                         margin: 0px !important;                                                      padding: 0px !important;                                                   }                                                                            [tsbrowser_force_fixed] {                                                      position: fixed !important;                                                  z-index: 9999 !important;                                                    background: black !important;                                              }                                                                            [tsbrowser_force_hidden] {                                                     opacity: 0 !important;                                                       z-index: 0 !important;                                                     }                                                                            [tsbrowser_hide_scrollbar] {                                                   overflow: hidden !important;                                               }</style></head>
<body>
<style>
    html {
        position: relative;
        min-height: 100%;
        height: 100%;
    }

    body {
        padding-bottom: 70px;
        height: 100%;
        overflow: hidden;
    }

    .main {
        background-image: url("/web/statics/admin/images/passport-bg.jpg");
        background-size: cover;
        background-position: center;
        height: 100%;
    }

    form {
        max-width: 320px;
        margin: 0 auto;
    }

    form.card {
        border: none;
        background: rgba(255, 255, 255, .85);
        padding: 16px 10px;
    }

    form h1 {
        font-size: 20px;
        font-weight: normal;
        text-align: center;
        margin: 0 0 32px 0;
    }

    form .custom-checkbox .custom-control-indicator {
        border: 1px solid #ccc;
        background-color: #eee;
    }

    form .custom-control-input:checked ~ .custom-control-indicator {
        border-color: transparent;
    }

    .header {
        height: 50px;
        background: rgba(255, 255, 255, .5);
        margin-bottom: 120px;
    }

    .header a {
        display: inline-block;
        height: 50px;
        padding: 8px 30px;
    }

    .logo {
        display: inline-block;
        height: 100%;
    }

    .footer {
        position: absolute;
        height: 70px;
        background: #fff;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    .copyright {
        padding: 24px 0;
    }
</style>
<div class="main">
    <div class="header">
        <a href="/web">
            <img class="logo" src="https://www.ynruiw.com/web/uploads/image/17/17ee27ca84ac641e6df616cac281d72a.png">
        </a>
    </div>
    <form method="post" action="{{route('login-handle')}}" class="auto-submit-form card"
          return="http://www.gohosts.com/admin/users">
        <div class="card-body">
            <h1>登录管理后台</h1>
            <input class="form-control mb-3" name="username" placeholder="请输入用户名">
            <input class="form-control mb-3" name="password" placeholder="请输入密码" type="password">
            <div class="form-inline mb-3">
                    <input name="captcha"
                           placeholder="图片验证码"
                           class="form-control captcha_code {{ $errors->has('captcha') ? ' is-invalid' : '' }}" style="width: 150px;">
                    <img src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击刷新验证码" class="refresh-captcha" style="height: 33px; width: 80px; float: right; cursor: pointer;">
            </div>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">记住我，以后自动登录</span>
            </label>
            <button class="btn btn-block btn-primary submit-btn">登录</button>
        </div>
        <input name="_csrf" value="iOHMEsVy70yXyXkThi9PJMPR8C590Y398GFx43Hb9dK9drTaijB9M9xD2cpUqSM06_4IHgtPjUCZN-yQX4z5nQ==" type="hidden"></form>
</div>
<div class="footer">
    <div class="text-center copyright">©2017 <a href="http://www.yruiw.com">云南盈瑞电子商务有限公司</a></div>
</div>
</body>
</html>