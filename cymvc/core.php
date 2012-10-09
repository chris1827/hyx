 <?php
 /**
  *  @description:core file in cymvc frame
  *  @date:2012-7-6 Friday
  *  @author:chris.yahn
  */
class core{
	function core(){
			
		$this->load();	
		$this->run();	
	
	}

	//load basic system files
	function load(){
		require_once(CYMVC.'/mysql.php');
		require_once(CYMVC.'/model.php');
		require_once(CYMVC.'/view.php');
		require_once(CYMVC.'/controller.php');
	}

    //run your app 
	function run(){
		$c = isset($_REQUEST['c'])?$_REQUEST['c']:'index';
		$a = isset($_REQUEST['a'])?$_REQUEST['a']:'index';
		$cpath = APP.'/c/'.$c.'.php';
		if(!file_exists($cpath)) die('Controller does not exist.');
		require_once($cpath);
        $obj = new $c;

		$a = $a.'Action';
		if(!method_exists($c,$a)) die('Method does not exsit.');
		$obj->$a();
	}
}



 ?>
