<?php

class Controller_System_Login extends Controller_System
{
	private $data;

	public function before()
	{
		parent::before();

		$this->data = [];
		$this->data['header'] = $this->header;
    }

    public function get_index()
	{
		return Response::forge(View::forge('system/login/index', $this->data));
	}

	public function post_index()
	{
		if (!Security::check_token()) {
			throw new HttpNoAccessException;
		}

		if (Auth::login()) {
            return Response::redirect(Router::get('system_admin_index'));
        }

		$this->data['login_error'] = 'ログインIDまたはパスワードが間違っています。';

		return Response::forge(View::forge('system/login/index', $this->data));
	}
}
