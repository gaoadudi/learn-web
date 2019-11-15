<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{AddEmployeeRequest,EditEmployeeRequest};
use App\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    // Hiển thị danh sách nhân viên
    function GetListEmployee() {
    	$data['employees'] = Employee::paginate(5);
    	return view('list_employee', $data);
    }

    // Tìm kiếm nhân viên
    function GetSearchEmployee(Request $request) {
        $request->validate(
            // Các quy tắc đối với dữ liệu input
            [
                'keyword'=>'required',
            ],
            // Thông báo lỗi
            [
                'keyword.required'=>'Nhập thông tin để tìm!',
            ]
        );

        $control = $request->control;
        $keyword = $request->keyword;
        $employees = Employee::where($control,'like','%'.$keyword.'%')->paginate(5);
        return view('list_employee', compact('employees'));
    }

    // Thêm nhân viên
    function GetAddEmployee() {
    	return view('add_employee');
    }
    function PostAddEmployee(AddEmployeeRequest $request) {
        // Upload ảnh lên csdl
        $photo = $request->photo;
        if ($request->hasFile('photo')){
            $request->file('photo')->move(
                'img',// nơi lưu
                $photo->getClientOriginalName()// tên file
            );
        }

    	// Thêm vào csdl
    	$employee = new Employee;
    	$employee->name = $request->name;
        $employee->photo = $photo->getClientOriginalName();    
    	$employee->jobtitle = $request->jobtitle;
    	$employee->cellphone = $request->cellphone;
    	$employee->email = $request->email;    	
    	$employee->save();

    	return redirect()->back()->with('mess', 'Đã thêm thành công');
    }

    // Sửa nhân viên
    function GetEditEmployee($id) {
    	$data['employee'] = Employee::find($id);
    	return view('edit_employee', $data);
    }
    function PostEditEmployee(EditEmployeeRequest $request, $id) {
        $photo = $request->photo;
        if ($request->hasFile('photo')){
            $request->file('photo')->move(
                'img',// nơi lưu
                $photo->getClientOriginalName()// tên file
            );
        }

    	// Cập nhật vào csdl
    	$employee = Employee::find($id);
    	$employee->name = $request->name;
    	if ($request->hasFile('photo')){
            $employee->photo = $photo->getClientOriginalName();
        }
    	$employee->jobtitle = $request->jobtitle;
    	$employee->cellphone = $request->cellphone;
    	$employee->email = $request->email;    	
    	$employee->save();

    	return redirect()->back()->with('mess', 'Đã sửa thành công');
    } 

    // Xóa nhân viên
 	function GetDeleteEmployee($id) {
    	Employee::destroy($id);
    	return redirect()->back()->with('mess', 'Đã xóa thành công');
    }
}
