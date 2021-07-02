<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyOtpRequest;
use App\Mail\OtpMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    public function create()
    {
        return view('client.register.create');
    }

    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email']
        ]);

        $user = User::generateOtp($request);

        return redirect(route('client.register.otp', $user));
    }

    public function otp(User $user)
    {
        return view('client.register.otp', [
            'user' => $user
        ]);
    }

    public function verifyOtp(VerifyOtpRequest $request, User $user)
    {
        if (!Hash::check($request->get('otp'), $user->password)){
            return  back()->withErrors(['otp' => 'کد وارد شده صحیح نیست.']);
        }

        auth()->login($user);

        return redirect(route('client.index'));
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('client.index'));
    }

}
