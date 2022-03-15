<?php

class Validation_Entry
{
	public static function forge($validation_name = 'default') {
		$validation = Validation::forge($validation_name);

		$validation->add('entry_name', 'お名前')
			->add_rule('required')
			->add_rule('max_length', 40);

		$validation->add('entry_ruby', 'フリガナ')
			->add_rule('required')
			->add_rule('max_length', 40);

		$validation->add('entry_address', 'ご住所')
			->add_rule('required')
			->add_rule('max_length', 250);

		$validation->add('entry_telephone_h', '電話番号（上桁）')
			->add_rule('required')
			->add_rule('valid_string', array('numeric'))
			->add_rule('max_length', 5);

		$validation->add('entry_telephone_m', '電話番号（中桁）')
			->add_rule('required')
			->add_rule('valid_string', array('numeric'))
			->add_rule('max_length', 4);

		$validation->add('entry_telephone_l', '電話番号（下桁）')
			->add_rule('required')
			->add_rule('valid_string', array('numeric'))
			->add_rule('max_length', 4);

		$validation->add('entry_email', 'メールアドレス')
			->add_rule('required')
			->add_rule('valid_email')
			->add_rule('max_length', 250);

		return $validation;
    }
}
