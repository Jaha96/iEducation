<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
    {
        if (Auth::user()) {
           // if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3) {
                return redirect()->intended('go/auto/autoparts');
//            } elseif (Auth::user()->role_id == 4 || Auth::user()->role_id == 5) {
//                return redirect()->intended('txg');
//            }
        } else {
            return view('login');
        }
    }

    function login(AuthRequest $request)
    {
        $user = $request->except('_token');

        if (Auth::attempt(['email' => $user['email'], 'password' => $user['password']])) {
            //return redirect()->intended('go');
            //$this->loginView();
           // if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3) {
                return redirect()->intended('go/auto/autoparts');
//            } elseif (Auth::user()->role_id == 4 || Auth::user()->role_id == 5) {
//                return redirect()->intended('txg');
//            }
        } else {
            return redirect()->back()->withMsg('Нэр эсвэл нууц үг буруу байна.');
        }
    }

    function logOut()
    {
        Auth::logout();
        return redirect()->to('/go/login');
    }
}
