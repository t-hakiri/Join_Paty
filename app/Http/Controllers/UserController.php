<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth'); // 全アクセスにログイン認証が必要
    // ->except・・・認証を除外するアクション配列
    // ->only・・・認証が必要なアクション配列
  }
}
