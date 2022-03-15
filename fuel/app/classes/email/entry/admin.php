<?php

class Email_Entry_Admin
{
	public static function forge($setup = null, array $config = array()) {
        $email = Email::forge($setup, $config);

        $email->from('fuelphp@example.com', 'FuelPHP Example');

        $email->subject('[管理者] エントリー新規登録');

        $email->body('新規でエントリーの登録がありました。');

        return $email;
    }
}
