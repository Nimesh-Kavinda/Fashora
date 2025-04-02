<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *       
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Restore Cart after successful login
     */
    protected function authenticated(Request $request, $user)
    {
        Cart::instance('cart')->restore($user->id);
        Cart::instance('wishlist')->restore($user->id);
    }

    /**
     * Store Cart before logout and log the user out
     */
    public function logout(Request $request)
    {
        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::id()); 
            Cart::instance('wishlist')->store(Auth::id()); 
        }

        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); 
    }
}
