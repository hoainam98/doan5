<?php

namespace App\Http\Controllers;

use App\Models\LoaiMenus;
use Illuminate\Http\Request;
use Validator;

class LoaiMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaimenu=LoaiMenus::paginate(5);
        return view('admin.pages.LoaiMenu.list',compact("loaimenu"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validator =Validator::make($request->all(),[

            'name'=>'required|min:2|max:255'
        ],[

            'required'=>'Tên không được để trống',
            'min'=>'Tên có độ dài từ 2 đến 255 kí tự',
            'max'=>'Tên có độ dài từ 2 đến 255 kí tự',
        ]);
        if ($Validator->fails()){
            return response()->json(['error'=>'true','message'=>$Validator->errors()],200);
        }
        LoaiMenus::create([
            'name' => $request->name,
            'note' => $request->note
        ]);
        return response()->json(['success' => 'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoaiMenu  $loaiMenu
     * @return \Illuminate\Http\Response
     */
    public function show(LoaiMenu $loaiMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoaiMenu  $loaiMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaimenu=LoaiMenus::find($id);
        return response()->json($loaimenu,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoaiMenu  $loaiMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Validator =Validator::make($request->all(),[

            'name'=>'required|min:2|max:255'
        ],[

            'required'=>'Tên không được để trống',
            'min'=>'Tên có độ dài từ 2 đến 255 kí tự',
            'max'=>'Tên có độ dài từ 2 đến 255 kí tự',
        ]);
        if ($Validator->fails()){
            return response()->json(['error'=>'true','message'=>$Validator->errors()],200);
        }
        $loaimenu=LoaiMenus::find($id);
        $loaimenu->update([
            'name' => $request->name,
            'note' => $request->note
        ]);
        return response()->json(['success' => 'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoaiMenu  $loaiMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaimenu = LoaiMenus::find($id);
        $loaimenu->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }
}
