<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use xinfeng\Auth\loginRegister;
use Request;
use Mail;
use Session;
use validator;
use xinfeng\User; // 模型


class UserController extends Controller {

    protected $lR;

    public $remeber;

    public function __construct(loginRegister $lR) {

		$this->lR = $lR;
		//$this->middleware('guest', ['except' => 'getLogout']);,'except' => 'postEmailexist' ,'except' => 'getRegister' ,
	    $this->middleware('user' , ['except' => ['getRegister' , 'postEmailexist' , 'postRegister' ,'registerEmailCheck']  ]);
	}

	public function getRegister() {
		return view('user.register')->withTitle('注册 ');
	}

	public function getLogin() {
		return view('user.login')->withTitle('登录');
	}

	public function postLogin() {
        
        $this->lR->validate();

		if($this->lR->checkUser() ) {
			if($this->lR->setRemember() ) {
				return response(1)->withCookie(cookie('remember_token', $this->lR->remeber, 14400) );
			} else {
				print_r(redirect()->intended() );
			}
		    
		} else {
			echo 0;
		}
		//setcookie("user", "Alex Porter", time()+3600);

		/*
		 return view('user.home')->with('results' , $this->lR->results)
        ->withTitle('登录成功'); //->withCookie(cookie('remember_token' , $remeber) );*/
       // return redirect()->action('User\UserController@view');

	}

	public function getLogout() {
		$this->user->logout();
		return redirect('index');
	}

	public function postRegister() {
		//echo ' ia register';
		if(session::pull('captcha')==true){
       //print_r(request::all() );

		$this->lR->register();
	} else {
		abort(404);
	}
}

	public function registerEmailCheck () {
        $this->lR->registerEmailCheck();
          // return redirect('all');
        return view('user.home')->with('results' , $this->lR->results)
        ->withTitle('jjjj');
	}

	public function postEmailexist() {
		//echo 'jjj';
		$this->lR->checkIsExist();
	}

	public function view() {
		return view('user.home')
        ->withTitle('jjjj');
	}

	

	public function getResetemailsend() {
		$this->lR->resetEmailSend();
		echo 1;
	}

	

	public function PostResetPsw() {
		$this->lR->resetPsw();
	}



}

