<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        } else {
            $credentials = $request->only('mobile', 'password');
            if (Auth::guard('admin')->attempt($credentials)) {
                toastr()->success('Login successful!');
                return redirect()->intended('/dashboard');
            } else {
                toastr()->error('Invalid credentials. Please try again.');
                return redirect()->back()->withInput();
            }
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
