<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    // protected $guard = 'web';
    // public function __construct(Request $request)
    // {
    //     if ($request->is('admin/*')) {
    //         $this->guard = 'admin';

    //     }

    // }
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login', [
            'routePrefix' => $this->guard == 'admin' ? 'admin.' : '',
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        // $user = User::where('email', $request->post('email'))->first();

        // if (!$user || !Hash::check($request->post('password'), $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => 'Invalid Data',
        //     ]);
        // }
        // Auth::login($user); => Make Session For User
        // Auth::attempt([
        //     'email' => $request->post('email'),
        //     'password' => $request->post('password'),
        // ]);
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout(); //destroy Session For User

        session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
