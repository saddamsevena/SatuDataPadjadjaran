<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'npm' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->npm, FILTER_VALIDATE_EMAIL) ? 'email' : 'npm';

        if(auth()->attempt(array($fieldType => $input['npm'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 1) {
                Alert::success('Welcome, Admin!');
                return redirect()->route('admin.home');
            }else{
                toast('Selamat datang','success');
                return redirect()->route('home');
            }
        }
        
        else{
            toast('NPM/Email atau Password salah!', 'error');
            return redirect()->route('login');
        }

    }

    public function logout ()
    {
        session::flush();
        Alert::success('Logout Berhasil');
        return redirect(route('home'));
    }
}
