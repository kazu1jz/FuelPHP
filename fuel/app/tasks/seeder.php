<?php

namespace Fuel\Tasks;

class Seeder
{

	public function run()
	{
		\Auth::create_user('test', 'pass', 'test@example.com', 'テストユーザー', 1);
	}
}
