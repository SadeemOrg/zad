<?php

namespace App\Http\Controllers\Customer\Auth;

use App\CPU\CartManager;
use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Model\BusinessSetting;
use App\Model\Wishlist;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public $company_name;

    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function login()
    {
        session()->put('keep_return_url', url()->previous());
        $builder = new CaptchaBuilder;
        $builder->build();
        Session::put('builder', $builder->getPhrase());
        return view('customer-view.auth.login', compact('builder'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'password' => 'required|min:8'
        ]);
        //recaptcha validation
        // $recaptcha = Helpers::get_business_settings('recaptcha');
        // if (isset($recaptcha) && $recaptcha['status'] == 1) {
        //     try {
        //         $request->validate([
        //             'g-recaptcha-response' => [
        //                 function ($attribute, $value, $fail) {
        //                     $secret_key = Helpers::get_business_settings('recaptcha')['secret_key'];
        //                     $response = $value;
        //                     $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response;
        //                     $response = \file_get_contents($url);
        //                     $response = json_decode($response);
        //                     if (!$response->success) {
        //                         $fail(\App\CPU\translate('ReCAPTCHA Failed'));
        //                     }
        //                 },
        //             ],
        //         ]);
        //     } catch (\Exception $exception) {}
        // } else if ($recaptcha['status'] == 0) {
        //     $builder = new CaptchaBuilder();
        //     $builder->setPhrase(session()->get('builder'));
        //     if (!$builder->testPhrase($request->builder)) {
        //         Toastr::error(\App\CPU\translate('ReCAPTCHA Failed'));
        //         return back();
        //     }
        // }

        $remember = ($request['remember']) ? true : false;

        $user = User::where(['phone' => $request->user_id])->orWhere(['email' => $request->user_id])->first();

        if (isset($user) == false) {
            Toastr::error('الايميل او كلمة المرور غير متطابقات');
            return back()->withInput();
        }

        $phone_verification = Helpers::get_business_settings('phone_verification');
        $email_verification = Helpers::get_business_settings('email_verification');
        if ($phone_verification && !$user->is_phone_verified) {
            return redirect(route('customer.auth.check', [$user->id]));
        }
        if ($email_verification && !$user->is_email_verified) {
            return redirect(route('customer.auth.check', [$user->id]));
        }

        if (isset($user) && $user->is_active && auth('customer')->attempt(['email' => $user->email, 'password' => $request->password], $remember)) {
            session()->put('wish_list', Wishlist::where('customer_id', auth('customer')->user()->id)->pluck('product_id')->toArray());
            Toastr::info('مرحبا بك في ' . Helpers::get_business_settings('company_name') . '!');
            CartManager::cart_to_db();
            return redirect(session('keep_return_url'));
        }

        Toastr::error('الايميل او كلمة المرور غير متطابقات');
        return back()->withInput();
    }



    public function logout(Request $request)
    {
        auth()->guard('customer')->logout();
        session()->forget('wish_list');
        $request->session()->invalidate();
        Toastr::info('عود قريبا, ' . '!');
        return redirect()->route('home');
    }
}
