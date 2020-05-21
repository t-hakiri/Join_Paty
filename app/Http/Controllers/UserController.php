<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\GameRoom;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth'); 
  }

    public function show($id)
    {
      $user = User::findOrFail($id);
      $my_gamerooms = GameRoom::where('owner', $user->id)->get();
      $current_user = Auth::user();

      return view('user/show', compact('user',('current_user'),'my_gamerooms'));
    }

    public function edit(User $user)
    {
      return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $uploadfile = $request->file('user_image');
        if(!empty($uploadfile)){
            $user_imagename = $request->file('user_image')->hashName();
            $request->file('user_image')->storeAs('public/user', $user_imagename);

            $param = [
                'user_image'=>$user_imagename,
            ];
            $user->user_image = $user_imagename;
            $user->save();
          }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->twitter_address = $request->twitter_address;
        $user->skype_id = $request->skype_id;
        $user->discord_id = $request->discord_id;
        $user->save();
        return redirect('user/'.$user->id)->with(['flash_message'=> '保存しました']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/home');
    }
}
