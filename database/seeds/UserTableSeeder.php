<?php

use Illuminate\Database\Seeder;
use DB as DBS;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
            array(
                'id'=>'1',
                'name'=>'Heritage Nepal',
                'email'=>'web@heritagenepal.com',
                'password'=>Hash::make('her!t@genep@!'),
                'role_id'=>'1',
                'verified'=>'1',
                'is_approved'=>'1',
            );
        DBS::table('users')->insert($users);
    }
}
