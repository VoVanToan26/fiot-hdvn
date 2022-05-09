
<?php 
/**
* 
*/
class register_measurement_items_nameController extends Controller
{
	function __construct(){
		$this->folder = "default/registerPages";
	}
	function index()
	{
		$this->render('register_measurement_items_name',[]);
		
	}
	
}
?>