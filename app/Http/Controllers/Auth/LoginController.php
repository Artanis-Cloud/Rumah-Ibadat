<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $redirectTo;

    public function username()
    {
        return 'ic_number';
    }

    public function login(Request $request){

        //check either ic number has been registered or not
        $ic_checker = User::where('ic_number', $request->ic_number)->count();

        if($ic_checker == 0){
            //return back if ic number not registered
            return redirect()->back()->with('error', 'Kad pengenalan tidak berdaftar dalam sistem ini.');
        }

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

    }

    public function redirectTo()
    {
        // dd(request()->all());
        switch (auth()->user()->role) {
            case 0:
                if (auth()->user()->is_firstime == 1) {
                    $this->redirectTo = '/halaman-utama/rumah-ibadat';
                } elseif (auth()->user()->is_firstime == 0) {
                    $this->redirectTo = '/halaman-utama';
                }
                return $this->redirectTo;
                break;
            case 1:
                $this->redirectTo = '/dashboard-pejabat-exco';
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = '/dashboard-pejabat-yb';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/dashboard-upen';
                return $this->redirectTo;
                break;
            case 4:
                $this->redirectTo = '/dashboard-admin';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
    }
}
