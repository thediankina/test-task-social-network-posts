<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Login page
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function login(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate(User::rules());

            if ($this->authenticate($request)) {

                return $this->redirectTo('login');
            }
        }

        return view('user.login');
    }

    /**
     * Registration page
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function register(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate(User::rules());

            $user = new User();
            $user->username = $request->input('username');
            $user->password = md5($request->input('password'));
            $user->save();

            return $this->redirectTo('login');
        }

        return view('user.register');
    }

    /**
     * Handle authentication attempt
     *
     * @param Request $request
     * @return bool
     */
    protected function authenticate(Request $request): bool
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return true;
        }

        return false;
    }
}
