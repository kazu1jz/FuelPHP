<?php

class Controller_System_Admin_Entry extends Controller_System_Admin
{
	private $data;

	public function before()
	{
		parent::before();

		$entry_birthday_y = range(1950, date('Y'));
		$entry_birthday_m = range(1, 12);
		$entry_birthday_d = range(1, 31);

		$this->data = [];
		$this->data['admin_header'] = $this->admin_header;

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
		$query = Model_Entry::query();

		if (Input::get('keyword')) {
			$query->where_open()
				->or_where('entry_name', 'LIKE', '%'.Input::get('keyword').'%')
				->or_where('entry_ruby', 'LIKE', '%'.Input::get('keyword').'%')
				->or_where('entry_address', 'LIKE', '%'.Input::get('keyword').'%')
				->or_where('entry_email', 'LIKE', '%'.Input::get('keyword').'%')
			->where_close();
		}

		if (Input::get('min_entry_birthday_y') && Input::get('min_entry_birthday_m') && Input::get('min_entry_birthday_d')) {
			$min_birthday = Input::get('min_entry_birthday_y').Input::get('min_entry_birthday_m').Input::get('min_entry_birthday_d');
			$query->where('entry_birthday', '>=', intval($min_birthday));
		}

		if (Input::get('max_entry_birthday_y') && Input::get('max_entry_birthday_m') && Input::get('max_entry_birthday_d')) {
			$max_birthday = Input::get('max_entry_birthday_y').Input::get('max_entry_birthday_m').Input::get('max_entry_birthday_d');
			$query->where('entry_birthday', '<=', intval($max_birthday));
		}

		if (Input::get('entry_prefecture')) {
			$query->where_open();
			foreach (Input::get('entry_prefecture', array()) as $prefecture) {
				$query->or_where('entry_prefecture', intval($prefecture));
			}
			$query->where_close();
		}

		if (Input::get('entry_magazine')) {
			$query->where_open();
			foreach (Input::get('entry_magazine', array()) as $magazine) {
				$query->or_where('entry_magazine', intval($magazine));
			}
			$query->where_close();
		}

		if (Input::get('entry_magazine_type')) {
			$query->where_open();
			foreach (Input::get('entry_magazine_type', array()) as $magazine_type) {
				$query->or_where('entry_magazine_type', intval($magazine_type));
			}
			$query->where_close();
		}

		if (Input::get('entry_transfer')) {
			$query->where_open();
			foreach (Input::get('entry_transfer', array()) as $transfer) {
				$query->or_where('entry_transfer', intval($transfer));
			}
			$query->where_close();
		}

		$pagination = Pagination::forge('entries', [
			'uri_segment'    => 'page',
			'per_page'       => 20,
			'total_items'    => $query->count(),
		]);

		$query->limit($pagination->per_page);
		$query->offset($pagination->offset);

		$this->data['entries'] = $query->get();

		$this->data['entry_birthday_y'] = array('' => '') + $this->data['entry_birthday_y'];
		$this->data['entry_birthday_m'] = array('' => '') + $this->data['entry_birthday_m'];
		$this->data['entry_birthday_d'] = array('' => '') + $this->data['entry_birthday_d'];

		return Response::forge(View::forge('system/admin/entry/index', $this->data));
	}

    public function get_edit()
	{
		$entry_id = $this->param('entry_id');
		$this->data['entry'] = Model_Entry::find($entry_id);

		$this->data['entry']['entry_birthday_y'] = substr($this->data['entry']['entry_birthday'], 0, 4);
		$this->data['entry']['entry_birthday_m'] = substr($this->data['entry']['entry_birthday'], 4, 2);
		$this->data['entry']['entry_birthday_d'] = substr($this->data['entry']['entry_birthday'], 6, 2);

		return Response::forge(View::forge('system/admin/entry/edit', $this->data));
	}

	public function post_edit()
	{
		if (!Security::check_token()) {
			throw new HttpNoAccessException;
		}

		$input = Input::post();
		$input['entry_birthday'] = $input['entry_birthday_y'].$input['entry_birthday_m'].$input['entry_birthday_d'];

		$entry_id = $this->param('entry_id');
		$entry = Model_Entry::find($entry_id);
		$entry->set($input);
		$validation = Validation_Entry::forge();

		if ($validation->run()) {
			if (Input::post('send') !== null) {
				if (!$entry->save(false)) {
					return Response::forge(View::forge('system/admin/entry/edit', $this->data));
				}
				else {
					Response::redirect(Router::get('system_admin_entry_edit', array('entry_id' => $entry['entry_id'])));
				}
			}
		}
		else {
			$this->data['errors'] = $validation->error();
			return Response::forge(View::forge('system/admin/entry/edit', $this->data));
		}
	}

    public function get_delete()
	{
		$entry_id = $this->param('entry_id');
		$this->data['entry'] = Model_Entry::find($entry_id);

		$this->data['entry']['entry_birthday_y'] = substr($this->data['entry']['entry_birthday'], 0, 4);
		$this->data['entry']['entry_birthday_m'] = substr($this->data['entry']['entry_birthday'], 4, 2);
		$this->data['entry']['entry_birthday_d'] = substr($this->data['entry']['entry_birthday'], 6, 2);

		return Response::forge(View::forge('system/admin/entry/delete', $this->data));
	}

	public function post_delete()
	{
		if (!Security::check_token()) {
			throw new HttpNoAccessException;
		}

		$entry_id = $this->param('entry_id');
		$entry = Model_Entry::find($entry_id);

		if (Input::post('delete') !== null) {
			if (!$entry->delete()) {
				return Response::forge(View::forge('system/admin/entry/delete', $this->data));
			}
			else {
				Response::redirect(Router::get('system_admin_entry_delete_complete'));
			}
		}
	}

    public function get_complete()
	{
		return Response::forge(View::forge('system/admin/entry/complete', $this->data));
	}
}
