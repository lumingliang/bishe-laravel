<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use xinfeng\Auth\loginRegister;
use Request;
use Mail;
use Session;
use validator;
use xinfeng\User;

class PasswordController extends Controller {
	protected $lR;

	public function __construct(loginRegister $lR) {

		$this->lR = $lR;
		//$this->middleware('guest', ['except' => 'getLogout']);
	  //  $this->middleware('user' , ['except' => 'getLogout' ,'except' => 'postEmailexist' ]);
	}
    //获取邮箱验证视图
	public function getReset() {
        return view('user.resetPswEmail')->withTitle('重置密码');
	}
    //验证邮箱激活并返回重置视图
	public function getResetcheck() {
		//echo 'hh';

		$this->lR->resetcheck();
		return view('user.resetPsw')->withTitle('重置密码');
		
		//return response()->json(['status' => 302, 'location' => $url]);
	}
    //发送验证邮件
	public function postEmailsend() {
		//echo 'hhh';
        $this->lR->resetEmailSend();
	}
    //重置密码
	public function postReset() {
		$this->lR->resetPsw();
	}
}