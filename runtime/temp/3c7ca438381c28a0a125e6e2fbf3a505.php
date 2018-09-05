<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/data/www/default/bysj/public/../application/index/view/article/articleSort.html";i:1525851061;}*/ ?>
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
        <script src="/static/admin/js/H-ui.js" type="text/javascript"></script>
        <script type="text/javascript" src="/static/admin/js/H-ui.admin.js"></script>
        <script src="/static/admin/js/displayPart.js" type="text/javascript"></script>
<title>文章分类</title>
</head>

<body>
<div class="margin clearfix">
 <div class="sort_style">
  <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()"id="add_page" class="btn btn-warning" onclick="add_article_sort()"><i class="fa fa-plus"></i> 添加分类</a>
        <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>
       </span>
       <span class="r_f">共：<b>5</b>分类</span>
     </div>
     <!--分类类表-->
     <div class="article_sort_list">
         <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">ID</th>
                <!--<th width="80px">排序</th>-->
				<th width="150px">分类名称</th>
				<th width="">简介</th>
				<th width="150px">添加时间</th>
                <!--<th width="80px">状态</th>-->                
				<th width="150px">操作</th>
			</tr>
		</thead>
        <tbody>
         <tr>
		 <?php foreach($sortlist as $vo): ?>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td><?php echo $vo['sid']; ?></td>
          <!--<td><?php echo $vo['compositor']; ?></td>-->
          <td><?php echo $vo['sortname']; ?></td>
          <td class="displayPart" displayLength="60"><?php echo $vo['description']; ?></td>
          <td><?php echo date('Y-m-d H:i:s',$vo['date']); ?></td>
          <!--<td>启用</td>-->       
          <td class="td-manage">   
           <a title="编辑" onclick="member_edit('编辑','<?php echo url('Article/updateSort',array('sid'=>$vo['sid'])); ?>','4','','510')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>      
           <a title="删除" href="javascript:;"  onclick="member_del(this,'<?php echo $vo['sid']; ?>')" class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a>
          </td>
         </tr>
		 <?php endforeach; ?>
        </tbody>
        </table>
     </div>
 </div>
</div>
<!--添加文章分类图层-->
<div id="addsort_style" style="display:none" class="article_style">
 <div class="add_content" id="form-article-add">
    <ul>
     <li class="clearfix Mandatory"><label class="label_name"><i>*</i>分类名称</label>
     <span class="formControls w_txt"><input name="分类名称" type="text" id="form-sortname" class="col-xs-7 col-sm-5 "></span>
     </li>
     <!--<li class="clearfix"><label class="label_name">排序</label>
     <span class="formControls w_txt"><input name="compositor" type="text" id="form-compositor" value="0" class="col-xs-7 col-sm-2 "></span>
     </li>-->
     <li class="clearfix"><label class="label_name">简介</label>
     <span class="formControls w_txt"><textarea name="权限描述" class="form-control" id="form-description" placeholder="" onkeyup="checkLength(this);"></textarea><span  style=" margin-left:10px;">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></span>
     </li>
    </ul>
 </div>
</div>
</body>
</html>
<script>
$(function() {
  var oTable1 = $('#sample-table').dataTable( {
  "aaSorting": [[ 1, "desc" ]],//默认第几个排序
  "bStateSave": true,//状态保存
  "aoColumnDefs": [
	//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	{"orderable":false,"aTargets":[0,2,3,4,6,7,]}// 制定列不参与排序
  ]});
		  $('table th input:checkbox').on('click' , function(){
			  var that = this;
			  $(this).closest('table').find('tr > td:first-child input:checkbox')
			  .each(function(){
				 this.checked = that.checked;
				 $(this).closest('tr').toggleClass('selected');
	 });						
  });
})
/**添加分类**/
 function add_article_sort(index){	 
	 layer.open({
        type: 1,
        title: '添加文章分类',
		maxmin: true, 
		shadeClose: true, //点击遮罩关闭层
        area : ['600px' , ''],
        content:$('#addsort_style'),
		btn:['提交','取消'],
		yes:function(index,layero){
			 var num=0;
		 var str="";
     $(".Mandatory input[type$='text']").each(function(n){
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
		  if(num>0){  return false;}	 	
          else{
			  //layer.alert('添加成功！',{
               //title: '提示框',				
			   //icon:1,	   
			  //});
			   //layer.close(index);
			   $.ajax({
				url:'/index.php/index/Article/sortInsert.html',
				type:'POST',
				dataType:'json',
				data:'sortname='+$("#form-sortname").val()+'&description='+$("#form-description").val(),
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
			})//ajax end
		  }		  
			
		}
	 })	 	 
}
/*文章-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
		//$(obj).parents("tr").remove();
		//layer.msg('已删除!',{icon:1,time:1000});
		$.ajax({
            url:'/index.php/index/Article/delSort.html',
            type:'POST',
            dataType:'json',
            data:'sid='+id,
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
/*文章-编辑*/
function member_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}
</script>
