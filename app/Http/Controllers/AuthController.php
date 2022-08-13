<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Registration
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function register(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate(array_merge_recursive(User::rules(), [
                'name' => ['required'],
                'login' => ['unique:users'],
            ]));

            $user = new User();
            $user->fill($request->all());
            $user->save();

            return redirect('login');
        }
        return view('auth.register');
    }

    /**
     * Login
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function login(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate(User::rules());

            if ($this->authenticate($request)) {
                return redirect()->intended('posts');
            } else {
                return back()->withErrors([
                    'password' => 'Incorrect username/password.',
                ]);
            }
        }
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt
     *
     * @param Request $request
     * @return bool
     */
    protected function authenticate(Request $request): bool
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return true;
        }
        return false;
    }

    /**
     * Logout
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('login');
    }
}
