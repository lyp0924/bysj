<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/data/www/default/bysj/public/../application/index/view/applys/userAudit.html";i:1525516474;}*/ ?>
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
        <!--<script src="/static/admin/js/displayPart.js" type="text/javascript"></script>-->
<title>交易金额</title>
</head>

<body>
<div class="margin clearfix">
 <div class="Shops_Audit">
   <div class="prompt">当前共有<b><?php echo $allow+$refuse+$wait; ?></b>个成员申请，其中<?php echo $wait; ?>个待审核，<?php echo $allow; ?>个已通过，<?php echo $refuse; ?>个已拒绝。</div>
   <!--申请列表-->
   <div class="audit_list">
     <table class="table table-striped table-bordered table-hover" id="sample-table">
         <thead>
         <tr>
             <th width="180">学号</th>
             <th width="180">姓名</th>
             <th width="">学院</th>
             <th width="">专业</th>
             <th width="">班级</th>
             <th width="">手机</th>
             <th width="">状态</th>
             <th width="">申请时间</th>
             <th width="150px">操作</th>
         </tr>
         </thead>
         <tbody>
         <?php foreach($applys as $apply): ?>
         <tr>

             <td><?php echo $apply['no']; ?></td>
             <td><?php echo $apply['name']; ?></td>
             <td><?php echo $apply['col']; ?></td>
             <td><?php echo $apply['pro']; ?></td>
             <td><?php echo $apply['cls']; ?></td>
             <td><?php echo $apply['phone']; ?></td>
             <td><?php echo $apply['status']==1?'已通过':($apply['status'] == -1?'已拒绝':'待审核'); ?></td>
             <td><?php echo date('Y-m-d H:i:s',$apply['submittime']); ?></td>
             <td>
                 <?php if($apply['status'] == 0): ?>
                 <a title="通过" href="javascript:void(0);" onclick="applyEdit(this,<?php echo $apply['id']; ?>,'通过')" class="btn btn-xs btn-info Refund_detailed">通过</a>
                 <a title="拒绝" href="javascript:void(0);"  onclick="applyEdit(this,<?php echo $apply['id']; ?>,'拒绝')" class="btn btn-xs btn-danger" >拒绝</a>
                 <?php else: ?>
                 <a title="已审核" href="javascript:void(0);"class="btn btn-xs " >已审核</a>
                 <?php endif; ?>
             </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
   
   </div>
 </div>
</div>
</body>
</html>
<script>
$(function () {  
        // $(".displayPart").displayPart();
   });
$(function() {
		var oTable1 = $('#sample-table').dataTable( {
		// "aaSorting": [[ '0', "desc" ]],//默认第几个排序
		"order": [[ '6', "asc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		// "dom": 't',
		// "bFilter":false,
        "bSort": false, //排序功能
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[1,2,3,4,5,7,8]}// 制定列不参与排序
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
/*申请操作*/
function applyEdit(obj,id,type){
	layer.confirm('确认要'+type+'申请吗？',{icon:0,},function(index){
        $.ajax({
            url:'/index.php/index/applyEdit.html',
            type:'POST',
            dataType:'json',
            data:'id='+id+'&type='+type,
            success:function (val) {
                if (val.errorcode == 1) {
                    // $(obj).parents("tr").remove();
                    layer.msg('已'+type+'!',{icon:1,time:1000});
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
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Refund_detailed').on('click', function(){
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
</script>
