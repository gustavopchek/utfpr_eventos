<?php 
	class NewsController extends BaseController{
		protected $title;
		
   		public function item(){}
   
   		public function show(){
   			$this->title = "Notícias";
      		$this->setHeadTitle("Notícias");
   		}
	} 
?>