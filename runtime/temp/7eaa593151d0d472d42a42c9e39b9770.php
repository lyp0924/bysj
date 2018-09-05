<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/data/www/default/bysj/public/../application/index/view/roles/roleManager.html";i:1525516475;}*/ ?>
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
	<link rel="stylesheet" href="/static/admin/assets/css/font-awesome.min.css"/>
	<!--[if lte IE 8]>
	<link rel="stylesheet" href="/static/admin/assets/css/ace-ie.min.css" />
	<![endif]-->
	<script src="/static/admin/js/jquery-1.9.1.min.js"></script>
	<script src="/static/admin/assets/js/bootstrap.min.js"></script>
	<script src="/static/admin/assets/js/typeahead-bs2.min.js"></script>
	<script src="/static/admin/assets/js/jquery.dataTables.min.js"></script>
	<script src="/static/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
	<script src="/static/admin/assets/layer/layer.js" type="text/javascript" ></script>
	<script src="/static/admin/assets/laydate/laydate.js" type="text/javascript"></script>
	<script src="/static/admin/js/H-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/admin/js/H-ui.admin.js"></script>
	<title>管理权限</title>
</head>

<body>
<div class="margin clearfix">
	<div class="border clearfix">
       <span class="l_f">
        <a href="roleAdd.html" id="Competence_add" class="btn btn-warning" title="添加角色"><i class="fa fa-plus"></i> 添加角色</a>
        <!--<a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>-->
       </span>
		<span class="r_f">共：<b>5</b>类</span>
	</div>
	<div class="compete_list">
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
			<tr>
				<th class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th>名称</th>
				<th>权限</th>
				<th>状态</th>
				<th class="hidden-480">操作</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($roles as $role): ?>
			<tr>
				<td class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
				<td><?php echo $role['role_name']; ?></td>
				<td><?php echo implode(',',$role['permission']); ?></td>
				<td class="td-status">
					<?php if($role['status'] == '1'): ?>
					<span class="label label-success radius">已启用</span>
					<?php else: ?>
					<span class="label label-defaunt radius">已停用</span>
					<?php endif; ?>
				</td>
				<td class="td-manage">
					<?php if($role['status'] == '1'): ?>
					<a onClick="member_stop(this,'<?php echo $role['role_id']; ?>')"  href="javascript:void(0);" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a>
					<?php else: ?>
					<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,'<?php echo $role['role_id']; ?>')" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>
					<?php endif; ?>
					<a title="编辑" onclick="Competence_modify('<?php echo $role['role_id']; ?>')" href="javascript:void(0);"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a>
					<!--<a title="删除" href="javascript:void (0);"  onclick="Competence_del(this,'<?php echo $role['role_id']; ?>')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>-->
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<!--添加权限样式-->
 <div id="Competence_add_style" style="display:none">
  <div class="Competence_add_style">
    <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限名称 </label>
      <div class="col-sm-9"><input type="text" id="form-field-1" placeholder=""  name="权限名称" class="col-xs-10 col-sm-5"></div>
   </div>
   </div>
  </div>
 </div>
</body>
</html>
<script type="text/javascript">
    /*修改权限*/
    function Competence_modify(id){
        layer_show('权限修改',"roleAdd/"+id+".html",'',600);
    };
    //面包屑返回值
    var index = parent.layer.getFrameIndex(window.name);
    parent.layer.iframeAuto(index);
    $('.Order_form ,#Competence_add').on('click', function(){
        var cname = $(this).attr("title");
        var cnames = parent.$('.Current_page').html();
        var herf = parent.$("#iframe").attr("src");
        parent.$('#parentIframe span').html(cname);
        parent.$('#parentIframe').css("display","inline-block");
        parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
        parent.layer.close(index);

    });

    /*角色-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){
            $.ajax({
                url:'/index.php/index/delRole.html',
                type:'POST',
                dataType:'json',
                data:'role_id='+id+'&status=0',
                success:function (val) {
                    if (val.errorcode == 1) {
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                        $(obj).remove();
                        layer.msg('已停用!',{icon: 5,time:1000});

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

        });
    }

    /*角色-启用*/
    function member_start(obj,id){
        layer.confirm('确认要启用吗？',function(index){
            $.ajax({
                url:'/index.php/index/delRole.html',
                type:'POST',
                dataType:'json',
                data:'role_id='+id+'&status=1',
                success:function (val) {
                    if (val.errorcode == 1) {
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                        $(obj).remove();
                        layer.msg('已启用!',{icon: 6,time:1000});

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
        });
    }
</script>