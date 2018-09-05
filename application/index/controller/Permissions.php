<?php
/**
 * Created by IntelliJ IDEA.
 * User: lyp09
 * Date: 2018/4/15
 * Time: 10:38
 */

namespace app\index\controller;

use app\index\model\Permission;
use app\commons\base;

class Permissions extends base
{
    /*
     * 权限管理
     */
    public function adminCompetence()
    {
        $permissionMdl = new Permission;
        $permissionParents = collection($permissionMdl->all(['parent'=>'0']))->toArray();
        $permissions = collection($permissionMdl->all(function ($query){
            $query->order('parent', 'asc');
        }))->toArray();
        array_unshift($permissionParents,array('title'=>'顶级父类','id'=>'0'));
        foreach ($permissionParents as $permissionParent) {
            $p[$permissionParent['id']] = $permissionParent;
        }
        $permissionParents = $p;
        $this->assign('permissionParents',$permissionParents);
        $this->assign('permissions',$permissions);
        return $this->fetch('adminCompetence');
    }

    /*
     * 添加权限
     */
    public function permissionAdd()
    {

        $permissionMdl = new Permission;
        $permissionData = array(
            'title'=>input('post.title'), //名称
            'url'=>input('post.url'),//地址
            'parent'=>input('post.parent'),//父类
            'addtime'=>time(),
            'order'=>input('post.order'),
        );
        $re = $permissionMdl->save($permissionData);
        if($re){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'添加成功！',
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



    /*
    *禁用权限
    */
    public function delPermission()
    {
        $permission = New Permission;
        $permission->id = input('post.id');
        $permission->status = input('post.status');
        if($permission->isUpdate()->save()){
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