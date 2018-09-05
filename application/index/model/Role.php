<?php

namespace app\index\model;

use think\Model;

class Role extends Model
{
    public function getPermission($role_p)
    {
        $permissions = collection(Permission::all($role_p))->toArray();
        foreach ($permissions as $permission) {
            $p[$permission['id']] = $permission['title'];
        }
        return $p;
    }
}
