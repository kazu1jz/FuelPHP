<?php

class Validation_Admin
{
	public static function forge($validation_name = 'default') {
		$validation = Validation::forge($validation_name);

		return $validation;
    }
}
