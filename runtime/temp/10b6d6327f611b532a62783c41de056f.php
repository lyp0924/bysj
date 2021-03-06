<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/data/www/default/bysj/public/../application/index/view/users/editUser.html";i:1525519786;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link href="/static/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/static/admin/css/style.css"/>
	<link href="/static/admin/assets/css/codemirror.css" rel="stylesheet">
	<link rel="stylesheet" href="/static/admin/assets/css/ace.min.css" />
	<link rel="stylesheet" href="/static/admin/font/css/font-awesome.min.css" />
	<!--[if lte IE 8]>
	<link rel="stylesheet" href="/static/admin/assets/css/ace-ie.min.css" />
	<![endif]-->
	<script src="/static/admin/js/jquery-1.9.1.min.js"></script>
	<script src="/static/admin/assets/layer/layer.js" type="text/javascript" ></script>
	<script src="/static/admin/assets/laydate/laydate.js" type="text/javascript"></script>
	<script src="/static/admin/assets/js/bootstrap.min.js"></script>
	<script src="/static/admin/assets/js/typeahead-bs2.min.js"></script>
	<script src="/static/admin/assets/js/jquery.dataTables.min.js"></script>
	<script src="/static/admin/assets/js/jquery.dataTables.bootstrap.js"></script>

	<title>个人信息管理</title>
</head>

<body>
<div class="clearfix">
	<div class="admin_info_style">
		<div class="" id="Personal">
			<div class="xinxi" style="">
				<div class="form-group"><label class="col-sm-3 control-label no-padding-right"  for="form-field-1">姓名： </label>
					<div class="col-sm-9" style="display: inline-block;vertical-align: middle;">
						<input type="text" name="姓名" id="user_name" style="width: 200px;" value="<?php echo $user['user_name']; ?>" class="col-xs-7 text_info" disabled="disabled">
						<!--<span><?php echo $user['user_name']; ?></span>-->
						&nbsp;&nbsp;&nbsp;<a href="javascript:ovid()" onclick="change_Password()" class="btn btn-warning btn-xs">修改密码</a></div>

				</div>
				<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">账号： </label>
					<div class="col-sm-9" style="display: inline-block;vertical-align: middle;" > <span><?php echo $user['user_account']; ?></span></div>
				</div>
				<div class="form-group" ><label class="col-sm-3 control-label no-padding-right" for="form-field-1">学院： </label>
					<div class="col-sm-9" style="display: inline-block;vertical-align: middle;" >
						<input type="text" name="学院" id="user_col" style="width: 200px;" value="<?php echo $user['user_col']; ?>" class="col-xs-7 text_info" disabled="disabled">
						<!--<span><?php echo $user['user_col']; ?></span></div>-->
				</div>
				</div>
				<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">专业： </label>
					<div class="col-sm-9" style="display: inline-block;vertical-align: middle;" >
						<input type="text" name="专业" id="user_pro" style="width: 200px;" value="<?php echo $user['user_pro']; ?>" class="col-xs-7 text_info" disabled="disabled">
						<!--<span><?php echo $user['user_pro']; ?></span></div>-->
				</div>
				</div>
				<!--<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">性别： </label>-->
					<!--<div class="col-sm-9" style="display: inline-block;vertical-align: middle;">-->
						<!--<span class="sex">男</span>-->
						<!--<div class="add_sex">-->
							<!--<label><input name="form-field-radio" type="radio" class="ace" checked="checked"><span class="lbl">保密</span></label>&nbsp;&nbsp;-->
							<!--<label><input name="form-field-radio" type="radio" class="ace"><span class="lbl">男</span></label>&nbsp;&nbsp;-->
							<!--<label><input name="form-field-radio" type="radio" class="ace"><span class="lbl">女</span></label>-->
						<!--</div>-->
					<!--</div>-->
				<!--</div>-->

				<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">电话： </label>
					<div class="col-sm-9" style="display: inline-block;vertical-align: middle;">
						<input type="text" name="电话" id="user_phone" style="width: 200px;" value="<?php echo $user['user_pho']; ?>" class="col-xs-7 text_info" disabled="disabled">
					</div>
				</div>

				<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">角色： </label>
					<div class="col-sm-9" style="display: inline-block;vertical-align: middle;" >
						<select  class="col-xs-20 text_info" disabled="disabled" id="role_id">
							<?php foreach($roles as $role): if($role['role_id'] == $user['role_id']): ?>
							<option value="<?php echo $role['role_id']; ?>" selected><?php echo $role['role_name']; ?></option>
							<?php else: ?>
							<option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_name']; ?></option>
							<?php endif; endforeach; ?>
						</select>

					</div>
				</div>
				<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">加入时间： </label>
					<div class="col-sm-9" style="display: inline-block;vertical-align: middle;" > <span><?php echo date('Y-m-d H:i:s',$user['addtime']); ?></span></div>
				</div>
				<div class="Button_operation clearfix">
					<button onclick="modify();" class="btn btn-danger radius" type="submit">修改信息</button>
					<button onclick="save_info(<?php echo $user['user_id']; ?>);" class="btn btn-success radius" type="button">保存修改</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--修改密码样式-->
