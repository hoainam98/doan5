@extends('admin.layouts.master')
@section('title')
Danh sách Menu
@endsection
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Danh sách Menu</h6>
	</div>
	<button class="btn btn-primary add"  data-toggle="modal" data-target="#add" type="button" style="width: 125px"><i class="fas fa-add"></i>Thêm</button>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th>Loai Menu</th>
						<th>Note</th>
						<th>Status</th>
						<th>Sửa</th>
						<th>Xóa</th>
					</tr> 
				</thead>
				<tbody>
					@foreach($menu as $key =>$value)
					<tr>
						<td>{{$key}}</td>
						<td>{{$value->name}}</td>
						<td>{{$value->loaiMenu->name}}</td>
						<td>{{$value->note}}</td>
						<td>
							@if($value->status==1)
								{{"Hiển thị"}}
							@else
								{{"Không hiển thị"}}
							@endif
						</td>
						<td><button class="btn btn-primary edit" title="{{ "Sửa ".$value->name }}" data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button></td>
						<td><button class="btn btn-danger delete" title="{{ "Xóa ".$value->name }}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button></button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="pull-right">{{$menu->links()}}</div>
		</div>
	</div>
</div>
<!-- Add Modal-->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm menu <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
				        <div class="col-lg-12">
				            <form role="form" >
				            	<!-- <input type="hidden" name="id" value=""> -->
				                <fieldset class="form-group">
				                    <label>Name</label>
				                    <input class="form-control name" name="name" placeholder="Nhập tên menu">
				                    <span class="error" style="color: red;font-size: 1rem;"></span>
				                </fieldset>
				                <div class="form-group">
				                    <label>Loại menu</label>
				                    <select class="form-control idLoaiMenu" name="idLoaiMenu">
				                    	@foreach($loaimenu as $key =>$loaimn)
				                        <option value="{{$loaimn->id}}" class="mn{{$loaimn->id}}">{{$loaimn->name}}</option>
				                        @endforeach
				                    </select>
				                </div>
				                <fieldset class="form-group">
				                    <label>Note</label>
				                    <input class="form-control note" name="note" placeholder="Nhập note loại menu">
				             
				                </fieldset>
				                <div class="form-group">
				                    <label>Status</label>
				                    <select class="form-control status" name="status">
				                        <option value="1" class="ht">Hiển Thị</option>
				                        <option value="0" class="kht">Không Hiển Thị</option>
				                    </select>
				                </div>
				            </form>
				        </div>
				    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success add1">Save</button>
                    <button type="reset" class="btn btn-primary">Làm Lại</button>
                    <button class="btn btn-secondary cl" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa Menu <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
				        <div class="col-lg-12">
				            <form role="form">
				            	<!-- <input type="hidden" name="id" value=""> -->
				                <fieldset class="form-group">
				                    <label>Name</label>
				                    <input class="form-control name1" name="name1" placeholder="Nhập tên menu">
				                    <span class="error" style="color: red;font-size: 1rem;"></span>
				                </fieldset>
				                <div class="form-group">
				                    <label>Loại menu</label>
				                    <select class="form-control idLoaiMenu1" name="idLoaiMenu1">
				                    	@foreach($loaimenu as $key =>$loaimn)
				                        <option value="{{$loaimn->id}}" class="mn{{$loaimn->id}}">{{$loaimn->name}}</option>
				                        @endforeach
				                    </select>
				                </div>
				                <fieldset class="form-group">
				                    <label>Note</label>
				                    <input class="form-control note1" name="note1" placeholder="Nhập note loại menu">
				             
				                </fieldset>
				                <div class="form-group">
				                    <label>Status</label>
				                    <select class="form-control status1" name="status1">
				                        <option value="1" class="ht1">Hiển Thị</option>
				                        <option value="0" class="kht1">Không Hiển Thị</option>
				                    </select>
				                </div>
				            </form>
				        </div>
				    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success update">Save</button>
                    <button type="reset" class="btn btn-primary">Làm Lại</button>
                    <button class="btn btn-secondary cl" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success del">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
	// Thêm loại menu
	$(document).ready(function(){
	    $('.add').click(function(){
	        $('.error').hide();
	        $('.add1').click(function(){
	            let name = $('.name').val();
	            let idLoaiMenu = $('.idLoaiMenu').val();
	            let note = $('.note').val();
	            let status = $('.status').val();
	            $.ajax({
	                url : 'admin/menu',
	                data : {
	                    name : name,
	                    idLoaiMenu: idLoaiMenu,
	                    note : note,
	                    status:status
	                },
	                type : 'post',
	                dataType : 'json',
	                success : function($result){
	                    console.log($result);
	                    if($result.error=='true')
	                    {
	                        $('.error').show();
	                        $('.error').text($result.message.name[0]);
	                    }
	                    else{
	                        toastr.success($result.success, 'Thêm thành công', {timeOut: 5000});
	                        $('.add').modal('hide');
	                        location.reload();
	                    }
	                }
	            });
	        });
	    });
	});
	// Sửa Slide
	$(document).ready(function(){
	    $('.edit').click(function(){
	        $('.error').hide();
	        let id = $(this).data('id');
	        //Edit
	        $.ajax({
	            url : 'admin/menu/'+id+'/edit',
	            dataType : 'json',
	            type : 'get',
	            success :function($result){
	            	console.log($result);
	                $('.name1').val($result.name);
	                $('.title1').val($result.name);
                    $('.mn'+$result.idLoaiMenu+'').attr('selected','selected');
	                $('.note1').val($result.note);
	                if($result.status == 1){
                    $('.ht1').attr('selected','selected');
                }else{
                    $('.kht1').attr('selected','selected');
                }
                
	            }
	        });
	        $('.update').click(function(){
	            let name = $('.name1').val();
	            let idLoaiMenu=$('.idLoaiMenu1').val();
	            let note = $('.note1').val();
	            let status = $('.status1').val();
	            if($('.status1').val() == 1){
                    $('.ht1').attr('selected','');
                }else{
                    $('.kht1').attr('selected','');
                }
                $('.mn'+$('.idLoaiMenu1').val()+'').attr('selected','');
	            $.ajax({
	                url : 'admin/menu/'+id,
	                data : {
	                    name : name,
	                    idLoaiMenu:idLoaiMenu,
	                    note : note,
	                    status:status
	                },
	                type : 'put',
	                dataType : 'json',
	                success : function($result){
	                    console.log($result);
	                    if($result.error=='true')
	                    {
	                        $('.error').show();
	                        $('.error').text($result.message.name[0]);
	                    }
	                    else{
	                        toastr.success($result.success, 'Sửa thành công', {timeOut: 5000});
	                        $('.edit').modal('hide');
	                        location.reload();
	                    }
	                }
	            });
	        });
	        $('.cl').click(function(){
	        	if($('.status1').val() == 1){
                    $('.ht1').attr('selected','');
                }else{
                    $('.kht1').attr('selected','');
                }
                $('.mn'+$('.idLoaiMenu1').val()+'').attr('selected','');
                location.reload();
	        });
	    });
	    //Delete slide
	    $('.delete').click(function(){
	        let id = $(this).data('id');
	        $('.del').click(function(){
	            $.ajax({
	                url : 'admin/menu/'+id,
	                dataType : 'json',
	                type : 'delete',
	                success : function($result){
	                    toastr.success($result.success, 'Xóa thành công', {timeOut: 5000});
	                    $('.delete').modal('hide');
	                    location.reload();
	                }
	            });
	        });
	    });
	});
</script>
@endsection