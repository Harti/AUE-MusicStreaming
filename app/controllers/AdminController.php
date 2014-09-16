<?php

class AdminController extends BaseController {

	public function getCharts()
	{
		return View::make('admin.charts');
	}

	public function getIndex()
	{
		return View::make('admin.index');
	}
}
