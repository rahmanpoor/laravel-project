<?php

namespace App\Http\Controllers\Auth\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Models\User;

class LoginRegisterController extends Controller
{
    public function loginRegisterForm()
    {
        return view('customer.auth.login-register');
    }

    public function loginRegister(LoginRegisterRequest $request) {
        $inputs = $request->all();

        //check id is email or not
        if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {
            $type = 1; // 1 => email
            $user = User::where('email', $inputs['id'])->first();
            if(empty($user)) {
                $newUser['email'] = $inputs['id'];
            }

        }

        //check id is phone number or not
        elseif(preg_match('/^(\+98|98|0)9\d{9}$', $inputs['id'])) {
            $type = 0; // 0 => phone number
        }
    }
}
