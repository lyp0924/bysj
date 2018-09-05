<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"E:\phpstudy\PHPTutorial\WWW\bysj\public/../application/index\view\roles\roleAdd.html";i:1527601991;}*/ ?>
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
        <script src="/static/admin/assets/js/bootstrap.min.js"></script>
		<script src="/static/admin/assets/js/typeahead-bs2.min.js"></script>           	
		<script src="/static/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/static/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/static/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/static/admin/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/static/admin/js/dragDivResize.js" type="text/javascript"></script>
	<script src="/static/admin/js/H-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="/static/admin/js/H-ui.admin.js"></script>
<title>添加权限</title>
</head>

<body>
<div class="Competence_add_style clearfix">
  <div class="left_Competence_add">
   <div class="title_name">角色信息</div>
    <div class="Competence_add">
     <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 角色名称 </label>
       <div class="col-sm-9"><input type="text" id="form-field-1" placeholder="" value="<?php echo isset($roleMsg['role_name'])?$roleMsg['role_name'] :''; ?>" name="角色名称" class="col-xs-10 col-sm-5"></div>
	</div>
	<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 角色等级 </label>
		<div class="col-sm-9"><input type="text" id="form-field-2" placeholder="" value="<?php echo isset($roleMsg['role_lv'])?$roleMsg['role_lv'] :''; ?>" name="角色名称" class="col-xs-10 col-sm-5"></div>
	</div>
     <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 角色状态 </label>
      <div class="col-sm-9">
		  <select name="角色状态" class="formControls col-4" id="form_select" placeholder="">
			  <?php if(isset($roleMsg) && $roleMsg['status'] == '1'): ?>
			  <option value="1" selected>启用</option>
			  <option value="0">禁用</option>
			  <?php else: ?>
			  <option value="1">启用</option>
			  <option value="0" selected>禁用</option>
			  <?php endif; ?>

		  </select>
	  </div>
	</div>
    <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> &nbsp </label>
       <div class="col-sm-9">
	</div>
   </div>
   <!--按钮操作-->
   <div class="Button_operation">
	   <button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i> 保存并提交</button>
       <?php if(isset($roleMsg)): ?>
	   <button onclick="window.parent.location.reload();layer_close();" class="btn btn-secondary  btn-warning" type="button"><i class="fa fa-reply"></i> 关闭</button>
	   <?php else: ?>
	   <button onclick="backRoleManager();" class="btn btn-secondary  btn-warning" type="button"><i class="fa fa-reply"></i> 返回上一步</button>
	   <?php endif; ?>
   </div>
   </div>
   </div>
   <!--权限分配-->
   <div class="Assign_style">
      <div class="title_name">权限分配</div>
      <div class="Select_Competence">
		  <?php foreach($permissionParents as $permissionParent): ?>
		  <dl class="permission-list">
		  <dt>
			  <label class="middle">
				  <?php if(isset($roleMsg) && in_array($permissionParent['id'],explode(',',$roleMsg['role_p']))): ?>
				  		<input name="parent<?php echo $permissionParent['id']; ?>" value="<?php echo $permissionParent['id']; ?>" class="ace" checked type="checkbox" id="parent<?php echo $permissionParent['id']; ?>">
				  <?php else: ?>
				  		<input name="parent<?php echo $permissionParent['id']; ?>" value="<?php echo $permissionParent['id']; ?>" class="ace" type="checkbox" id="parent<?php echo $permissionParent['id']; ?>">
				  <?php endif; ?>
			  <span class="lbl"><?php echo $permissionParent['title']; ?></span>
			  </label>
		  </dt>
		  <dd>
			  <?php if(isset($permissions[$permissionParent['id']])): ?>
			  <dl class="cl permission-list2">
				  <!--<dt><label class="middle"><input type="checkbox" value="<?php echo $permissionParent['id']; ?>" class="ace"  name="user-Character-0-0" id="id-disable-check"><span class="lbl"></span></label></dt>-->
				  <dd>
		  	  <?php foreach($permissions[$permissionParent['id']] as $permission): if(isset($roleMsg) && in_array($permission['id'],explode(',',$roleMsg['role_p']))): ?>
					  <label class="middle"><input type="checkbox" value="<?php echo $permission['id']; ?>" class="ace" checked name="permission_<?php echo $permission['id']; ?>" id="permission_<?php echo $permission['id']; ?>"><span class="lbl"><?php echo $permission['title']; ?></span></label>
					  <?php else: ?>
					  <label class="middle"><input type="checkbox" value="<?php echo $permission['id']; ?>" class="ace" name="permission_<?php echo $permission['id']; ?>" id="permission_<?php echo $permission['id']; ?>"><span class="lbl"><?php echo $permission['title']; ?></span></label>
					  <?php endif; endforeach; ?>
				  </dd>
			  </dl>
		  	  <?php endif; ?>
		  </dd>
		  </dl>
		  <?php endforeach; ?>
      </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
//初始化宽度、高度  
 $(".left_Competence_add,.Competence_add_style").height($(window).height()).val();; 
 $(".Assign_style").width($(window).width()-500).height($(window).height()).val();
 $(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	
	$(".Assign_style").width($(window).width()-500).height($(window).height()).val();
	$(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
	$(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
	});

/*按钮选择*/
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
		
	});
});
/**提交操作**/
function article_save_submit(){
    var num=0;
    var str="";
    $(".col-sm-9 input[type$='text']").each(function(n){
        if($(this).val()=="")
        {
            layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',
                icon:0,
            });
            num++;
            return false;
        }
    });
    if(num>0){
        return false;
    } else {
        var parent = new Array();
        var key = 0;
        $(".Assign_style input[type$='checkbox']:checked").each(function () {
			parent[key] = $(this).val();
			key ++;
        });
        // console.log(parent);
        // return;
        $.ajax({
            url:'/index.php/index/submitRole.html',
            type:'POST',
            dataType:'json',
            data:'name='+$("#form-field-1").val()+'&status='+$("#form_select").val()+'&parent='+parent+'&role_lv='+$("#form-field-2").val()+'&role_id='+"<?php echo isset($roleMsg)?$roleMsg['role_id'] : null; ?>",
            success:function (val) {
                if (val.errorcode == 1) {
                    layer.alert(val.errormsg, {
                        title: '提示框',
                        icon: 1,
                    });
                    setTimeout(function(){
                        location.reload();
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

/*返回上一步*/
function backRoleManager() {
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').remove();
    window.history.back(-1);
}
</script>