<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Room;

class StudentController extends Controller
{

    public function index()
    {
        // $sv = DB::table('students')->get();
        $student = Student::all();
        return view('admin.student.index',['student'=>$student]);
    }

    public function create()
    {
        $rooms = Room::all(); 
    	return view('admin.student.addsv',compact('rooms'));
    }

    public function store(StoreStudentRequest $request)
    {   
        $avatar = $this->upload($request->file('file'), 'admin_asset/img/imgsv/');
        $request->merge(['avatar' => $avatar]);
        $student = Student::create($request->all());

        return redirect('admin/student/createsv')->with('thongbao','Thêm sinh viên thành công hãy kiểm tra lại');
    }

    public function detail(Request $request,$id)
    {
        $student = Student::find($id);
        $rooms = Room::all();

        return view('admin.student.detail',compact('student','rooms'));
    }

    public function on($id)
    {
        $student = Student::find($id);
        if ($student)
        {
            $student->status = 1;
            $student->save();
            return redirect('admin/student');
        }
        else
        {
            return redirect('admin/student');
        }    
    }

    public function off($id)
    {
        $student = Student::find($id);
        if ($student)
        {
            $student->status = 0;
            $student->save();
            return redirect('admin/student');
        }
        else
        {
            return redirect('admin/student');
        }    
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('admin/student');
    }

    public function getupdate($id)
    {
        $student = Student::find($id);
        return view('admin.student.update',['student' => $student]);
    }

    public function postupdate(Request $request, $id)
    {
        $student = Student::find($id);
        $this->validate($request,[
            'name' => 'min:2|max:32'
        ],[
            'name.min' => 'Tên sinh viên phải lớn hơn 2 kí tự',
            'name.max' => 'Tên sinh viên không quá 32 kí tự'
        ]);

        $student->name = $request->name;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->note = $request->note;
        $student->birth_of_date = date("Y-m-d",strtotime($request->birth_of_date));
        $student->id_card = $request->id_card;
        $student->save();
        return redirect('admin/student/getupdate/'.$id)->with('thongbao','Chỉnh sửa sinh viên thành công hãy kiểm tra lại');
    }

    public function getedit($id){
        $student = Student::find($id);
        return view('admin.student.edit',['student'=>$student]);
    }

    public function postedit(Request $request,$id)
    {
        $student = Student::find($id);
        $avatar = $this->upload($request->file('file'), 'admin_asset/img/imgsv/');
        $request->merge(['avatar' => $avatar]);
        $student->avatar = $request->avatar;
        $student->save();

        return redirect('admin/student/editimage/'.$id)->with('thongbao','Chỉnh sửa sinh viên thành công hãy kiểm tra lại');
    }

    public function editroom(Request $request,$id)
    {
        $student = Student::find($id);
        $student->room_id = $request->room_id;
        $student->save();

        return redirect('admin/student/detail/'.$id)->with('thongbao','Chuyển phòng thành công');
    }

    /**
     * @param $file
     * @return mixed
     */
    public function upload($file, $path)
    {
        $name = sha1(date('YmdHis') . str_random(30)) . str_random(2) . '.' . $file->getClientOriginalExtension();

        $file->move($path, $name);

        return $path . $name;
    }

}
