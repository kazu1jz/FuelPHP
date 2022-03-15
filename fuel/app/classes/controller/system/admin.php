<?php

class Controller_System_Admin extends Controller_System
{
	protected $admin_header;

	public function before()
	{
		parent::before();

		if (!Auth::check()) {
			return Response::redirect(Router::get('system_login_index'));
		}

		$this->admin_header = View::forge('parts/admin_header');
	}

    public function action_index()
	{
		return Response::forge(View::forge('system/admin/index', array('admin_header' => $this->admin_header)));
	}
}
