<?php

class AppController extends BaseController {

	protected $layout = 'layouts.default';


	public function index()
	{

		$this->layout->content = View::make('app');	
	}
}