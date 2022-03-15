<?php

class Auth_Login_Customauth extends \Auth_Login_Driver
{
	/**
	 * @var  Database_Result  when login succeeded
	 */
	protected $user = null;

	/**
	 * Perform the actual login check
	 *
	 * @return  bool
	 */
	protected function perform_check()
	{
		$login_id    = \Session::get('login_id');
		$login_passport  = \Session::get('login_passport');

		if ( ! empty($login_id) and ! empty($login_passport)) {
			if (is_null($this->user)) {
				$this->user = Model_Admin::query()
					->where('login_id', '=', $login_id)
					->get_one();
			}

			if ($this->user and $this->user['login_passport'] === $login_passport) {
				return true;
			}
		}

		$this->user = false;
		\Session::delete('login_id');
		\Session::delete('login_passport');

		return false;
	}

	/**
	 * Perform the actual login check
	 *
	 * @return  bool
	 */
	public function validate_user($login_id = '', $login_password = '')
	{
		$login_id = $login_id ?: \Input::post('login_id');
		$login_password = $login_password ?: \Input::post('login_password');

		if (empty($login_id) or empty($login_password)) {
			return false;
		}

		$login_password = $this->hash_password($login_password);
		$user = Model_Admin::query()
			->where('login_id', '=', $login_id)
			->where('login_password', '=', $login_password)
			->get_one();

		return $user ?: false;
	}

	/**
	 * Login method
	 *
	 * @return  bool  whether login succeeded
	 */
	public function login($login_id = '', $login_password = '')
	{
		if ( ! ($this->user = $this->validate_user($login_id, $login_password))) {
			$this->user = false;
			\Session::delete('login_id');
			\Session::delete('login_passport');
			return false;
		}

		Auth::_register_verified($this);

		\Session::set('login_id', $this->user['login_id']);
		\Session::set('login_passport', $this->create_login_hash());
		\Session::instance()->rotate();
		return true;
	}

	/**
	 * Logout method
	 */
	public function logout()
	{
		$this->user = false;
		\Session::delete('login_id');
		\Session::delete('login_passport');
		return true;
	}

	/**
	 * Create new user
	 *
	 * @param   string
	 * @param   string
	 * @param   string
	 * @param   string
	 * @param   int
	 * @return  bool
	 */
	public function create_user($login_id, $login_password, $admin_email, $login_nickname, $login_status = 0)
	{
		$user = Model_Admin::forge()->set(array(
			'admin_email'      => $admin_email,
			'admin_permission' => 0,
			'login_nickname'   => (string) $login_nickname,
			'login_id'         => (string) $login_id,
			'login_password'   => $this->hash_password((string) $login_password),
			'login_passport'   => '',
			'login_time'       => 0,
			'login_status'     => $login_status,
		));
		$user->save();

		return $user;
	}

	/**
	 * Creates a temporary hash that will validate the current login
	 *
	 * @return  string
	 */
	public function create_login_hash()
	{
		if (empty($this->user)) {
			throw new \SimpleUserUpdateException('User not logged in, can\'t create login hash.', 10);
		}

		$login_time = \Date::forge()->get_timestamp();
		$login_passport = sha1(\Config::get('auth.salt').$this->user['login_id'].$login_time);

		$user = Model_Admin::find($this->user['admin_id']);
		$user->set(array('login_time' => $login_time, 'login_passport' => $login_passport));
		$user->save();

		$this->user['login_passport'] = $login_passport;

		return $login_passport;
	}

	/**
	 * Get User Identifier of the current logged in user
	 * in the form: array(driver_id, user_id)
	 *
	 * @return  array
	 */
	public function get_user_id()
	{
		if (empty($this->user)) {
			return false;
		}

		return array($this->id, (int) $this->user['admin_id']);
	}

	/**
	 * Get User Groups of the current logged in user
	 * in the form: array(array(driver_id, group_id), array(driver_id, group_id), etc)
	 *
	 * @return  array
	 */
	public function get_groups()
	{
		return array();
	}

	/**
	 * Get emailaddress of the current logged in user
	 *
	 * @return  string
	 */
	public function get_email()
	{
		if (empty($this->user)) {
			return false;
		}

		return $this->user['admin_email'];
	}

	/**
	 * Get screen name of the current logged in user
	 *
	 * @return  string
	 */
	public function get_screen_name()
	{
		if (empty($this->user)) {
			return false;
		}

		return $this->user['login_nickname'];
	}

	/**
	 * Default password hash method
	 *
	 * @param   string
	 * @return  string
	 */
	public function hash_password($password)
	{
		return base64_encode(hash_pbkdf2('sha1', $password, \Config::get('auth.salt'), \Config::get('auth.iterations', 10000), 20, true));
	}
}
