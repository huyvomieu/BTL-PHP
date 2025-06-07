<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthController extends Controller
{
    use ValidatesRequests;
    public function login()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        $user = \App\Models\User::where('user_loginname', $request->username)
            ->where('user_password', md5($request->password))
            ->first();

        if ($user) {
            auth()->login($user);
            return redirect()->intended('/');
        }
        return redirect()->back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function registerPost(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tbluser,user_email',
            'phonenumber' => 'required|string|regex:/^[0-9]{10,15}$/',
            'username' => 'required|string|max:50|unique:tbluser,user_loginname',
            'password' => 'required|string|min:6|same:password-repeat',
            'password-repeat' => 'required|string|min:6'
        ]);

        $user = new \App\Models\User();
        $user->user_fullname = $request->fullname;
        $user->user_address = $request->address;
        $user->user_email = $request->email;
        $user->user_phone = $request->phonenumber;
        $user->user_loginname = $request->username;
        $user->user_password = md5($request->password);
        $user->user_created_date = now();
        $user->user_enabled = 1;
        $user->user_deleted = 0;
        $user->save();

        auth()->login($user);

        return redirect()->route('login');
    }
}
