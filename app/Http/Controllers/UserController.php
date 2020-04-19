<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth'); // 全アクセスにログイン認証が必要
    // ->except・・・認証を除外するアクション配列
    // ->only・・・認証が必要なアクション配列
  }

    public function show($id)
    {
      $user = User::findOrFail($id);
      $current_user = Auth::user();

      return view('user/show', compact('user',('current_user')));
    }

    // 更新用フォーム画面へ移動
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      return view('user.edit', ['user' => $user]);
    }

    // 実際の更新処理
    // 終わったら、そのユーザのページへ移動
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/home');
    }
}
