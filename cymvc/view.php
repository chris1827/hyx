<?php
class view {
	protected $data = array();
	protected $tplpath = null;
	public function assign($name, $val) {
		if(is_array($name))
			foreach($name as $key=>$value){
				$this->data[$value] = $val[$key];
		}else
		$this -> data[$name] = $val;
	} 

	public function display($tplpath) {
		foreach($this -> data as $key => $value) {
			$$key = $value; //simple assign without replace {$ } in the template HTML
		} 
		include_once($tplpath);
	} 
} 

?>