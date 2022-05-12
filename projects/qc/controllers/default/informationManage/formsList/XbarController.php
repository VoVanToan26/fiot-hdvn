<?php

/**
 * 
 */
class XbarController extends Controller
{
	function __construct()
	{
		$this->folder = "default/informationManage/formsList/";
	}
	function index()
	{
		$this->render('Xbar', []);
	}
}