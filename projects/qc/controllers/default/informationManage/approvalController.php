<?php

/**
 * 
 */
class approvalController extends Controller
{
	function __construct()
	{
		$this->folder = "default/informationManage";
	}
	function index()
	{
		$this->render('approval', []);
	}
}