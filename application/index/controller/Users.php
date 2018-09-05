<?php
/**
 * Created by IntelliJ IDEA.
 * User: lyp09
 * Date: 2018/4/15
 * Time: 10:38
 */

namespace app\index\controller;

use app\index\model\Apply;
use app\index\model\User;
use app\index\model\Role;
use app\commons\base;
use app\index\model\UserLogs;
use think\Session;

class Users extends base
{
    /*
     * 登录页面
     */
    public function login()
    {
        if (Session::has('user_id')){
            $this->error('您已登录，请先退出！','index/Index/index');
        } else {
            return $this->fetch('login');
        }
    }

    /*
     * 登出
     */
    public function logout()
    {
        Session::set('user_id',null);
        $this->redirect('/index.php');
    }

    /*
     * 登录请求处理
     */
    public function userLogin()
    {

        if (!$this->checkCaptcha($_POST['ident'])) {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'验证码错误！',
            );
            echo json_encode($return);
            return;
        }
        $users = new User;

        $user = $users->with('role')->where('user_account=\''.$_POST['user_account'].'\' and status=\'1\'')->select();
        //var_dump($user);
        $user = $user[0];
        if ($user->role->status == '0'){
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'账号不存在！',
            );
        } elseif (count($user) == 1) {

            if ($user->user_password == md5($_POST['user_password'].$user->addtime)){
                Session::set('user_id',$user->user_id);
                $ipinfo = $this->getIpInfo();
                $userLogs = new UserLogs;
                $userLogs->user_id = $user->user_id;
                $userLogs->login_ip = $ipinfo['data']['ip'];
                $userLogs->login_time = time();
                $userLogs->login_addr = $ipinfo['data']['country'].'-'.$ipinfo['data']['region'].'-'.$ipinfo['data']['city'];

                if($userLogs->save()){
                    $return = array(
                        'errorcode'=>'1',
                        'errormsg'=>'登录成功！',
                    );
                }else{
                    $return = array(
                        'errorcode'=>'0',
                        'errormsg'=>'登录失败！',
                    );
                }

            } else {
                $return = array(
                    'errorcode'=>'0',
                    'errormsg'=>'账号或密码错误！',
                );
            }
        } else {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'账号或密码错误！',
            );
        }

        echo json_encode($return);
        return;
    }

    /*
     * 申请加入页面
     */
    public function applyToJoin()
    {
        return $this->fetch('applyToJoin');
    }

    /*
     *提交申请
    */
    public function submitApply(){
        $ident = input('post.ident');
        if (!$this->checkCaptcha($ident)) {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'验证码错误！',
            );
            echo json_encode($return);
            return;
        }
        $applyData = array(
            'no'=>input('post.userno'), //学号
            'pwd'=>input('post.userpwd'),//密码
            'col'=>input('post.usercol'),//学院
            'pro'=>input('post.userpro'),//专业
            'cls'=>input('post.usercls'),//班级
            'phone'=>input('post.userpho'),//手机号
            'name'=>input('post.username'),//姓名
            'submittime'=>time(),//提交时间
        );
        $apply = new Apply;
        $re = $apply->save($applyData);
        if($re){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'申请提交成功！',
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
     * 用户列表
     */
    public function userList($role_id)
    {
        $role = new Role;
        $user = new User;
        $nowUser = $user->get(Session::get('user_id'));
        $nowRole = $role->get($nowUser->role_id);

        $roles = collection($role->order('role_id','asc')
            ->where("status='1' and role_lv <'".$nowRole->role_lv."'")->select())->toArray();
        if ($role_id == 0){
            $users = collection($user->order('user_id','asc')->field('user_password',true)
                ->with('role')->where('status=\'1\'')->select())->toArray();
        } else {
            $users = collection($user->order('user_id','asc')->field('user_password',true)
                ->with('role')->where('status=\'1\' and role_id='.$role_id)->select())->toArray();
        }
//        echo '<pre>';
        foreach ($users as $key=>$user) {
            if ($user['role']['role_lv'] >= $nowRole->role_lv) {
                unset($users[$key]);
            }
        }
        $this->assign('roles',$roles);
        $this->assign('users',$users);
        return $this->fetch('userList');
    }

    /*
     * ajax 获取用户列表
    */
    public function ajaxGetUserList()
    {
        $role_id = input('post.role_id');
        $user = new User;
        if ($role_id == 0) {
            $users = collection($user->order('user_id','asc')->field('user_password',true)
                ->with('role')->where('status','eq','1')->select())->toArray();//where('role_id','eq',$role_id)->
        } else {
            $users = collection($user->order('user_id','asc')->field('user_password',true)
                ->with('role')->where('status=\'1\' and role_id='.$role_id)->select())->toArray();
        }

        echo json_encode($users);
        return;
    }

    /*
    *删除用户
    */
    public function delUser()
    {
        $user = New User;
        $user->user_id = input('post.user_id');
        $user->status = '0';
        if($user->isUpdate()->save()){
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
     * 用户批量删除
     */
    public function delbatch()
    {
        $user_ids = explode(',',input('post.user_ids'));
        foreach ($user_ids as $user_id) {
            $users[] = ['user_id'=>$user_id,'status'=>'0'];
        }
        $user = New User;
        $flag = $user->isUpdate()->saveAll($users);
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
     * 编辑用户界面
     */
    public function editUser($userId)
    {
        $user = New User;
        $usermsg = $user->get($userId);
        $role = new Role;
        $nowUser = $user->get(Session::get('user_id'));
        $nowRole = $role->get($nowUser->role_id);
        $roles = collection($role->order('role_id','asc')
            ->where("status='1' and role_lv<".$nowRole->role_lv)->select())->toArray();
        $this->assign('roles',$roles);
        $this->assign('user',$usermsg);
        return $this->fetch('editUser');
    }

    /*
     * 编辑用户保存
     */
    public function saveEditUser()
    {
        $user = New User;
        $role = New Role;
        $usermsg = $user->get(input('post.user_id'));
        $nowUser = $user->get(Session::get('user_id'));
        $userRole = $role->get($usermsg->role_id);
        $nowRole = $role->get($nowUser->role_id);
        if ($userRole->role_lv >= $nowRole->role_lv ) {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'权限等级不够！',
            );
            echo json_encode($return);
            return;
        }

        if (input("post.user_pro") != ''){
            $usermsg->user_pro = input("post.user_pro");
            $usermsg->user_col = input("post.user_col");
            $usermsg->role_id = input("post.role_id");
        }

        $usermsg->user_id = input("post.user_id");
        $usermsg->user_pho = input("post.user_pho");
        $usermsg->user_name = input("post.user_name");
        $flag = $usermsg->isUpdate()->save();

        if($flag || $flag === 0){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'修改成功！',
            );
            echo json_encode($return);
            return;
        } else {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'修改失败！',
            );
            echo json_encode($return);
            return;
        }
    }

    /*修改密码*/
    public function savePwd(){
        $user = new User;
        $usermsg = $user->get(input('post.user_id'));
        $nowUser = $user->get(Session::get('user_id'));

        $role = New Role;
        $userRole = $role->get($usermsg->role_id);
        $nowRole = $role->get($nowUser->role_id);

        if (input('post.password')) {
            if ($usermsg->user_password != md5(md5(input('post.password')).$usermsg->addtime)){
                $return = array(
                    'errorcode'=>'0',
                    'errormsg'=>'原密码错误！',
                );
                echo json_encode($return);
                return;
            }
        } elseif ($nowUser->user_id != $usermsg->user_id && $userRole->role_lv >= $nowRole->role_lv) {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'权限等级不够！',
            );
            echo json_encode($return);
            return;
        }


        $usermsg->user_password = md5(md5(input('post.pwd')).$usermsg->addtime);
        $flag = $usermsg->isUpdate()->save();
        if($flag || $flag === 0){
            $return = array(
                'errorcode'=>'1',
                'errormsg'=>'修改成功！',
            );
            echo json_encode($return);
            return;
        } else {
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'修改失败！',
            );
            echo json_encode($return);
            return;
        }
    }

    /*
     * 用户信息
     * */
    public function userInfo()
    {
        $user = new User;
        $usermsg = $user->get(Session::get('user_id'));
        $userLogs = new UserLogs;
        $userLogs = $userLogs->getLogs(Session::get('user_id'));
        $this->assign('user',$usermsg);
        $this->assign('userLogs',$userLogs);
        return $this->fetch('userInfo');
    }

}