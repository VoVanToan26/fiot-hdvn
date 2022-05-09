<?php 
/**
* 
*/
class signController extends Controller
{
	function __construct(){
		$this->folder = "default";
	}
	function index()
	{
		$this->render('sign',[]);
	}
	
}
?>