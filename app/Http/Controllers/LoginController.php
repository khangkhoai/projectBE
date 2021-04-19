<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Customer;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        //     'remember_me' => 'boolean'
        // ]);
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $credentials = request(['email', 'password']);
        
        if (Auth::guard('customer')->attempt($arr))
        {
            dd('dang nhap thanh cong');
        }
        else
        {
            dd('dang nhap that bai');
        }
            
    }
}