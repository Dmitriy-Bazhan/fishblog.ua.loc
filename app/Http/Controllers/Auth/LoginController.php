<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function indexAction()
    {
        $templateName = 'login';
        $this->data['body_class'] = $templateName . ' pages';   //что то со стилями. TODO = "Стили контейнеров. Разобраться"
        return view($templateName, $this->data);
    }

    public function login(Request $request)
    {

        $email = $request->email;
        $password = $request->password;
        if ($email == 'Dima' && $password == '123') {
            Auth::attempt(['email' => $email, 'password' => bcrypt($password)]);
            $user = User::where('email', $email)->first();
            Auth::loginUsingId($user->id, true);
            return Redirect::intended();
        } else {
            return redirect()->back()->with('user_not_found', 'Такого пользователя не существует');
        }
    }
}
