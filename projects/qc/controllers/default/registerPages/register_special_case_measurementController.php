
<?php 
/**
* 
*/
class register_special_case_measurementController extends Controller
{
	function __construct(){
		$this->folder = "default/registerPages";
	}
	function index()
	{
		$this->render('register_special_case_measurement',[]);
		
	}
	
}
?>