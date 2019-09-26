<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\LoaiMenus;
use Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu=Menu::paginate(5);
        $loaimenu=LoaiMenus::all();
        return view('admin.pages.Menu.list',compact("menu","loaimenu"));
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
        Menu::create([
            'name' => $request->name,
            'slug' => utf8tourl($request->name),
            'idLoaiMenu'=>$request->idLoaiMenu,
            'note' => $request->note,
            'status' => $request->status
        ]);
        return response()->json(['success' => 'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu=Menu::find($id);
        return response()->json($menu,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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
        $menu=Menu::find($id);
        $menu->update([
            'name' => $request->name,
            'slug' => utf8tourl($request->name),
            'idLoaiMenu'=>$request->idLoaiMenu,
            'note' => $request->note,
            'status' => $request->status
        ]);
        return response()->json(['success' => 'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }
}
