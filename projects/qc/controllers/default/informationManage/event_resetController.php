<?php

/**
 * 
 */
class event_resetController extends Controller
{
	function __construct()
	{
		$this->folder = "default/informationManage";
	}
	function index()
	{
		$this->render('event_reset', []);
	}
}