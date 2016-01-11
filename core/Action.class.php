<?php
	//模块控制器的父类
	class Action{
		
		//跳转方法:一个是成功,一个是失败
		protected function success($url,$msg,$time=1){
			//加载跳转页面
			include_once VIEW_DIR.'/redirect.html';
			exit;
		}
		
		protected function failure($url,$msg,$time=3){
			//加载跳转页面
			include_once VIEW_DIR.'/redirect.html';
			exit;
		}
		
	}