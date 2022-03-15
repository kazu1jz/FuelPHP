<?php

class Controller_Top extends Controller
{
	protected $header;

	public function before()
	{
		parent::before();

		$this->header = View::forge('parts/header');
	}

    public function action_index()
	{
		return Response::forge(View::forge('top/index', array('header' => $this->header)));
	}
}
