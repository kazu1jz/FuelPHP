<?php

class Controller_System_Admin_Password extends Controller_System_Admin
{
	private $data;

	public function before()
	{
		parent::before();

		$this->data = [];
		$this->data['admin_header'] = $this->admin_header;
    }

    public function action_index()
	{
		return Response::forge(View::forge('system/admin/password/index', $this->data));
	}
}
