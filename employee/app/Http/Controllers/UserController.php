<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{AddUserRequest,EditUserRequest,EditPasswordRequest};
use Illuminate\Support\Facades\Hash;
use App\User;
use Mail;

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    function GetListUser() {
    	$data['users'] = User::paginate(5);
    	return view('list_user', $data);
    }

    // Thêm người dùng
    function GetAddUser() {
    	return view('add_user');
    }
    function PostAddUser(AddUserRequest $request) {
    	// Thêm vào csdl
    	$user = new User;
    	$user->username = $request->username;
    	$user->email = str_replace(' ', '', $request->email);
    	$user->role = $request->role;
    	$user->password = bcrypt('123456');	
    	//$user->save();

        // Gửi mail chứa mật khẩu ban đầu
        $data = [
            'password' => '123456',
            'username'=> $user->username,
        ];  
        Mail::send('send_mail', $data, function($message) use ($user) {
            $message->from('phanhieucf@gmail.com', 'Employee Direction')
                    ->to($user->email, 'Receiver')
                    ->subject('User Password');
        });

        if(Mail::failures()) {
            return redirect()->back()->with('mess', 'Thêm thành viên thất bại. Không thể gửi email!');
        } else{
            $user->save();
            return redirect()->back()->with('mess', 'Đã thêm thành công. Mật khẩu đã được gửi vào email đăng ký!');
        } 	
    }

    // Sửa người dùng
    function GetEditUser($id) {
    	$data['user'] = User::find($id);
    	return view('edit_user', $data);
    }
    function PostEditUser(EditUserRequest $request, $id) {
        // Cập nhật vào csdl
        $user = User::find($id);
        $user->username = $request->username;
        $user->email = str_replace(' ', '', $request->email);
        $user->role = $request->role;
        //$user->password = bcrypt($request->password);     
        $user->save();
        
    	return redirect()->back()->with('mess', 'Đã sửa thành công');
    } 

    // Thay đổi mật khẩu
    function GetEditPassword($id) {
        $data['user'] = User::find($id);
        return view('edit_password', $data);
    }
    function PostEditPassword(EditPasswordRequest $request, $id) {
        // Cập nhật vào csdl
        $user = User::find($id);
        $pass_old = $request->password_old;
        $pass_confirm = $request->password_confirmation;
        $pass_new = $request->password_new;
        
        if(Hash::check($pass_old, $user->password)) { // Hash::check($plainText, $hashedPassword)
            $user->password = bcrypt($pass_new);      
            $user->save();
            return redirect()->back()->with('mess', 'Thay đổi mật khẩu thành công');
        } else{
            return redirect()->back()->with('mess', 'Mật khẩu cũ không đúng');  
        }
    } 

    // Xóa người dùng
 	function GetDeleteUser($id) {
    	User::destroy($id);
    	return redirect()->back()->with('mess', 'Đã xóa thành công');
    }
}
