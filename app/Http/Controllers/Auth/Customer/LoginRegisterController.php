<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;

class LoginRegisterController extends Controller
{
    public function loginRegisterForm()
    {
        return view('customer.auth.login-register');
    }

    public function loginRegister(LoginRegisterRequest $request)
    {

        $inputs = $request->all();

        //check id is email or not
        if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {
            $type = 1; // 1 => email
            $user = User::where('email', $inputs['id'])->first();
            if (empty($user)) {
                $newUser['email'] = $inputs['id'];
            }
        }

        //check id is phone number or not
        elseif (preg_match('/^(\+98|98|0)9\d{9}$/', $inputs['id'])) {

            $type = 0; // 0 => phone number

            //all mobile number are in format 9** *** ***
            $inputs['id'] = ltrim($inputs['id'], '0');
            $inputs['id'] = substr($inputs['id'], 0, 2) == 98 ? substr($inputs['id'], 2) : $inputs['id'];
            $inputs['id'] = str_replace('+98', '', $inputs['id']);


            $user = User::where('mobile', $inputs['id'])->first();
            if (empty($user)) {
                $newUser['mobile'] = $inputs['id'];
            }
        } else {
            $errorText = 'شماره موبایل یا ایمیل وارد شده صحیح نمی باشد';
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id' => $errorText]);
        }


        if (empty($user)) {
            $newUser['password'] = '98355154';
            $newUser['activation'] = 1;
            $user = User::create($newUser);
        }


        //create otp code
        $otpCode = rand(1000, 9999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $inputs['id'],
            'type' => $type
        ];


        Otp::create($otpInputs);


        //send email or sms

        if ($type == 0) {
            //send SMS
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setText("سعید مارکت\n کد تایید: $otpCode");
            $smsService->setTo(['0' . $user->mobile]);
            $smsService->setIsFlash(true);


            $messagesService = new MessageService($smsService);
        } elseif ($type == 1) {
            //send Email
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "سعید مارکت\n کد تایید: $otpCode"
            ];

            $emailService->setSubject('کد احراز هویت');
            $emailService->setFrom('noreply@example.com', 'example');
            $emailService->setTo($inputs['id']);
            $emailService->setDetails($details);



            $messagesService = new MessageService($emailService);

        }

        $messagesService->send();
    }
}
