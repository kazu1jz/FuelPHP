<?php

class Controller_System_Admin_Config extends Controller_System_Admin
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
		return Response::forge(View::forge('system/admin/config/index', $this->data));
	}
}