<div class="change_Pass_style" id="change_Pass">
	<ul class="xg_style">
		<li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="新密码" type="password" class="" id="Nes_pas"></li>
		<li><label class="label_name">确认密码</label><input name="再次确认密码" type="password" class="" id="c_mew_pas"></li>

	</ul>
</div>
</body>
</html>
<script>

    //按钮点击事件
    function modify(){
        $('.text_info').attr("disabled", false);
        $('.text_info').addClass("add");
        $('#Personal').find('.xinxi').addClass("hover");
        $('#Personal').find('.btn-success').css({'display':'block'});
    };
    function save_info(user_id){
        var num=0;
        var str="";
        $(".xinxi input[type$='text']").each(function(n){
            if($(this).val()=="")
            {

                layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                    title: '提示框',
                    icon:0,
                });
                num++;
                return false;
            }
            // console.log($(this).attr('name'));
            if($(this).attr('name') == '电话' && !(/^1[3|4|5|8][0-9]\d{8}$/.test($(this).val()))){
                layer.alert(str += "请输入正确的" + $(this).attr("name") + "！\r\n", {
                    title: '提示框',
                    icon: 0,
                });
                num++;
                return false;
            }
        });
        if(num>0){  return false;}
        else{
            $.ajax({
                url:'/index.php/index/saveEditUser.html',
                type:'POST',
                dataType:'json',
                data:'role_id='+$("#role_id").val()+
					 '&user_pho='+$("#user_phone").val()+
				 	 '&user_col='+$("#user_col").val()+
					 '&user_pro='+$("#user_pro").val()+
					 '&user_name='+$("#user_name").val()+
					 '&user_id='+user_id,
                success:function (val) {
                    if (val.errorcode == 1) {
                        layer.msg(val.errormsg);
                        // setTimeout(function(){
                        //     location.reload();
                        // },800);

                    } else {
                        layer.alert(val.errormsg, {
                            title: '提示框',
                            icon: 2,
                        });
                    }
                    setTimeout(function(){
                        location.reload();
                    },800);
                },
                error:function (e) {
                    layer.alert('服务器错误！', {
                        title: '提示框',
                        icon: 0,
                    });
                }
            })
            // layer.alert('修改成功！',{
            //     title: '提示框',
            //     icon:1,
            // });
            $('#Personal').find('.xinxi').removeClass("hover");
            $('#Personal').find('.text_info').removeClass("add").attr("disabled", true);
            $('#Personal').find('.btn-success').css({'display':'none'});
            layer.close();

        }
    };
    //初始化宽度、高度
    $(".admin_modify_style").height($(window).height());
    $(".recording_style").width($(window).width()-400);
    //当文档窗口发生改变时 触发
    $(window).resize(function(){
        $(".admin_modify_style").height($(window).height());
        $(".recording_style").width($(window).width()-400);
    });
    //修改密码
    function change_Password(){
        layer.open({
            type: 1,
            title:'修改密码',
            area: ['300px','220px'],
            shadeClose: true,
            content: $('#change_Pass'),
            btn:['确认修改'],
            yes:function(index, layero) {
                if ($("#password").val() == "") {
                    layer.alert('原密码不能为空!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }
                if ($("#Nes_pas").val() == "") {
                    layer.alert('新密码不能为空!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }

                if ($("#c_mew_pas").val() == "") {
                    layer.alert('确认新密码不能为空!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }
                if (!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val()) {
                    layer.alert('密码不一致!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }
                else {
                    $.ajax({
                        url: '/index.php/index/savePwd.html',
                        type: 'POST',
                        dataType: 'json',
                        data: 'pwd=' + $("#Nes_pas").val() + '&user_id=<?php echo $user['user_id']; ?>',
                        success:function (val) {
                        if (val.errorcode == 1) {
                            layer.msg(val.errormsg);
                            // setTimeout(function () {
                            //     location.reload();
                            // }, 800);

                        } else {
                            layer.alert(val.errormsg, {
                                title: '提示框',
                                icon: 2,
                            });
                        }
						setTimeout(function(){
							location.reload();
						},800);
                    },
                    error:function (e) {
                        layer.alert('服务器错误！', {
                            title: '提示框',
                            icon: 0,
                        });
                    }
                })
                    // layer.alert('修改成功！',{
                    //     title: '提示框',
                    //     icon:1,
                    // });
                    // layer.close();
                }

            }
        });
    }
</script>
<script>
    jQuery(function($) {
        var oTable1 = $('#sample-table').dataTable( {
            "aaSorting": [[ 1, "desc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[0,2,3,4,5,6]}// 制定列不参与排序
            ] } );


        $('table th input:checkbox').on('click' , function(){
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function(){
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

        });
    });</script>
