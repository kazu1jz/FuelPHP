<?php

class Controller_System_Admin_Admin extends Controller_System_Admin
{
	private $data;

	public function before()
	{
		parent::before();

		$this->data = [];
		$this->data['admin_header'] = $this->admin_header;

		$this->data['choice_list'] = array_combine(array('0', '1'), array('OFF', 'ON'));
    }

	public function get_index()
	{
		$this->data['admins'] = Model_Admin::find('all');

		return Response::forge(View::forge('system/admin/admin/index', $this->data));
	}

    public function get_edit()
	{
		$admin_id = $this->param('admin_id');

		$this->data['admin'] = Model_Admin::find($admin_id);

		$this->data['admin']['role_administrator_management'] = $this->data['admin']['admin_permission'] & 0b00000001 ? 1 : 0;
		$this->data['admin']['role_setting_management']       = $this->data['admin']['admin_permission'] & 0b00000010 ? 1 : 0;
		$this->data['admin']['role_master_management']        = $this->data['admin']['admin_permission'] & 0b00000100 ? 1 : 0;
		$this->data['admin']['role_log_view']                 = $this->data['admin']['admin_permission'] & 0b00001000 ? 1 : 0;
		$this->data['admin']['role_special_feature_use']      = $this->data['admin']['admin_permission'] & 0b00010000 ? 1 : 0;
		$this->data['admin']['role_entry_view']               = $this->data['admin']['admin_permission'] & 0b00100000 ? 1 : 0;
		$this->data['admin']['role_entry_edit']               = $this->data['admin']['admin_permission'] & 0b01000000 ? 1 : 0;
		$this->data['admin']['role_entry_delete']             = $this->data['admin']['admin_permission'] & 0b10000000 ? 1 : 0;

		return Response::forge(View::forge('system/admin/admin/edit', $this->data));
	}

	public function post_edit()
	{
		if (!Security::check_token()) {
			throw new HttpNoAccessException;
		}

		$input = Input::post();
		$input['admin_permission']  = $input['role_administrator_management'] *   1;
		$input['admin_permission'] += $input['role_setting_management']       *   2;
		$input['admin_permission'] += $input['role_master_management']        *   4;
		$input['admin_permission'] += $input['role_log_view']                 *   8;
		$input['admin_permission'] += $input['role_special_feature_use']      *  16;
		$input['admin_permission'] += $input['role_entry_view']               *  32;
		$input['admin_permission'] += $input['role_entry_edit']               *  64;
		$input['admin_permission'] += $input['role_entry_delete']             * 128;

		if ($input['login_password']) {
			$input['login_password'] = Auth::instance()->hash_password($input['login_password']);
		}
		else {
			unset($input['login_password']);
		}

		$admin_id = $this->param('admin_id');
		$admin = Model_Admin::find($admin_id);
		$admin->set($input);
		$validation = Validation_Admin::forge();

		if ($validation->run()) {
			if (Input::post('send') !== null) {
				if (!$admin->save(false)) {
					$this->data['admin'] = Model_Admin::find($admin_id);

					$this->data['admin']['role_administrator_management'] = $this->data['admin']['admin_permission'] & 0b00000001 ? 1 : 0;
					$this->data['admin']['role_setting_management']       = $this->data['admin']['admin_permission'] & 0b00000010 ? 1 : 0;
					$this->data['admin']['role_master_management']        = $this->data['admin']['admin_permission'] & 0b00000100 ? 1 : 0;
					$this->data['admin']['role_log_view']                 = $this->data['admin']['admin_permission'] & 0b00001000 ? 1 : 0;
					$this->data['admin']['role_special_feature_use']      = $this->data['admin']['admin_permission'] & 0b00010000 ? 1 : 0;
					$this->data['admin']['role_entry_view']               = $this->data['admin']['admin_permission'] & 0b00100000 ? 1 : 0;
					$this->data['admin']['role_entry_edit']               = $this->data['admin']['admin_permission'] & 0b01000000 ? 1 : 0;
					$this->data['admin']['role_entry_delete']             = $this->data['admin']['admin_permission'] & 0b10000000 ? 1 : 0;

					return Response::forge(View::forge('system/admin/admin/edit', $this->data));
				}
				else {
					Response::redirect(Router::get('system_admin_admin_edit', array('admin_id' => $admin['admin_id'])));
				}
			}
		}
		else {
			$this->data['errors'] = $validation->error();
			return Response::forge(View::forge('system/admin/admin/edit', $this->data));
		}
	}

    public function get_delete()
	{
		$admin_id = $this->param('admin_id');
		$this->data['admin'] = Model_Admin::find($admin_id);

		return Response::forge(View::forge('system/admin/admin/delete', $this->data));
	}

	public function post_delete()
	{
		if (!Security::check_token()) {
			throw new HttpNoAccessException;
		}

		$admin_id = $this->param('admin_id');
		$admin = Model_Admin::find($admin_id);

		if (Input::post('delete') !== null) {
			if (!$admin->delete()) {
				return Response::forge(View::forge('system/admin/admin/delete', $this->data));
			}
			else {
				Response::redirect(Router::get('system_admin_admin_delete_complete', $this->data));
			}
		}
	}

    public function get_complete()
	{
		return Response::forge(View::forge('system/admin/admin/complete', $this->data));
	}
}
