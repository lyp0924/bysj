<?php
/**
 * Created by IntelliJ IDEA.
 * User: lyp09
 * Date: 2018/4/15
 * Time: 10:38
 */

namespace app\index\controller;

use app\index\model\Role;
use app\index\model\Permission;
use app\commons\base;

class Roles extends base
{
    /*
     * @name roleManager
     * 角色管理 角色列表
     */
    public function roleManager()
    {
        $role_mdl = new Role;
        $roles = $role_mdl->select();
        foreach ($roles as &$role){
            $role['permission'] = $role_mdl->getPermission($role['role_p']);
        }

        $this->assign('roles',$roles);
        return $this->fetch('roleManager');
    }

    /*
     * 添加角色 编辑角色
     */
    public function roleAdd($role_id = null)
    {
        $permissions = array();
        $permissionMdl = new Permission;
        $permissionParents = collection($permissionMdl->all(['parent'=>'0']))->toArray();
        if ($role_id !== null){
            $role = new Role;
            $roleMsg = $role->get($role_id);
            $this->assign('roleMsg',$roleMsg);
        }
        foreach ($permissionParents as $permissionParent) {
            $permissionChilds = collection($permissionMdl->order('parent','asc')
                ->where('parent='.$permissionParent['id'].' and status="1"')->select())->toArray();
            foreach ($permissionChilds as $permissionChild){
                $permissions[$permissionParent['id']][] =  $permissionChild;

            }
        }
        $this->assign('permissions',$permissions);
        $this->assign('permissionParents',$permissionParents);
        return $this->fetch('roleAdd');
    }

    /*
     * 新建角色提交
     */
    public function submitRole()
    {
        $role = new Role;
        $roleData = array(
            'role_name'=>input('post.name'), //名称
            'status'=>input('post.status'),//地址
            'role_p'=>input('post.parent'),//父类
            'role_lv'=>input('post.role_lv'),//父类
        );
//        var_dump(input('post.parent'));
        if (input('post.role_id') != ''){
            $roleData['role_id'] = input('post.role_id');
            $re = $role->isUpdate()->save($roleData);
        } else {
            $re = $role->save($roleData);
        }
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



    /*
    *禁用角色
    */
    public function delRole()
    {
        $role = New Role;
        $role->role_id = input('post.role_id');
        $role->status = input('post.status');
        if($role->isUpdate()->save()){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'成功！',
            );
            echo json_encode($return);
            return;
        }else{
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'失败！',
            );
            echo json_encode($return);
            return;
        }

    }

}