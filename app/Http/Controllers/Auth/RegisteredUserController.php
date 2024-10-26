<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Mail\RegistrationConfirmation;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

use App\Notifications\RegisterUserNotification;
use Illuminate\Support\Facades\Notification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $departments = Category::get();
        return view('auth.register', compact('departments'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'vendor_department' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'matno' => $request->matno,
            'level' => $request->level,
            'vendor_department' => $request->vendor_department,
            'password' => Hash::make($request->password),
        ]);


        //  Mail::to($user->email)->send(new RegistrationConfirmation($request));

        //event(new Registered($user));

        Auth::login($user);

        $nuser = User::where('role', 'admin')->get();
        Notification::send($nuser, new RegisterUserNotification($request));
        return redirect(RouteServiceProvider::HOME);
    }
}
