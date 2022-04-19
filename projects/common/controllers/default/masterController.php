
<?php 
/**
* 
*/
class masterController extends Controller
{
	function __construct(){
		$this->folder = "default";
	}
	function index()
	{
		$this->render('master',[]);
	}
	
}
?>