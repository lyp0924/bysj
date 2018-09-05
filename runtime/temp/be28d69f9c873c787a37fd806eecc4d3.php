<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/data/www/default/bysj/public/../application/index/view/article/assortment.html";i:1525851212;}*/ ?>
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
<!--添加文章分类图层-->
<div id="addsort_style" class="article_style">
 <div class="add_content" id="form-article-add">
    <ul>
     <li class="clearfix Mandatory"><label class="label_name"><i>*</i>分类名称</label>
     <span class="formControls w_txt"><input name="分类名称" value="<?php echo $sortlist['sortname']; ?>" type="text" id="form-sortname" class="col-xs-7 col-sm-5 "></span>
     </li>
	 <input name="sid" type="hidden" id="form-sid" value="<?php echo $sortlist['sid']; ?>">
     <!--<li class="clearfix"><label class="label_name">排序</label>
     <span class="formControls w_txt"><input name="compositor" value="<?php echo $sortlist['compositor']; ?>" type="text" id="form-compositor" value="0" class="col-xs-7 col-sm-2 "></span>
     </li>-->
     <li class="clearfix"><label class="label_name">简介</label>
     <span class="formControls w_txt"><textarea name="权限描述" class="form-control" id="form-description" placeholder="" onkeyup="checkLength(this);"><?php echo $sortlist['description']; ?></textarea><span  style=" margin-left:10px;">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></span>
     </li>
    </ul>
	
	<div class="Button_operation">
		<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit">保存</button>
		<span onclick="window.parent.location.reload();layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;关闭&nbsp;&nbsp;</span>
	</div>
 </div>
</div>
</body>
</html>
<script type="text/javascript">
	/**提交操作**/
function article_save_submit(){
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
				$.ajax({
				url:'/index.php/index/Article/sort_update.html',
				type:'POST',
				dataType:'json',
				data:'sortname='+$("#form-sortname").val()+'&description='+$("#form-description").val()+'&sid='+$("#form-sid").val(),
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
</script>
