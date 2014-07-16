<?php

class UserTableSeeder extends Seeder {
	
	public function run() {
		$user = new User;
        $user->username = 'hwu1986@gmail.com';
        $user->password = Hash::make('$teve1201');
        $user->save();
	}
}