<?php
	//视图类
	class View{
		//属性
		private $data;
		
		/**
		 * 加载模版
		 * @param string $template 要加载的模版文件
		 */
		public function  display($template){
			//include_once VIEW_DIR."/$template";
			//1, 加载整个文件到字符串
			$str=file_get_contents(VIEW_DIR."/".MODULE."/$template");
			
			//2, 数据替换
			foreach($this->data as $key=>$value){
				//key=url,value="index.php?module
				$str=str_replace("{".$key."}", $value,$str);
			}
			echo $str;
			exit;
		}
		
		
		/**
		 * 用来保存数据,吧数据放到data属性 
		 * @param string $key 包保存的数据(变量名)
		 * @param string $value 要保存的值
		 */
		public function assign($key,$value){
			$this->data[$key]=$value;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}