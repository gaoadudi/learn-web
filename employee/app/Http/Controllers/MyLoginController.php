<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{LoginRequest};
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;// xử lý datetime

class MyLoginController extends Controller
{
    // Login
    public function GetLogin(){
    	return view('login');
    }
    public function PostLogin(LoginRequest $request){
        $data = [
            'username' => $request->username,
            'password' => $request->password
            //'role' => 1
        ];
        
        if (Auth::attempt($data)) {
            // Login lần đầu phải đổi mk
            if (Auth::user()->loginfirst==null) {
                $id = Auth::user()->id;
                $user = User::find($id);
                $user->loginfirst = Carbon::now();
                $user->save();
                return redirect('edit-password/'.$id)->with('mess', 'Đăng nhập lần đầu, vui lòng đổi lại mật khẩu!');
            } else{
                return redirect('list-department')->with('mess', 'Đăng nhập thành công');
            }
        } else{
            return redirect('login')->with('mess', 'Tài khoản hoặc mật khẩu không chính xác');
        }   	
    }

    // Logout
    public function GetLogout(){
        Auth::logout();
        return redirect('login')->with('mess', 'Đã đăng xuất tài khoản thành công');
    }
}
