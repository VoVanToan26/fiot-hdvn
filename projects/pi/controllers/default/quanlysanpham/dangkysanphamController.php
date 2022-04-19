<?php 
/**
* 
*/
class dangkysanphamController extends Controller
{
	function __construct(){
		$this->folder = "default/quanlysanpham";
	}
	function index()
	{
		$this->render('dangKySanPham',[]);
	}
}
?>