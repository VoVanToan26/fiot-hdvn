<?php

/**
 * 
 */
class reset_measuring_toolsController extends Controller
{
	function __construct()
	{
		$this->folder = "default/informationManage";
	}
	function index()
	{
		$this->render('reset_measuring_tools', []);
	}
}