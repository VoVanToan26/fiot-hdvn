<?php 
/**
* 
*/
class dangkysanphamController extends Controller
{
	function __construct(){
		$this->folder = "default";
	}
	function index()
	{
		$this->render('dangKySanPham',[]);
	}
}
?>