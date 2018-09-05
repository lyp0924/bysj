<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/data/www/default/bysj/public/../application/index/view/article/articleList.html";i:1525849882;}*/ ?>
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
        <script type="text/javascript" src="/static/admin/js/H-ui.admin.js"></script>
        <script src="/static/admin/js/displayPart.js" type="text/javascript"></script>
<title>文章管理</title>
</head>

<body>
<div class="clearfix">
 
 <div class="">
    <div class="border clearfix">
       <span class="l_f">
        <a href="articleAdd.html"  title="添加文章" id="add_page" class="btn btn-warning"><i class="fa fa-plus"></i> 添加文章</a>
        <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>
       </span>
       <span class="r_f">共：<b>45</b>条文章</span>
     </div>
     <div class="article_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">ID</th>
                <!--<th  width="80px">排序</th>-->
				<th width="100">所属分类</th>
				<th width="100px">标题</th>
				<th width="180px">简介</th>
				<th width="150px">添加时间</th>
                <!--<th width="80px">状态</th>-->                
				<th width="150px">操作</th>
			</tr>
		</thead>
        <tbody>
		<?php foreach($articlelist as $vo): ?>
         <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td><?php echo $vo['gid']; ?></td>
          <!--<td><?php echo $vo['compositor']; ?></td>-->
          <td><?php echo $vo['article_sort']['sortname']; ?></td>
          <!--<td><?php echo $vo['sortid']; ?></td>-->
          <td><?php echo $vo['title']; ?></td>
          <td><?php echo $vo['excerpt']; ?></td>
          <td><?php echo date('Y-m-d H:i:s',$vo['date']); ?></td>
          <!--<td>显示</td>-->
          <td class="td-manage">   
           <a title="编辑" onclick="member_edit('编辑','<?php echo url('Article/articleUpdate',array('gid'=>$vo['gid'])); ?>','4','','510')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>
           <a title="删除" href="javascript:;"  onclick="member_del(this,'<?php echo $vo['gid']; ?>')" class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a>
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
<script>
$(function () {  
        $(".displayPart").displayPart();  
   });
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
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
    parent.layer.close(index);
	
}); 
$(function() {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,7,]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
})

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

/*文章-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
		$.ajax({
            url:'/index.php/index/Article/delArticle.html',
            type:'POST',
            dataType:'json',
            data:'gid='+id,
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
