<?php
/**
 * Created by IntelliJ IDEA.
 * User: lyp09
 * Date: 2018/4/19
 * Time: 14:31
 */

namespace app\index\controller;
use think\Controller;

//use app\commons\base;

class Article extends Controller
{
	public $ArticleModel;
	public $FilesModel;
	public $SortModel;
    public function __construct(){
		parent::__construct();
		$this->ArticleModel = model('ArticleList');
		//$this->FilesModel = model('ArticleFiles');
		$this->SortModel = model('ArticleSort');
	}
	
    public function articleList()
    {
		$this->assign('articlelist',$this->ArticleModel->article_select());
		//var_dump($this->ArticleModel->article_select());
        return $this->fetch('articleList');
    }

    public function articleSort()
    {
		$this->assign('sortlist',$this->SortModel->article_select());
        return $this->fetch('articleSort');
    }

    public function articleAdd()
    {
		$this->assign('sortlist',$this->SortModel->article_select());
        return $this->fetch('articleAdd');
    }
	
	public function updateSort()
    { 
		$sid=input('sid');
		$this->assign('sortlist',$this->SortModel->article_find($sid));
		return $this->fetch('assortment');
    }
	
	
	
	
	public function articleInsert()
    {
		$data = [//接受传递的参数  
                'title' => input('title'),  
                'date' => time(),
				'content' => input('content'),
				'excerpt' => input('excerpt'),
				'sortid' => input('sortid'),
				//'compositor' => input('compositor'),				
            ]; 
		$re = $this->ArticleModel->article_insert($data);
		if($re){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'保存成功！',
            );
            echo json_encode($return);
            return;
        } else {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'系统错误！',
            );
            echo json_encode($return);
            return;
        }
    }
	
	public function sort_update()
    { 
		$sid=input('sid');
		$data = [//接受传递的参数  
                'sortname' => input('sortname'),  
                'date' => time(),
				//'compositor' => input('compositor'),
				'description' => input('description'),					
            ]; 
		$re = $this->SortModel->article_update($sid,$data);
		if($re){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'保存成功！',
            );
            echo json_encode($return);
            return;
        } else {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'系统错误！',
            );
            echo json_encode($return);
            return;
        }
    }
	
	public function sortInsert()
    {
		$data = [//接受传递的参数  
                'sortname' => input('sortname'),  
                'date' => time(),
				'sid' => input('sid'),
				'description' => input('description'),
				//'compositor' => input('compositor'),
            ]; 
		$re =$this->SortModel->article_insert($data);	
		if($re){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'保存成功！',
            );
            echo json_encode($return);
            return;
        } else {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'系统错误！',
            );
            echo json_encode($return);
            return;
        }
    }
	
	
	public function articleUpdate()
    { 
		$gid=input('gid');
		$this->assign('sortlist',$this->SortModel->article_select());
		$this->assign('articlelist',$this->ArticleModel->article_find($gid));
		return $this->fetch('articleUpdate');
    }
	
	public function Art_find()
    { 
		$gid=input('gid');
		$this->assign('articlefind',$this->ArticleModel->article_find($gid));
		return $this->fetch('articleDetails');
    }
	
	public function article_update()
    { 
		$gid=input('gid');
		$data = [//接受传递的参数  
                'title' => input('title'),  
                'date' => time(),
				'content' => input('content'),
				'excerpt' => input('excerpt'),
				'sortid' => input('sortid'),
				//'compositor' => input('compositor'),				
            ]; 
		$re = $this->ArticleModel->article_update($gid,$data);
		if($re){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'保存成功！',
            );
            echo json_encode($return);
            return;
        } else {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'系统错误！',
            );
            echo json_encode($return);
            return;
        }
		/* if($this->ArticleModel->article_update($gid,$data)){
			$this->redirect('Article/articleList');
		}else{
			echo "失败";
		} */
    }
	
	public function delSort()
    {
        $sid = input('sid');
		$data = [//接受传递的参数  
                'status' => '0',  
                'date' => time(),			
            ]; 
		$re = $this->SortModel->article_update($sid,$data);
        if($re){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'删除成功！',
            );
            echo json_encode($return);
            return;
        }else{
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'删除失败！',
            );
            echo json_encode($return);
            return;
        }

    }
	
	public function delArticle()
    {
        $gid = input('gid');
		$data = [//接受传递的参数  
                'status' => '0',  
                'date' => time(),			
            ]; 
		$re = $this->ArticleModel->article_update($gid,$data);
        if($re){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'删除成功！',
            );
            echo json_encode($return);
            return;
        }else{
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'删除失败！',
            );
            echo json_encode($return);
            return;
        }

    }
	
	//多图
	public function uploads(){
		// 获取表单上传文件
		$image = "";
		$files = request()->file('');
		foreach($files as $file){
			// 移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH . 'public' . DS . '/static/admin/img_goods');
			if($info){
				// 成功上传后 获取上传信息
				// 输出 jpg
				echo $info->getExtension(); 
				// 输出 42a79759f284b767dfcb2a0197904287.jpg
				//echo $info->getFilename();
				$image = $info->getSaveName();			
			}else{
				// 上传失败获取错误信息
				echo $file->getError();
			}    
		}
		$data = [       //接受传递的参数  
                'filepath' => $image,
				'date' => time(),
            ]; 
		$this->FilesModel->article_insert($data);
	}

	/*
	 * 批量删除文章
	*/
	public function delListbatch(){
        $gids = explode(',',input('post.gids'));
        foreach ($gids as $gid) {
            $lists[] = ['gid'=>$gid,'status'=>'0'];
        }
        $flag = $this->ArticleModel->isUpdate()->saveAll($lists);
        if($flag){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'删除成功！',
            );
            echo json_encode($return);
            return;
        }else{
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'删除失败！',
            );
            echo json_encode($return);
            return;
        }
    }

    /*
	 * 批量删除分类
	*/
    public function delSortbatch(){
        $sids = explode(',',input('post.sid'));
        foreach ($sids as $sid) {
            $sort[] = ['sid'=>$sid,'status'=>'0'];
        }
        $flag = $this->SortModel->isUpdate()->saveAll($sort);
        if($flag){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'删除成功！',
            );
            echo json_encode($return);
            return;
        }else{
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'删除失败！',
            );
            echo json_encode($return);
            return;
        }
    }
}