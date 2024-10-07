<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;


class UserController extends Controller
{

    public function index()
    {

        $users = User::pluck('name', 'id')->toArray();
        $usersCount = User::count();

        return ['users' => $users, 'count' => $usersCount];
    }

    // Show create form

    public function create()
    {
        return view('users.register');
    }

    // Create new user

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' =>   ['required', 'email', Rule::unique('users', 'email')],
            'password' =>   ['required', 'confirmed', 'min:6'],
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        event(new Registered($user));
        Auth::login($user);


        return redirect('/register/verify')->with('message', 'An e-mail has been sent.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' =>   ['required', 'email'],
            'password' =>   ['required'],
        ]);

        if (Auth::attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You have been logged in.');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function authenticateGoogleRedirect()
    {

        return Socialite::driver('google')->redirect();
    }

    public function authenticateGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'google_id' => $googleUser->id,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
            'google_token_expires_at' => Carbon::now()->addSeconds($googleUser->expiresIn),

        ]);
        Auth::login($user);
        return redirect('/')->with('message', 'You have been logged in.');
    }



    public function requestResetLink(Request $request)
    {

        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ? redirect('/login')->with(['status' => __($status)])->with('message', 'Link has been sent.') : back()->withErrors(['email' => __($status)]);
    }

    public function userResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {

                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET ? redirect()->route('login')->with('status', __($status))->with('message', 'Password has been changed. You can now log in.') : back()->withErrors(['email' => [__($status)]]);
    }

    public function userChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' =>   ['required', 'confirmed', 'min:6'],
        ]);

        $user = Auth::user();

        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/')->with('message', 'Your password has been changed.');
    }
}
