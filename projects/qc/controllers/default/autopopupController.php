
<?php 
/**
* 
*/
class autopopupController extends Controller
{
	function __construct(){
		$this->folder = "default";
	}
	function index()
	{
		$this->render('autopopup',[]);
	}
	
}
?>