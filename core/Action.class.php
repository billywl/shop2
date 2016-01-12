<?php
	//模块控制器的父类
	class Action{
		//增加一个视图类的属性
		protected  $view;
		
		//增加构造方法
		public function __construct(){
			$this->view=new View();
		}
		
		//跳转方法:一个是成功,一个是失败
		protected function success($url,$msg,$time=1){
			//加载跳转页面
			//分配数据
			$this->view->assign('url',$url);
			$this->view->assign('msg',$msg);
			$this->view->assign('time',$time);
			
			
			//加载跳转页面
			$this->view->display('redirect.html');
			exit;
		}
		
		protected function failure($url,$msg,$time=3){
			//分配数据
			$this->view->assign('url',$url);
			$this->view->assign('msg',$msg);
			$this->view->assign('time',$time);
			
			
			//加载跳转页面
			$this->view->display('redirect.html');
			exit;
		}
		
	}