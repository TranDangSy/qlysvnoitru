<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRoomRequest;

class RoomController extends Controller
{
    //
    public function index(){
        $room = Room::all();
        return view('admin.room.index',['room'=>$room]);
    }

    public function createroom(){
    	return view('admin.room.createroom');
    }

    public function store(StoreRoomRequest $request)
    {

        $image = $this->upload($request->file('file'), 'admin_asset/img/imgroom/');
        $request->merge(['image' => $image]);
        $room = Room::create($request->all());

        return redirect('admin/room')->with('thongbao','Thêm phòng thành công hãy kiểm tra lại');
    }

    public function on($id)
    {
        $room = Room::find($id);  
        if ($room)
        {
            $room->status = 1;
            $room->save();
            return redirect('admin/room');
        }
        else {
            return redirect('admin/room');
        } 
    }

    public function off($id)
    {
        $room = Room::find($id);
        $students = $room->students;
        if ($room) 
        {
            $room->status = 0;
            $room->save();
            return redirect('admin/room');
        }
        else 
            return redirect('admin/room');
    }

    public function detail(Request $request,$id)
    {
        $room = Room::find($id);
        $students = $room->students;
        return view('admin.room.infobackend',compact('room','students'));
    }

    public function update(Request $request,$id)
    {
        $room = Room::find($id);
        $room->number_bed = $request->number_bed;
        $room->price = $request->price;
        $room->water_price = $request->water_price;
        $room->electric_price = $request->electric_price;
        $room->status = $request->status;
        $room->save();
        return redirect('admin/room/detail/'.$id)->with('thongbao','Chỉnh sửa thông tin phòng thành công');
    }

    public function destroy($id)
    {
        $rooms = Room::find($id);
        $rooms->delete();
        return redirect('admin/room');
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $rooms = Room::where('name','like',"%{$key}%")->get();
        // dd($rooms);
        return view('admin/room/search',compact('rooms'));
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
