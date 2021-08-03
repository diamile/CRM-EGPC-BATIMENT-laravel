<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use DB;

use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function redirectTo()

    {
        //$users = User::where('id', Auth::id())->get();
        $users = $this->guard()->user()->name;
        

        DB::table('suivis')->insert(
            ['user' =>$users, 'action' => $users." "."vient de se connecter sur la plateform cyberius"]
        );

        



    /*
    |----------------------------------------------------------------------------------------------------
    | Verification si l'utilisateur est un administrateur ou un client afin de le rediriger vers sa page .
    |-----------------------------------------------------------------------------------------------------
    */
        if ($this->guard()->user()->isAdmin()) {

            return '/dashboard';

        }

        return '/client';

    }
     
   

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
