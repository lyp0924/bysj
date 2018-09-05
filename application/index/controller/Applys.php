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
use app\commons\base;

class Applys extends base
{
    /*申请加入*/
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
		$user = new User;
        if($user->get(['user_account'=>input('post.userno')])){
            $return = array(
                'errorcode'=>'0',
                'errormsg'=>'该学号用户已存在！',
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
//        var_dump($applyData);
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
     * 申请列表
     * */
    public function userAudit()
    {
        $applyMdl = new Apply;
        $allow = $applyMdl->where('status','eq',1)->count();
        $refuse = $applyMdl->where('status','eq',-1)->count();
        $wait = $applyMdl->where('status','eq',0)->count();
        $applys = collection($applyMdl->field('pwd',true)->order("status,id desc")->select())->toArray();
//        echo '<pre>';
//        var_dump($applys);
//        exit;
        $this->assign('applys',$applys);
        $this->assign('allow',$allow);
        $this->assign('refuse',$refuse);
        $this->assign('wait',$wait);
        return $this->fetch('userAudit');
    }


    /*
     * 审核加入申请
     * */
    public function applyEdit()
    {
        $applyMdl = new Apply;
        $applyData = $applyMdl->get(['id'=>input('post.id')]);

        $applyData->status = input('post.type') == '通过'?1:-1;
        $user = new User;
        $addTime = time();
        if ($applyData->status == 1) {
			if($user->get(['user_account'=>$applyData->no])){
                $return = array(
                    'errorcode'=>'0',
                    'errormsg'=>'该学号用户已存在！',
                );
                echo json_encode($return);
                return;
            }
            $user->user_name = $applyData->name;
            $user->user_account = $applyData->no;
            $user->addtime = $addTime;
            $user->role_id = '3';
            $user->user_col = $applyData->col;
            $user->user_pro = $applyData->pro;
            $user->user_cls = $applyData->cls;
            $user->user_pho = $applyData->phone;
            $user->user_password = md5(md5($applyData->pwd).$addTime);
            $userRe = $user->save();
            if ($userRe) {
                $applyRe = $applyData->save();
                if ($applyRe) {
                    $return = array(
                        'errorcode'=>'1',
                        'errormsg'=>'操作成功！',
                    );
                    echo json_encode($return);
                    return;
                }else{
                    $return = array(
                        'errorcode'=>'0',
                        'errormsg'=>'申请状态修改失败！',
                    );
                    echo json_encode($return);
                    return;
                }
            } else {
                $return = array(
                    'errorcode'=>'0',
                    'errormsg'=>'成员添加失败！',
                );
                echo json_encode($return);
                return;
            }
        } else {
            $applyRe = $applyData->save();
            if ($applyRe) {
                $return = array(
                    'errorcode'=>'1',
                    'errormsg'=>'操作成功！',
                );
                echo json_encode($return);
                return;
            }else{
                $return = array(
                    'errorcode'=>'0',
                    'errormsg'=>'申请状态修改失败！',
                );
                echo json_encode($return);
                return;
            }
        }

    }

}