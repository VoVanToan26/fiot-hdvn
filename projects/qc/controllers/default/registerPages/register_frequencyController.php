
<?php 
/**
* 
*/
class register_frequencyController extends Controller
{
	function __construct(){
		$this->folder = "default/registerPages";
	}
	function index()
	{
		$this->render('register_frequency',[]);
		
	}
	
}
?>