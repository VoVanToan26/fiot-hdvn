<?php

/**
 * 
 */
class reset_measurement_itemsController extends Controller
{
	function __construct()
	{
		$this->folder = "default/informationManage";
	}
	function index()
	{
		$this->render('reset_measurement_items', []);
	}
}