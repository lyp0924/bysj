<?php

namespace app\index\model;

use think\Model;

class UserLogs extends Model
{
    public function getLogs($user_id){
        $userLogs = collection($this->order('login_time','desc')->with('user')->where(['user_id'=>$user_id])->select())->toArray();
        return $userLogs;
    }

    public function getLastLog($user_id){
        $userLogs = collection($this->order('login_time','desc')->with('user')->where(['user_id'=>$user_id])->select())->toArray();
        return $userLogs[0];
    }
    public function user()
    {
        return $this->belongsTo('User');
    }
}
