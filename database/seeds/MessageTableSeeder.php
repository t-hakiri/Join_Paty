<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message = new \App\Message([
          'user_id' => '1',
          'body' => 'test1@aa.aa',
        ]);
        $message->save();
    }
}