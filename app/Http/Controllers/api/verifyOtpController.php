<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;



class verifyOtpController extends Controller
{
    function verifyOTP(Request $request)
    {
        try {
            $request->validate([ 
                'mobile' => 'required|numeric|digits:10|', 
                'otp' => 'required|numeric|digits:4|', 
            ]);

            $checkMobile = Admin::where('mobile',$request->mobile)
                                ->where('otp', $request->otp)
                                ->first();
            if ($checkMobile) {
                $userData = Auth::login($checkMobile);
                // Generate Sanctum token
                $token = $checkMobile->createToken('api-token')->plainTextToken;
                //$checkMobile->remember_token = $token;
                $checkMobile->save();
                return response()->json([
                'success' => true,
                'token' => $token,
                'message' => " login successfully",
                
                ],  200);
            }
            else
            {
                 return response()->json([
                'success' => false,
                'message' => "Wrong OTP.",
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
