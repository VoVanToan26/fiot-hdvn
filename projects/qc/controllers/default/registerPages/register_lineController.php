
<?php 
/**
* 
*/
class register_lineController extends Controller
{
	function __construct(){
		$this->folder = "default/registerPages";
	}
	function index()
	{
		$this->render('register_line',[]);
		
	}
	
}
?>