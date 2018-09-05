<?php
namespace app\index\model;
use think\Model;
use think\Db;
class ArticleFiles extends Model{
	public $ArticleFilesModel;
    public function __construct(){
		parent::__construct();
		$this->ArticleFilesModel = Db::table('article_files');
	}
	
	public function article_insert($data=array()){
		// $staff = array
		// (
		 // array("number" => "3","imgtop" => "/static/index/img_goods/sp7.jpg"), 
		 // array("number" => "3","imgtop" => "/static/index/img_goods/sp8.jpg"), 
		// );
		//$str = serialize($staff);
		//$str = json_encode($staff);
		//$data = ['carousel_figure' => $str];
		/* echo '<pre>';
		echo $str;
		var_dump($data); */
		//$data['title']=$_POST['title'];
		/* $data['title']="dddd";
		$data['date']="1514340340";
		$data['content']="34343434"; */
		/* $data = [       //接受传递的参数  
                'title' => $_POST['title'],  
                'date' => 1514340340,
				'content' => 'dfdfdf',
				]; */ 
		return $this->ArticleFilesModel->insert($data);
			
	}
	
	public function article_delete($id){
		return $this->ArticleFilesModel->delete($id);
	}
	
	public function article_update($id){
		return $this->ArticleFilesModel->where('id', $id)->update();
	}
		
	public function article_select(){
		return $this->ArticleFilesModel->select();
	}
	
	public function article_find($id){
		return $this->ArticleFilesModel->find($id);
	}
}

// 写入数据库之前
//$staff_serialize = serialize($staff);            // 序列化成字符串
//$staff_json = json_encode($staff);               // JSON编码数组成字符串


// 读取数据库后
//$staff_restore = unserialize($staff_serialize);  // 反序列化成数组
//$staff_dejson = json_decode($staff_json, true);  // JSON解码成数组