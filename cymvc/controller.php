<?php
/**
 *  @description:cycms controller 
 *  @date:2012-7-9 Monday
 *  @author:chris.yang
 */
class controller {
	protected $view = null;
	protected $model = null;
	public function controller() {
		require_once(CYMVC . '/view.php');
		$this -> view = new view();
	} 
	// rewrite display
	public function display() {
	    $class = get_class($this);
		$tplname = isset($_REQUEST['a'])?$_REQUEST['a']:'';
		$tplname = empty($tplname)?'index':$tplname;	
		$tplpath = APP . '/v/'.$class.'/'. $tplname . '.html';
		if(!file_exists($tplpath))
			die('Template file does not exist');
		$this -> view -> display($tplpath);
	} 
	// rewrite assign
	public function assign($name, $val) {
		$this -> view -> assign($name, $val);
	} 

	public function M($table) {
		require_once(CYMVC . '/model.php');
		$c = isset($_REQUEST['c'])?$_REQUEST['c']:'index';
		$mpath = APP . '/m/' . $c . '.php';
		$m = 'model';
		if (file_exists($mpath)) {
			require_once($mpath);
			$m = $c . 'Model';
		} 
		return 	$this -> model = new $m($table);
	} 
} 

?>