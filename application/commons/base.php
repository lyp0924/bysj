<?php
/**
 * Created by IntelliJ IDEA.
 * User: lyp09
 * Date: 2018/4/11
 * Time: 22:02
 */
namespace app\commons;

use think\captcha\Captcha;
use think\Controller;
use think\Request;
use think\Session;

class base extends Controller
{
    private $controllerName;
    private $moduleName;
    private $actionName;
    private $beforeNeedle = [

                            'index'=>
                                [
                                    'Users'=>['except'=>'login,userLogin,getCaptcha,applyToJoin,submitApply,getIpInfo'],
                                    'Index'=>'all',
                                    'Roles'=>'all',
                                    'Permissions'=>'all',
                                    'Applys'=>['except'=>'applyToJoin,submitApply'],
                                    'Article'=>'all',
                                ],
                            ];

    protected $beforeActionList;// = ['checkLogin'=>['only'=>'test']];

    public function _initialize()
    {
        $this->controllerName = request()->controller();
        $this->moduleName = request()->module();
        $this->actionName = request()->action();
        if ($this->beforeNeedle[$this->moduleName][$this->controllerName] == 'all'){
            $this->beforeActionList = ['checkLogin'];
        } else {
            $this->beforeActionList = ['checkLogin'=>$this->beforeNeedle[$this->moduleName][$this->controllerName]];
        }
    }
    public function __construct()
    {
        parent::__construct();
    }

    public function checkLogin(){
        if ($this->moduleName == 'admin') {
            if (!Session::has('user_id')) {
                $this->error('请先登录', '/index.php/admin/index/login');
            }
        }else {
            if (!Session::has('user_id')) {
                $this->error('请先登录', '/index.php/index/index/login');
            }
        }
    }

    public function getCaptcha($time){
        $captcha_conf =['length'=>4,'fontSize'=>30,'useCurve'=>false];
        $captcha = new Captcha($captcha_conf);
        return $captcha->entry();
    }

    public function checkCaptcha($code){
        $captcha = new Captcha();
        return $captcha->check($code);
    }

    public function getIpInfo()
    {
//        exit;
        $request = Request::instance();
        $ip = $request->ip();
//        var_dump($ip);exit;
//        if($ip === 0 || $ip === 1){
//
//        } else {
//            $ip = '183.203.223.44';
//        }


        $url='http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
        $result = file_get_contents($url);
        $result = json_decode($result,true);
//        var_dump($result);
        return $result;
    }
}