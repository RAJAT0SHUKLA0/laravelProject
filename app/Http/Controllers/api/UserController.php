<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;


class UserController extends Controller
{
    function index(Request $request)
    {
        try {
            $request->validate([ 
                'mobile' => 'required|numeric|digits:10', 
            ]);

            $checkMobile = Admin::where('mobile', $request->mobile)->first();
            if ($checkMobile) {
                Admin::where('id', $checkMobile->id)
                    ->update([
                    'otp' => 1234,
                ]);
                return response()->json([
                'success' => true,
                'message' => "Enter 4 Digit OTP ",
                ],  200);
            }
            else
            {
                 return response()->json([
                'success' => false,
                'message' => "This Mobile Don't Registered.",
                ],  200);
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! Please try again.',
                'error' => $e->getMessage(),
            ], 200);
        }    
    }

    
}


