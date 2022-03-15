<?php

class Email_Entry_User
{
	public static function forge($setup = null, array $config = array()) {
        $email = Email::forge($setup, $config);

        $email->from('fuelphp@example.com', 'FuelPHP Example');

        $email->subject('[エントリー] 登録完了');

        $email->body('エントリーの登録が完了しました。');

        return $email;
    }
}
