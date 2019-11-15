<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{AddDepartmentRequest,EditDepartmentRequest};
use App\Department;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
	// Hiển thị danh sách phòng ban
    function GetListDepartment() {
    	$data['departments'] = Department::paginate(5);
    	return view('list_department', $data);
    }

    // Thêm phòng ban
    function GetAddDepartment() {
    	return view('add_department');
    }
    function PostAddDepartment(AddDepartmentRequest $request) {
    	// Thêm vào csdl
    	$department = new Department;
    	$department->name = $request->name;
    	$department->officephone = $request->officephone;
    	$department->manager = $request->manager;
    	$department->save();

    	return redirect()->back()->with('mess', 'Đã thêm thành công');
    }

    // Sửa phòng ban
    function GetEditDepartment($id) {
    	$data['department'] = Department::find($id);
    	// Danh sách nhân viên ko thuộc phòng ban nào
    	$data['employees'] = DB::table('employee')->where('iddepart','=',null)->get();
    	// Danh sách nhân viên thuộc phòng ban
    	$data['employees2'] = DB::table('employee')->where('iddepart','=',$id)->get();
    	return view('edit_department', $data);
    }
    function PostEditDepartment(EditDepartmentRequest $request, $id) {
    	// Cập nhật vào csdl
    	$department = Department::find($id);
    	$department->name = $request->name;
    	$department->officephone = $request->officephone;
    	$department->manager = $request->manager;
    	$department->save();

    	return redirect()->back()->with('mess', 'Đã sửa thành công');
    }

    // Thêm nhân viên vào phòng ban 
	function GetAddEmployeeDepart(Request $request, $id_depart) {
		$request->validate(
    		// Các quy tắc đối với dữ liệu input
    		[
    			'id_employ'=>'required',
    		],
    		// Thông báo lỗi
    		[
    			'id_employ.required'=>'Không có nhân viên để thêm',
    		]
    	);
    	$id_employ = $request->id_employ;
    	DB::table('employee')->where('id','=',$id_employ)->update(['iddepart'=>$id_depart]);
    	return redirect()->back()->with('mess', 'Đã thêm nhân viên thành công');
    }    
    // Xóa nhân viên khỏi phòng ban
    function GetDeleteEmployeeDepart($id_employ) {
    	DB::table('employee')->where('id','=',$id_employ)->update(['iddepart'=>null]);
    	return redirect()->back()->with('mess', 'Đã xóa nhân viên thành công');
    }  

    // Xóa phòng ban
 	function GetDeleteDepartment($id) {
    	Department::destroy($id);
    	return redirect()->back()->with('mess', 'Đã xóa thành công');
    }   

}
