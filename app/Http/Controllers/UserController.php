<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function profile(Request $request)
    {
        $userID = session('user_id');
        $user = \App\Models\User::find($userID);

        return view('user.profile', compact('user'));
    }
    public function profilechange(Request $request)
    {
        // Assuming you have a User model and the user is authenticated
        $userID = session('user_id');
        $user = \App\Models\User::find($userID);

        // Return the profile change view with user data
        return view('user.profilechange', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'user_fullname' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255|unique:tbluser,user_email,' . session('user_id') . ',user_id',
            'user_phone' => 'nullable|string|max:15',
            'user_address' => 'nullable|string|max:255',
        ]);

        $user = \App\Models\User::find(session('user_id'));
        if (!$user) {
            return redirect()->route('profile')->with('error', 'User not found.');
        }

        $user->user_fullname = $request->input('user_fullname');
        $user->user_email = $request->input('user_email');
        $user->user_phone = $request->input('user_phone');
        $user->user_address = $request->input('user_address');
        $user->save();

        return redirect()->route('profile')->with('success', 'Cập nhật thông tin thành công!');
    }
    public function passChange(Request $request)
    {
        // Assuming you have a User model and the user is authenticated
        $userID = session('user_id');
        $user = \App\Models\User::find($userID);

        // Return the password change view with user data
        return view('user.passchange', compact('user'));
    }
    public function passUpdate(Request $request)
    {
        $request->validate([
            'old-password' => 'required|string',
            'new-password' => 'required|string',
            'new-password-repeat' => 'required|string',
        ]);

        $user = \App\Models\User::find(session('user_id'));
        if (!$user) {
            return redirect()->route('passChange')->with('error', 'User not found.');
        }

        // Kiểm tra mật khẩu cũ
        if ($user->user_password !== md5($request->input('old-password'))) {
            return redirect()->route('passChange')->with('error', 'Mật khẩu cũ không đúng.');
        }

        // Kiểm tra xác nhận mật khẩu mới
        if ($request->input('new-password') !== $request->input('new-password-repeat')) {
            return redirect()->route('passChange')->with('error', 'Mật khẩu xác nhận không khớp.');
        }

        // Cập nhật mật khẩu mới
        $user->user_password = md5($request->input('new-password'));
        $user->save();

        return redirect()->route('profile')->with('success', 'Đổi mật khẩu thành công!');
    }
}