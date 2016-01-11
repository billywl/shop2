<?php
	//权限模块
	class PrivilegeAction extends Action{
		
		//方法:与action的值一致
		public function login(){
			include_once VIEW_DIR.'/login.html';
		}
		
		//登录验证
		public function signin(){
			//接收验证
			$username=isset($_POST['username'])?$_POST['username']:'';         
			$password=isset($_POST['password'])?$_POST['password']:'';         
			$captcha=isset($_POST['captcha'])?$_POST['captcha']:'';

			//合法性验证
			if(empty($captcha)){
				$this->failure('index.php', '验证码不能为空',3);
			}
			if(empty($captcha)||empty($password)){
				$this->failure('index.php', '账号密码不能为空',3);
			}
			
			//验证有效性
			if(!Captcha::checkCaptcha($captcha)){
				$this->failure('index.php', '验证码错误',3);
			}
			
			//验证用户信息(操作数据库,模型)
			$admin=new AdminModel();
			$user=$admin->checkByUsernameAndPassword($username, $password);
			if ($user){
				//成功
				$_SESSION['user']=$user;
				
				//更新用户信息
				$admin->updateLoginInfo($user['a_id']);
				//$this->success('index.php?module=index&action=index', '登录成功');
				$this->success('test.php','登录成功');
			}else{
				//失败
				$this->failure('index.php','登录失败',3);
			}
			
			

		}
		
		public function captcha(){
			//获取验证码
			$captcha=new Captcha();
			//修改响应头
			header('content-type:image/png');
			$captcha->generateCaptcha();
		}
	}