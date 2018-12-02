<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class useradController extends Controller
{
    //

    public function index(){
        $users = User::all();
        return view('admin.userad.index',['users' => $users]);
    }

    public function create()
    {
    	return view('create');
    }

    public function store(StoreUserRequest $request)
    {
        $avatar = $this->upload($request->file('file'), 'admin_asset/img/');
        $request->merge(['avatar' => $avatar]);
        // $user->password = Hash::make($request->password);
        $users = User::create($request->all());

        return redirect('create')->with('thongbao','Tạo tài khoản thành công hãy đăng nhập');
    }

    public function getlogin()
    {
        return view('admin.login');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'password' => 'required|max:32'
            ],
            [
                'name.required' => 'Bạn chưa nhập user name',
                'password.required' => 'Bạn chưa nhập password',
                'password.max' => 'Password không được nhiều hơn 32 kí tự'
            ]);

        if (Auth::attempt(['name'=>$request->name,'password'=>$request->password]))
        {
            return redirect('admin');
        }
        else
        {
            return redirect('admin/login')->withErrors('Tên hoặc mật khẩu không đúng hoặc bạn không có quyền đăng nhập');
        }
    }

    public function postlogout()
    {
        Auth::logout();

        return redirect('admin/login');
    }

    public function info(Request $request,$id)
    {
        $user = User::find($id);

        return view('admin/userad/info',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.userad.update',compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->status = $request->status;
        // $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect('admin/user/edit/'.$id)->with('thongbao','Chỉnh sửa sinh viên thành công hãy kiểm tra lại');
    }

    public function updateimage(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $avatar = $this->upload($request->file('file'), 'admin_asset/img/');
        $request->merge(['avatar' => $avatar]);
        $user->avatar = $request->avatar;
        $user->save();

        return redirect('admin/user/info/'.$id)->with('message','Sửa ảnh thành công');
    }

    public function repass(UpdateUserRequest $request, $id)
    {
        // Auth::user()->id
        if (Auth::user())
        {
            $user = User::find($id);
            if ($user->password = $request->password)
            {
                $user->password = $request->newpassword;
                $user->save();
                return redirect('admin/user/info/'.$id)->with('message','Đổi mật khẩu thành công');
            }
            else
            {
                return redirect('admin/user/info/'.$id)->with('message','Mật khẩu cũ không đúng');
            }
        }
        else{
            return redirect('admin');
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user');
    }

    public function on($id)
    {
        $user = User::find($id);
        if ($user)
        {
            $user->status = 1;
            $user->save();
            return redirect('admin/user');
        }
        else
        {
            return redirect('admin/user');
        }    
    }

    public function off($id)
    {
        $user = User::find($id);
        if ($user)
        {
            $user->status = 0;
            $user->save();
            return redirect('admin/user');
        }
        else
        {
            return redirect('admin/user');
        }    
    }

    public function upload($file, $path)
    {
        $name = sha1(date('YmdHis') . str_random(30)) . str_random(2) . '.' . $file->getClientOriginalExtension();

        $file->move($path, $name);

        return $path . $name;
    }
}
