
<?php 
/**
* 
*/
class register_measurment_itemsController extends Controller
{
	function __construct(){
		$this->folder = "default/registerPages";
	}
	function index()
	{
		$this->render('register_measurment_items',[]);
		
	}
	
}
?>