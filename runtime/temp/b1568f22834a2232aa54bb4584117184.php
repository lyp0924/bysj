<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/data/www/default/bysj/public/../application/index/view/users/userList.html";i:1525577225;}*/ ?>
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
        <script src="/static/admin/js/lrtk.js" type="text/javascript" ></script>	         	
		<script src="/static/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/static/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/static/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/static/admin/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/static/admin/js/H-ui.js" type="text/javascript"></script>
        <script src="/static/admin/js/displayPart.js" type="text/javascript"></script>
    <script type="text/javascript" src="/static/admin/js/H-ui.admin.js"></script>
<title>文章管理</title>
</head>

<body>
<div class="clearfix">
 <div class="article_style" id="article_style">
          <div id="scrollsidebar" class="left_Treeview">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="widget-box side_content" >
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
     <div class="side_list" style="min-height: 700px;">
         <script type="application/javascript">
             $(window).on("load resize",function(){
                 var h=window.innerHeight||document.body.clientHeight||document.documentElement.clientHeight;
                 $(".side_list").css("min-height",h);
             });
         </script>
      <div class="widget-header header-color-green2">
          <h4 class="lighter smaller">角色分类</h4>
      </div>
      <div class="widget-body" >
         <ul class="b_P_Sort_list">
             <li><i class="orange  fa  fa-user"></i><a href="/index.php/index/userList/0.html" id="roleAll"  class="role">全部</a></li>
             <!--onclick="getUserList(0)" -->
             <?php foreach($roles as $role): ?>
             <li><i class="fa fa-user pink "></i>
                 <a href="/index.php/index/userList/<?php echo $role['role_id']; ?>.html" id="role<?php echo $role['role_id']; ?>" class="role" ><?php echo $role['role_name']; ?></a>
                 <!--onclick="getUserList(<?php echo $role['role_id']; ?>)"-->
             </li>
             <?php endforeach; ?>
         </ul>
  </div>
  </div>
  </div>  
  </div>
 <!--成员列表-->
 <div class="Ads_list">
 <div class="search_style">

    </div>
    <div class="border clearfix"><span class="l_f"><a href="javascript:void(0)" class="btn btn-danger" onclick="delbatch()"><i class="fa fa-trash"></i> 批量删除</a></span>
      <!--<span class="r_f">共：<b>45</b>个</span>-->
     </div>
     <div class="article_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
                <th width="80px">排序</th>
				<th width="120">成员姓名</th>
				<th width="180">成员账号</th>
				<th width="120px">成员角色</th>
                <th width="200px">成员学院</th>
				<th width="120px">成员专业</th>
				<th width="120px">成员班级</th>
				<th width="120px">成员手机号</th>
				<th width="150px">加入时间</th>
				<th width="150px">操作</th>
			</tr>
		</thead>
        <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
            <td><?php echo $user['user_id']; ?></td>
            <td><?php echo $user['user_name']; ?></td>
            <td><?php echo $user['user_account']; ?></td>
            <td><?php echo $user['role']['role_name']; ?></td>
            <td><?php echo $user['user_col']; ?></td>
            <td><?php echo $user['user_pro']; ?></td>
            <td><?php echo $user['user_cls']; ?></td>
            <td><?php echo $user['user_pho']; ?></td>
            <td><?php echo date('Y-m-d H:i:s',$user['addtime']); ?></td>
            <td>
                <a title="编辑" href="javascript:void(0);"  onclick="member_edit('编辑','/index.php/index/userEdit/<?php echo $user['user_id']; ?>.html','520','460')" class="btn btn-xs btn-danger" ><i class="fa fa-edit  bigger-120"></i></a>
                <a title="删除" href="javascript:void(0);"  onclick="member_del(this,'<?php echo $user['user_id']; ?>')" class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>

       </table>    
     </div>
 </div>
 </div>
</div>
</body>
</html>
<script type="application/javascript">
    $(function () {
        var oTable1 = $('#sample-table').dataTable( {
            // "aaSorting": [[ 1, "desc" ]],//默认第几个排序
            "retrieve": true,
            "bStateSave": true,//状态保存
            "bSort": false, //排序功能
            "bFilter": true,
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[0,2,3,4,5,7,8]}// 制定列不参与排序
            ] } );

        $('table th input:checkbox').on('click' , function(){
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function(){
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

        });
    });
</script>
<script>
$(function () {  
        $(".displayPart").displayPart();
   });
//    laydate({
//     elem: '#start',
//     event: 'focus'
// });
 //面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('#add_page').on('click', function(){
	var cname = $(this).attr("title");
	var chref = $(this).attr("href");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe').html(cname);
    parent.$('#iframe').attr("src",chref).ready();;
	parent.$('#parentIframe').css("display","inline-block");
	parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
    parent.layer.close(index);
	
}); 


 $(function() { 
	$("#article_style").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:30,//设置隐藏时的距离
	    spacingh:250,//设置显示时间距
		set_scrollsidebar:'.Ads_style',
		table_menu:'.Ads_list'
	});
});
//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
 $(".Ads_list").width($(window).width()-220);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".Ads_list").width($(window).width()-220);
});

/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
        $.ajax({
            url:'/index.php/index/delUser.html',
            type:'POST',
            dataType:'json',
            data:'user_id='+id,
            success:function (val) {
                if (val.errorcode == 1) {
                    // $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                    setTimeout(function(){
                        location.reload();
                    },800);

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

/*用户-编辑*/
function member_edit(title,url,w,h){
    layer_show(title,url,w,h);
}

/*批量删除*/
function delbatch() {
    var user_ids = new Array();
    $(".ace:checked").each(function (n) {
        if ($(this).val() !== 'on'){
            user_ids.push($(this).val());
        }
    });
    if (user_ids.length > 0){
        $.ajax({
            url:'/index.php/index/delbatch.html',
            type:'POST',
            dataType:'json',
            data:'user_ids='+user_ids,
            success:function (val) {
                if (val.errorcode == 1) {
                    // $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                    setTimeout(function(){
                        location.reload();
                    },800);

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

</script>
