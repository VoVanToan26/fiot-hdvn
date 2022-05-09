<?php

/**
 * 
 */
class reset_approval_noticeController extends Controller
{
	function __construct()
	{
		$this->folder = "default/informationManage";
	}
	function index()
	{
		$this->render('reset_approval_notice', []);
	}
}