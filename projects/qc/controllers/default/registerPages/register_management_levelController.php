
<?php 
/**
* 
*/
class register_management_levelController extends Controller
{
	function __construct(){
		$this->folder = "default/registerPages";
	}
	function index()
	{
		$this->render('register_management_level',[]);
		
	}
	
}
?>