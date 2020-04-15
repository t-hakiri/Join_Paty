<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new \App\User([
        'name' => 'test'
        'email' => 'test1@aa.aa'
        'password' => 'test1@aa.aa'
        ]);
        $user->save();
    }
}