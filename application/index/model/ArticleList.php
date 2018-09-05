<?php
namespace app\index\model;

use think\Model;
class ArticleList extends Model{

    public function articleSort(){
        return $this->belongsTo('ArticleSort','sortid','sid');
    }

    public function article_insert($data=array()){
        return $this->insert($data);
    }

    public function article_delete($id){
        return $this->delete($id);
    }

    public function article_update($gid,$data=array()){
        return $this->where('gid','eq', $gid)->update($data);
    }

	public function article_select(){
        $articles = collection($this->where('status','eq', '1')->with('articleSort')->order('date','DESC')->select())->toArray();
		return $articles;
	}

    public function article_find($id){
        return $this->find($id);
    }
}