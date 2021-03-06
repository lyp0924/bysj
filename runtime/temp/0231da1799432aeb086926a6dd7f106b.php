<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/data/www/default/bysj/public/../application/index/view/index/home.html";i:1525793952;}*/ ?>
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
    <style type="text/css">
        td{
            text-align: left;
        }
    </style>
<title>文章管理</title>
</head>

<body>
<div class="clearfix" style="text-align: center;">
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
        <i class="icon-ok green"></i>欢迎使用<strong class="green">网络安全实验室管理系统<small></small></strong>，你本次登陆时间为<?php echo date('Y年m月d日H时i分',$userLog['login_time']); ?>，登陆IP：<?php echo $userLog['login_ip']; ?>，登录地点：<?php echo $userLog['login_addr']; ?>
    </div>
    <div>
        <div style="width:55%;min-height:680px;margin: 0 auto;margin-right:25px;display: inline-block;vertical-align: top;">


         <div class="" style="vertical-align: top;display: inline-block;width:95%;" title="实验室快讯">
               <table class="table">
                   <!--table-striped-->
                   <thead>
                   <th colspan="3" style="text-align: left;">
                       <span style="background-color: #4c4c4d;color: #FFF;border-radius: 8px;padding: 5px;">实验室信息</span>
                   </th>
                   </thead>
                <tbody>
                <tr>
                    <th style="text-align: left;width: 30%;">标题</th>
                    <th style="text-align: center;">简介</th>
                    <th style="text-align: right;width: 20%;">发布时间</th>
                </tr>
                <?php foreach($articlelist as $vo): ?>
                 <tr onclick="location.href='<?php echo url('Article/Art_find',array('gid'=>$vo['gid'])); ?>';">
                     <td style="text-align: left;padding-left: 0;">
                         <p style="display:inline-block ;margin: 0 auto;border-color:#000;border-radius:10px;background-color: yellow;width: 100px;text-align: center;">--<?php echo $vo['article_sort']['sortname']; ?>--</p>
                         <p style="display:inline-block ;display:inline-block ;">|<?php echo $vo['title']; ?></p>
                     </td>
                     <td style="text-align: center;"><?php echo $vo['excerpt']; ?></td>
                     <td style="text-align: right;"><?php echo date('Y-m-d H:i:s',$vo['date']); ?></td>
                 </tr>
                 <?php endforeach; ?>
                </tbody>
               </table>
         </div>
            <div style="height:100%;min-height:680px;margin: 0 auto;margin-left:25px;vertical-align: top;display: inline-block;border-right: #ccc solid 1px;">

            </div>
        </div>
        <div style="display: inline-block;width:35%;min-width:150px;vertical-align: top;text-align: left">

        <div class="" style="margin: 0 auto;min-height: 335px;" title="成员招募">
            <!--border-bottom: #ccc solid 1px;-->
            <table class="table">
                <!--table-striped-->
                <thead>
                <th colspan="2" style="text-align: left;">
                    <span style="background-color: #4c4c4d;color: #FFF;border-radius: 8px;padding: 5px;">成员招募</span>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="text-align: left;">标题</th>
                    <th style="text-align: right;width: 25%;">发布时间</th>
                </tr>
                <?php foreach($articlesZm as $vo): ?>
                <tr onclick="location.href='<?php echo url('Article/Art_find',array('gid'=>$vo['gid'])); ?>';">
                    <td style="text-align: left;padding-left: 0;">
                        <p style="display:inline-block ;margin: 0 auto;border-color:#000;border-radius:10px;background-color: yellow;width: 100px;text-align: center;">--<?php echo $vo['article_sort']['sortname']; ?>--</p>
                        <p style="display:inline-block ;display:inline-block ;">|<?php echo $vo['title']; ?></p>
                    </td>
                    <td style="text-align: right;"><?php echo date('Y-m-d H:i:s',$vo['date']); ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <div class="" style="margin: 0 auto;min-height: 335px;" title="公告">
            <table class="table">
                <!--table-striped-->
                <thead>
                <th colspan="2" style="text-align: left;">
                    <span style="background-color: #4c4c4d;color: #FFF;border-radius: 8px;padding: 5px;">公告</span>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="text-align: left;">标题</th>
                    <th style="text-align: right;width: 25%;">发布时间</th>
                </tr>
                <?php foreach($articlesGg as $vo): ?>
                <tr onclick="location.href='<?php echo url('Article/Art_find',array('gid'=>$vo['gid'])); ?>';">
                    <td style="text-align: left;padding-left: 0;">
                        <p style="display:inline-block ;margin: 0 auto;border-color:#000;border-radius:10px;background-color: yellow;width: 100px;text-align: center;">--<?php echo $vo['article_sort']['sortname']; ?>--</p>
                        <p style="display:inline-block ;display:inline-block ;">|<?php echo $vo['title']; ?></p>
                    </td>
                    <td style="text-align: right;"><?php echo date('Y-m-d H:i:s',$vo['date']); ?></td>
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
<script type="text/javascript">
    //面包屑返回值
    var index = parent.layer.getFrameIndex(window.name);
    parent.layer.iframeAuto(index);
    $('.no-radius').on('click', function(){
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
    $(document).ready(function(){

        $(".t_Record").width($(window).width()-640);
        //当文档窗口发生改变时 触发
        $(window).resize(function(){
            $(".t_Record").width($(window).width()-640);
        });
    });


</script>
