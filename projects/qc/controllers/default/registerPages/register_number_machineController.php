
<?php 
/**
* 
*/
class register_number_machineController extends Controller
{
	function __construct(){
		$this->folder = "default/registerPages";
	}
	function index()
	{
		$this->render('register_number_machine',[]);
		
	}
	
}
?>