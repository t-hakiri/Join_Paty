<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

      return view('users/show', compact('user'));
    }

  public function edit($id)
    {
      // DBよりURIパラメータと同じIDを持つUserの情報を取得
      $user = User::findOrFail($id);

      // 取得した値をビュー「user/edit」に渡す
      return view('user/edit', compact('user'));
    }
}
