<?php

class Controller_System_Admin_Logout extends Controller_System_Admin
{
	private $data;

	public function before()
	{
		parent::before();

		$this->data = [];
		$this->data['admin_header'] = $this->admin_header;
    }

    public function get_index()
	{
		return Response::forge(View::forge('system/admin/logout/index', $this->data));
	}

	public function post_index()
	{
		if (!Security::check_token()) {
			throw new HttpNoAccessException;
		}

		if (Auth::logout()) {
            return Response::redirect(Router::get('system_login_index'));
        }

		return Response::forge(View::forge('system/admin/logout/index', $this->data));
	}
}
