<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/data/www/default/bysj/public/../application/index/view/article/articleDetails.html";i:1525742061;}*/ ?>
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
		<!--<link rel="stylesheet" type="text/css" href="/static/admin/css/webuploader.css" />-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/static/admin/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/static/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/static/admin/assets/js/bootstrap.min.js"></script>
		<script src="/static/admin/assets/js/typeahead-bs2.min.js"></script>  	         	
        <script src="/static/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/static/admin/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/static/admin/js/H-ui.js" type="text/javascript"></script>
<title>详情</title>
</head>

<body>
<div class="margin clearfix">
 <div class="article_style">
    <div class="add_content" id="form-article-add">
     <ul>
      <li class="clearfix Mandatory" style="text-align: center;">
          <span class="formControls col-10"><h2><?php echo $articlefind['title']; ?></h2><span style="font-size: 14px;"><?php echo date('Y-m-d H:i:s',$articlefind['date']); ?></span></span>
          <hr/>
      </li>
	  <li class="clearfix">
          <span class="formControls col-10">
            <?php echo $articlefind['content']; ?>
          </span>
      </li>
     </ul>
    </div>
 </div>
</div>
</body>
</html>
<script type="text/javascript" src="/static/admin/Widget/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/Widget/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/static/admin/Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script> 
<script type="text/javascript">

