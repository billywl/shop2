<?php
	class IndexAction extends Action{
		//不通请求动作,不同的对应方法
		public function  index(){
			$this->view->display('index.html');
		}
		public function  top(){
			$this->view->assign('name', $_SESSION['user']['a_username']);
			$this->view->assign('time', date('Y-m-d h:i:s',$_SESSION['user']['a_last_time']));
			$this->view->display('top.html');
				
		}
		public function  drag(){
			$this->view->display('drag.html');
				
		}
		public function  menu(){
			$this->view->display('menu.html');
				
		}
		public function  main(){
			$this->view->display('main.html');
				
		}
		
	}