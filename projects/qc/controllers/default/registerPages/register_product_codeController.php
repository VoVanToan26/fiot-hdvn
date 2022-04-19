
<?php 
/**
* 
*/
class register_product_codeController extends Controller
{
	function __construct(){
		$this->folder = "default/registerPages";
	}
	function index()
	{
		$this->render('register_product_code',[]);
		
	}
	
}
?>