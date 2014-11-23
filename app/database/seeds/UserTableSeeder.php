<?php
/**
 * Created by PhpStorm.
 * User: AngieDurley
 * Date: 22/11/14
 * Time: 05:57 PM
 */
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'your@email.com',
            'password' => Hash::make('your_password')
        ));
    }
}