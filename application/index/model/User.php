<?php

namespace app\index\model;

use think\Model;

class User extends Model
{
    public function role()
    {
        return $this->belongsTo('Role');
    }

    public function getUserPermission($user_id)
    {
        $userMsg = collection($this->where('user_id','eq',$user_id)->with('role')->field('user_password',true)->select())->toArray();
        $permissionMdl = new Permission;
        $permission_ids = explode(',',$userMsg[0]['role']['role_p']);
        $permissions = collection($permissionMdl->all($permission_ids))->sort()->toArray();
        foreach ($permissions as $permission) {
            $order[] = $permission['order'];
        }
        array_multisort($order,$permissions,SORT_NUMERIC);
//        echo '<pre>';
//        var_dump($permissions);
//        var_dump($order);
//        exit;
        foreach ($permissions as $permission){
            $p[$permission['parent']][] = $permission;
        }

        return $p;
    }
}
