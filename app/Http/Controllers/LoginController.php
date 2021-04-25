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
        $credentials = request(['email', 'password']);

        if (!Auth::guard('customer')->attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        } else {
            return Auth::guard('customer')->user();
        }
    }
    /**
     * Exam Login 
     *
     * @return 
     */
    public function isLogin()
    {
        return Auth::guard('customer')->check();
    }
}
