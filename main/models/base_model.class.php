<?php
	class BaseModel{		
		public function __construct($data = array()){
			$this->setData($data);
		}

		public function setData($data){
			foreach ($data as $key => $value) {
				$method = $this->snakToCamelCase("set_$key");
				$this->$method($value);
			}
		}

		//função para conveter campos do DB do formato snak_case para formato camelCase utilizado nas classes
	    public function snakToCamelCase($value){
			$value = str_replace("_", " ", $value);
			$value = lcfirst(str_replace(" ", "", ucwords($value)));
			return $value;
	    }

	    //retorna data no formato yyyy-mm-dd hh:mm:ss
	    function formatDateTime($date, $format = "Y-m-d H:i:s"){
			$date = str_replace("/", "-", trim($date));
			return (strlen($date) < 10) ? NULL : date($format, strtotime($date));
	    }
	}
?>