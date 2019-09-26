<?php

namespace App\Http\Controllers;

use App\Slides;
use Illuminate\Http\Request;
use App\Models\Slide;
use Validator;
class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide=Slide::paginate(5);
        return view('admin.pages.Slide.list',compact("slide"));
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
        if($request->hasFile('image')){
            $file=$request->image;
            //Lấy tên file
            $file_name=$file->getClientOriginalName();
            //Lấy loại file
            $file_type=$file->getMineType();
            //Kích thước file đơn vị byte
            $file_size=$file->getSize();
            if($file_type=='image/png'|| $file_type=='image/jpg'|| $file_type=='image/jpeg'|| $file_type=='image/gif'){
                if($file_size<=2097152){
                    $file_name=date('D-m-yyyy').'_'.rand().'_'.utf8tourl($file_name);
                    if($file->move('img/upload/slides',$file_name)){
                        Slide::create([
                            'name' => $request->name,
                            'slug' => utf8tourl($request->name),
                            'url' => $request->url,
                            'image' => $file_name,
                            'status' => $request->status
                        ]);
                    return response()->json(['success' => 'Thêm thành công']);
                    }
                }
                else{
                     return response()->json(['error_img'=>'true','message_img'=>'Bạn không thể upload ảnh quá 2MB'],200);
                }
            }
            else{
                return response()->json(['error_img'=>'true','message_img'=>'File bạn chọn không phải là hình ảnh'],200);
            }
        }
        else{
            return response()->json(['error_img'=>'true','message_img'=>'Bạn chưa thêm ảnh minh họa cho sản phẩm'],200);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function show(Slides $slides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide=Slide::find($id);
        return response()->json($slide,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slides  $slides
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
        $slide=Slide::find($id);
        $slide->update([
            'name' => $request->name,
            'slug' => utf8tourl($request->name),
            'url' => $request->url,
            'image' => $request->image,
            'status' => $request->status
        ]);
        return response()->json(['success' => 'Sửa thành công','slidea'=>$request->status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }
}
