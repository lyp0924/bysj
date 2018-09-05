<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/data/www/default/bysj/public/../application/index/view/users/login.html";i:1525601497;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>-->
    <link href="/static/admin/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/static/admin/assets/css/font-awesome.min.css"/>
    <!--[if IE 7]>
    <link rel="stylesheet" href="/static/admin/assets/css/font-awesome-ie7.min.css"/>
    <![endif]-->
    <link rel="stylesheet" href="/static/admin/assets/css/ace.min.css"/>
    <link rel="stylesheet" href="/static/admin/assets/css/ace-rtl.min.css"/>
    <link rel="stylesheet" href="/static/admin/assets/css/ace-skins.min.css"/>
    <link rel="stylesheet" href="/static/admin/css/style.css"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/static/admin/assets/css/ace-ie.min.css"/>
    <![endif]-->
    <script src="/static/admin/assets/js/ace-extra.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/static/admin/assets/js/html5shiv.js"></script>
    <script src="/static/admin/assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="/static/admin/js/jquery-1.9.1.min.js"></script>
    <script src="/static/admin/assets/layer/layer.js" type="text/javascript"></script>
    <script type="text/javascript" src="/static/admin/js/H-ui.js"></script>
    <script type="text/javascript" src="/static/admin/js/H-ui.admin.js"></script>
    <script src="/static/js/jquery.md5.js"></script>
    <title>登陆</title>
</head>

<body class="login-layout Reg_log_style">
<div class="logintop">
    <span>欢迎后台管理界面平台</span>
    <ul>
        <li><a href="/index.php/index">返回首页</a></li>
    </ul>
</div>
<div class="loginbody">
    <div class="login-container">
        <div class="center">
            <img style="width:800px;" src="/static/admin/images/logo1.png"/>
        </div>

        <div class="space-6"></div>

        <div class="position-relative">
            <div id="login-box" class="login-box widget-box no-border visible" >
                <div class="widget-body" >
                    <div class="widget-main">
                        <h4 class="header blue lighter bigger">
                            <i class="icon-coffee green"></i>
                            登陆
                        </h4>

                        <div class="login_icon"><img src="/static/admin/images/login.png"/></div>

                        <form class="">
                            <fieldset>
                                <ul>
                                    <li class="frame_style form_error"><label class="user_icon"></label><input
                                            name="用户名" type="text" id="username"/><i>用户名：admin</i></li>
                                    <li class="frame_style form_error"><label class="password_icon"></label><input
                                            name="密码" type="password" id="userpwd"/><i>密码：admin</i></li>
                                    <li class="frame_style form_error"><label class="Codes_icon"></label><input
                                            name="验证码" type="text" id="Codes_text"/><i>验证码</i>
                                    </li>
                                    <li style="border:1px #CCC solid;height:50px;width:150px;">
                                        <div class="Codes_region">
                                            <img style="" id="code_png"
                                                 src="/index.php/index/getCaptcha/0.html" width="100%" height="100%" alt="点击刷新"/>
                                            <!--margin-top: 0px;padding-top: 0px;vertical-align: top;-->
                                        </div>
                                    </li>
                                </ul>
                                <div class="space"></div>

                                <div class="clearfix">
                                    <label class="inline">
                                        <span class="lbl"><a href="javascript:void(0)" onclick="member_edit('申请加入','/index.php/index/applyToJoin.html',4,'540','580')">申请加入</a></span>
                                    </label>

                                    <button type="button" class="width-35 pull-right btn btn-sm btn-primary"
                                            id="login_btn">
                                        <i class="icon-key"></i>
                                        登陆
                                    </button>
                                </div>

                                <div class="space-4"></div>
                            </fieldset>
                        </form>

                        <div class="social-or-login center">
                            <span class="bigger-110"></span>
                        </div>

                        <div class="social-login center">
                            毕设项目，勿作他用！
                        </div>
                    </div><!-- /widget-main -->

                    <div class="toolbar clearfix">


                    </div>
                </div><!-- /widget-body -->
            </div><!-- /login-box -->
        </div><!-- /position-relative -->
    </div>
</div>
<div class="loginbm">中北大学2018毕业设计<a href="javascript:void(0)">本项目仅用于毕业设计，勿作他用！</a></div>
<strong></strong>
</body>
</html>
<script>
    $('#login_btn').on('click', function () {
        var num = 0;
        var str = "";
        $("input[type$='text'],input[type$='password']").each(function (n) {
            if ($(this).val() == "") {

                layer.alert(str += "" + $(this).attr("name") + "不能为空！\r\n", {
                    title: '提示框',
                    icon: 0,
                });
                num++;
                return false;
            }
        });
        if (num > 0) {
            return false;
        } else {

            $.ajax({
                url:'/index.php/index/userLogin',
                type:'POST',
                dataType:'json',
                data:'user_account='+$("#username").val()+'&user_password='+$.md5($("#userpwd").val())+'&ident='+$("#Codes_text").val(),
                success:function (val) {
                    if (val.errorcode == 1) {
                        layer.alert(val.errormsg, {
                            title: '提示框',
                            icon: 1,
                        });
                        setTimeout(function(){
                                location.href = "/index.php/index";
                                layer.close(index);
                            },2000);

                    } else {
                        layer.alert(val.errormsg, {
                            title: '提示框',
                            icon: 2,
                        });
                    }
                },
                error:function (e) {
                    layer.alert('服务器错误！', {
                        title: '提示框',
                        icon: 0,
                    });
                }

            })
        }

    });
    $(document).ready(function () {
        $("input[type='text'],input[type='password']").blur(function () {
            var $el = $(this);
            var $parent = $el.parent();
            $parent.attr('class', 'frame_style').removeClass(' form_error');
            if ($el.val() == '') {
                $parent.attr('class', 'frame_style').addClass(' form_error');
            }
        });
        $("input[type='text'],input[type='password']").focus(function () {
            var $el = $(this);
            var $parent = $el.parent();
            $parent.attr('class', 'frame_style').removeClass(' form_errors');
            if ($el.val() == '') {
                $parent.attr('class', 'frame_style').addClass(' form_errors');
            } else {
                $parent.attr('class', 'frame_style').removeClass(' form_errors');
            }
        });
    })
    $('#code_png').on('click', function () {
        $('#code_png').attr('src','/index.php/index/getCaptcha/'+new Date().getTime());
    })

/*申请加入*/
    function member_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
</script>