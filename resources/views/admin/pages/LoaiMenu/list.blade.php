@extends('admin.layouts.master')
@section('title')
Danh sách loại Menu
@endsection
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Danh sách loại Menu</h6>
	</div>
	<button class="btn btn-primary add"  data-toggle="modal" data-target="#add" type="button" style="width: 125px"><i class="fas fa-add"></i>Thêm</button>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th>Note</th>
						<th>Sửa</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($loaimenu as $key =>$value)
					<tr>
						<td>{{$key}}</td>
						<td>{{$value->name}}</td>
						<td>{{$value->note}}</td>
						<td><button class="btn btn-primary edit" title="{{ "Sửa ".$value->name }}" data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button></td>
						<td><button class="btn btn-danger delete" title="{{ "Xóa ".$value->name }}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button></button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="pull-right">{{$loaimenu->links()}}</div>
		</div>
	</div>
</div>
<!-- Add Modal-->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm loại menu <span class="title"></span></h5>
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
				                    <input class="form-control name" name="name" placeholder="Nhập tên loại menu">
				                    <span class="error" style="color: red;font-size: 1rem;"></span>
				                </fieldset>
				                <fieldset class="form-group">
				                    <label>Note</label>
				                    <input class="form-control note" name="note" placeholder="Nhập note loại menu">
				             
				                </fieldset>
				            </form>
				        </div>
				    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success add1">Save</button>
                    <button type="reset" class="btn btn-primary">Làm Lại</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa loại Menu <span class="title"></span></h5>
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
				                    <input class="form-control name1" name="name1" placeholder="Nhập tên loại menu">
				                    <span class="error" style="color: red;font-size: 1rem;"></span>
				                </fieldset>
				                <fieldset class="form-group">
				                    <label>Note</label>
				                    <input class="form-control note1" name="note1" placeholder="Nhập note loại menu">
				             
				                </fieldset>
				            </form>
				        </div>
				    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success update">Save</button>
                    <button type="reset" class="btn btn-primary">Làm Lại</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
	            let note = $('.note').val();
	            $.ajax({
	                url : 'admin/loaimenu',
	                data : {
	                    name : name,
	                    note : note,
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
	            url : 'admin/loaimenu/'+id+'/edit',
	            dataType : 'json',
	            type : 'get',
	            success :function($result){
	                $('.name1').val($result.name);
	                $('.title1').val($result.name);
	                $('.note1').val($result.note);
	            }
	        });
	        $('.update').click(function(){
	            let name = $('.name1').val();
	            let note = $('.note1').val();
	            $.ajax({
	                url : 'admin/loaimenu/'+id,
	                data : {
	                    name : name,
	                    note : note,
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
	                        $('.update').modal('hide');
	                        location.reload();
	                    }
	                }
	            });
	        });
	        
	        
	    });
	    //Delete slide
	    $('.delete').click(function(){
	        let id = $(this).data('id');
	        $('.del').click(function(){
	            $.ajax({
	                url : 'admin/loaimenu/'+id,
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