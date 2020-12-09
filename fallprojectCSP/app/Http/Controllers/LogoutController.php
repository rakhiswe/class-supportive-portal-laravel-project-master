<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
  function logout(Request $req){
    $req->session()->flush();
    return redirect('login');
  }
}
