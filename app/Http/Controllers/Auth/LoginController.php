<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    public function username()
    {
        return 'cedpersona';

    }

    public function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required',
            'password' => 'required',
        ]);
        //
        //$usuario = User::where('cedpersona', $request->cedpersona)->first();
        $usuario = DB::table('tpersona')->where('tpersona.cedpersona', '=', $request->cedpersona)->first();

        if($usuario != null){
                switch($usuario->tippersona){

                    case('Estudiante'):
                        if($usuario->clave === $request->password){
                            Auth::login($usuario);
                            $request->session()->regenerate();
                            return redirect('/')->withSuccess('Signed in');
                        }
                    break;
                    case ('Docente'):
                        if($usuario->clave === $request->password){
                            Auth::login($usuario);
                            $request->session()->regenerate();
                            return redirect('/')->withSuccess('Signed in');
                        }
                    break;

                }

        }else{
            return redirect("login")->withSuccess('Login details are not valid');
        }

    }



}
