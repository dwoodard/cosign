<?php

class DashboardController extends BaseController {

	/**
	 * Show the administration dashboard page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Show the page
		return View::make('admin.dashboard');
	}

}
