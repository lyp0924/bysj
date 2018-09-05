<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/data/www/default/bysj/public/../application/index/view/permissions/adminCompetence.html";i:1525583430;}*/ ?>
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
<title>管理权限</title>
</head>

<body>
 <div class="margin clearfix">
   <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" id="Competence_add" class="btn btn-warning" title="添加权限"><i class="fa fa-plus"></i> 添加权限</a>
        <!--<a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>-->
       </span>
       <!--<span class="r_f">共：<b>5</b>类</span>-->
     </div>
     <div class="compete_list">
       <table id="sample-table-1" class="table table-striped table-bordered table-hover">
		 <thead>
			<tr>
				<th class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th>编号</th>
				<th>权限名称</th>
				<th>父类权限</th>
				<th>URL地址</th>
				<th style="width: 200px;">添加时间</th>
				<th>启用状态</th>
				<th style="width: 200px;">操作</th>
             </tr>
		    </thead>
             <tbody>
			 <?php foreach($permissions as $permission): ?>
				<tr>
					<td class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>

					<td><?php echo $permission['id']; ?></td>
					<td><?php echo $permission['title']; ?></td>
					<td><?php echo $permissionParents[$permission['parent']]['title']; ?></td>
					<td><?php echo $permission['url']; ?></td>
					<td><?php echo date('Y-m-d H:i:s',$permission['addtime']); ?></td>
					<td class="td-status">
					<?php if($permission['status'] == '1'): ?>
					<span class="label label-success radius">已启用</span>
					<?php else: ?>
					<span class="label label-defaunt radius">已停用</span>
					<?php endif; ?>
					</td>
					<td class="td-manage">
						<?php if($permission['status'] == '1'): ?>
						<a onClick="member_stop(this,'<?php echo $permission['id']; ?>')"  href="javascript:void(0);" title="停用"  class="btn btn-xs btn-success"><i class="icon-remove bigger-120">&nbsp停用</i></a>
						<?php else: ?>
						<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,'<?php echo $permission['id']; ?>')" href="javascript:;" title="启用"><i class="icon-ok bigger-120">&nbsp启用</i></a>
						<?php endif; ?>
						<!--<a title="删除" href="javascript:;"  onclick="Competence_del(this,'1')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>-->
					</td>
				</tr>
			 <?php endforeach; ?>
		      </tbody>
	        </table>
     </div>
 </div>
 <!--添加权限样式-->
 <div id="Competence_add_style" style="display:none;">
   <div class="Competence_add_style">
     <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限名称 </label>
       <div class="col-sm-9"><input type="text" id="form-field-1" placeholder=""  name="权限名称" class="col-xs-10 col-sm-5"></div>
	</div>
     <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限说明(url) </label>
       <div class="col-sm-9"><input type="text" name="权限说明(url)" value="/index.php/" placeholder="" class="col-xs-10 col-sm-5" id="form_url">(例如:/index.php/index/home.html)</input></div>
	</div>
   <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限从属 </label>
	   <div class="col-sm-9">
		   <select name="权限从属" class="formControls col-4"  placeholder="" title="父类权限" id="form_select">
			   <?php foreach($permissionParents as $permissionParent): if($permissionParent['id'] !== '0'): ?>
			   <option value=<?php echo $permissionParent['id']; ?>><?php echo $permissionParent['title']; ?></option>
			   <?php endif; endforeach; ?>
		   </select>
	   </div>
   </div>
   <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 排序 </label>
	   <div class="col-sm-9"><input type="text" name="排序" value="10" placeholder="" class="col-xs-10 col-sm-5" id="order">

   </div>
  </div>
</body>
</html>
<script type="text/javascript">
/*添加权限*/
$('#Competence_add').on('click', function(){
	 layer.open({
        type: 1,
        title: '添加权限',
		maxmin: true, 
		shadeClose: false,
        area : ['800px' , ''],
        content:$('#Competence_add_style'),
		btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
     	$(".col-sm-9 input[type$='text'],#form_textarea").each(function(n){
     	    if($(this).val()=="")
     	    {
     	        layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
     	            title: '提示框',
					icon:0,
				});
		    num++;
            return false;
     	    }

            if($(this).attr("name")=="权限说明(url)") {
                if(!(/^\/index\.php\/\w+(\/){0,1}\w+\.html$/.test($(this).val()))){
                    layer.alert(str+=""+$(this).attr("name")+"格式错误！\r\n",{
                        title: '提示框',
                        icon:0,
                    });
                	num++;
                	return false;
                }
            }
     	});
     	if(num>0){
     	    return false;
     	}else{
     	    $.ajax({
				url:'/index.php/index/permissionAdd',
				type:'POST',
				dataType:'json',
				data:'title='+$("#form-field-1").val()+
					 '&url='+$("#form_url").val()+
					 '&parent='+$("#form_select").val()+
					 '&order='+$("#order").val(),
				success:function (val) {
					if (val.errorcode == 1) {
						layer.alert(val.errormsg, {
							title: '提示框',
							icon: 1,
						});
						setTimeout(function(){
							location.reload();
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
        }
    });			 
 });
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

/*权限-停用*/
function member_stop(obj,id){
    layer.confirm('确认要停用吗？',function(index){
        $.ajax({
            url:'/index.php/index/delPermission.html',
            type:'POST',
            dataType:'json',
            data:'id='+id+'&status=0',
            success:function (val) {
                if (val.errorcode == 1) {
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,'+id+')" href="javascript:void(0);" title="启用"><i class="icon-ok bigger-120">&nbsp启用</i></a>');
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

/*权限-启用*/
function member_start(obj,id){
    layer.confirm('确认要启用吗？',function(index){
        $.ajax({
            url:'/index.php/index/delPermission.html',
            type:'POST',
            dataType:'json',
            data:'id='+id+'&status=1',
            success:function (val) {
                if (val.errorcode == 1) {
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,'+id+')" href="javascript:void(0);" title="停用"><i class="icon-remove bigger-120">&nbsp停用</i></a>');
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