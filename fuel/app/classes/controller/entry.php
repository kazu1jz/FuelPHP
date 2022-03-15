<?php

class Controller_Entry extends Controller_Top
{
	private $data;

	public function before()
	{
		parent::before();

		$entry_birthday_y = range(1950, date('Y'));
		$entry_birthday_m = range(1, 12);
		$entry_birthday_d = range(1, 31);

		$this->data = [];
		$this->data['header'] = $this->header;

		$this->data['entry_birthday_y'] = array_combine($entry_birthday_y, $entry_birthday_y);
		$this->data['entry_birthday_m'] = array_combine(
			array_map(function($number){ return str_pad($number, 2, 0, STR_PAD_LEFT); }, $entry_birthday_m), $entry_birthday_m
		);
		$this->data['entry_birthday_d'] = array_combine(
			array_map(function($number){ return str_pad($number, 2, 0, STR_PAD_LEFT); }, $entry_birthday_d), $entry_birthday_d
		);
    }

    public function get_index()
	{
		return Response::forge(View::forge('entry/index', $this->data));
	}

	public function post_index()
	{
		if (!Security::check_token()) {
			throw new HttpNoAccessException;
		}

		$input = Input::post();
		$input['entry_birthday'] = $input['entry_birthday_y'].$input['entry_birthday_m'].$input['entry_birthday_d'];

		$entry = Model_Entry::forge()->set($input);
		$validation = Validation_Entry::forge();

		if ($validation->run()) {
			if (Input::post('confirm') !== null) {
				return Response::forge(View::forge('entry/confirm', $this->data));
			}
			elseif (Input::post('send') !== null) {
				$entry['entry_transfer'] = $entry['entry_transfer'] ?? 0;
				if (!$entry->save(false)) {
					return Response::forge(View::forge('entry/index', $this->data));
				}
				else {
					// ユーザー
					$email_user = Email_Entry_User::forge();
					$email_user->to($entry['entry_email']);
					try {
						$email_user->send();
					}
					catch(\EmailValidationFailedException $e) {
						// バリデーションが失敗したとき
					}
					catch(\EmailSendingFailedException $e) {
						// ドライバがメールを送信できなかったとき
					}
					// 管理者
					$admins = Model_Admin::find('all');
					foreach ($admins as $admin) {
						$email_admin = Email_Entry_Admin::forge();
						$email_admin->to($admin['admin_email']);
						try {
							$email_admin->send();
						}
						catch(\EmailValidationFailedException $e) {
							// バリデーションが失敗したとき
						}
						catch(\EmailSendingFailedException $e) {
							// ドライバがメールを送信できなかったとき
						}
					}
					Response::redirect(Router::get('entry_complete'));
				}
			}
		}
		else {
			$this->data['errors'] = $validation->error();
			return Response::forge(View::forge('entry/index', $this->data));
		}
	}

    public function get_complete()
	{
		return Response::forge(View::forge('entry/complete', $this->data));
	}
}
