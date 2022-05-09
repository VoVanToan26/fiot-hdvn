<?php

/**
 * 
 */
class XRsController extends Controller
{
	function __construct()
	{
		$this->folder = "default/informationManage/formsList/";
	}
	function index()
	{
		$this->render('XRs', []);
	}
}