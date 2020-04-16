<?php

use Illuminate\Database\Seeder;

class MessageUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message = new \App\MessageUser([
          'user_id' => '1',
          'message_id' => '1',
        ]);
        $message->save();
    }
}
