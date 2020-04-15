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
        $messageuser = new \App\MessageUser([
          'room_id' => '1',
          'user_id' => '1',
          'message_id' => '1',
        ]);
        $messageuser->save();
    }
}
