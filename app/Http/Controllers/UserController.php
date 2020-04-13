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

      return view('users/show', compact('user',('current_user')));
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
      return view('users.edit', ['user' => $user]);
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;
        $user->twitter_address = $request->twitter_address;
        $user->skype_id = $request->skype_id;
        $user->discord_id = $request->discord_id;
        $user->save();
        return redirect('users/'.$user->id);
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

    public function image(Request $request, User $user) {

    // バリデーション省略
    $originalImg = $request->user_image;

      if($originalImg->isValid()) {
        $filePath = $originalImg->store('public');
        $user->user_image = str_replace('public/', '', $filePath);
        $user->save();
        return redirect("/user/{$user->id}")->with('user', $user);

      }
    }
}
