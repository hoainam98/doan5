@extends('admin.layouts.master')
@section('title')
Danh sách slide
@endsection
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Danh sách slide</h6>
	</div>
	<button class="btn btn-primary add"  data-toggle="modal" data-target="#add" type="button" style="width: 125px"><i class="fas fa-add"></i>Thêm</button>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th>Url</th>
						<th>Image</th>
						<th>Status</th>
						<th>Sửa</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($slide as $key =>$value)
					<tr>
						<td>{{$key}}</td>
						<td>{{$value->name}}</td>
						<td>{{$value->url}}</td>
						<td>{{$value->image}}</td>
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
			<div class="pull-right">{{$slide->links()}}</div>
		</div>
	</div>
</div>
<!-- Add Modal-->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm slide <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
				        <div class="col-lg-12">
				            <form role="form" enctype="multipart/form-data" method="post" id="upload_form">
				            	<!-- <input type="hidden" name="id" value=""> -->
				                <fieldset class="form-group">
				                    <label>Name</label>
				                    <input class="form-control name" name="name" placeholder="Nhập tên Slide">
				                    <span class="error" style="color: red;font-size: 1rem;"></span>
				                </fieldset>
				                <fieldset class="form-group">
				                    <label>url</label>
				                    <input class="form-control url" name="url" placeholder="Nhập url slide">
				             
				                </fieldset>
				                <fieldset class="form-group">
				                    <label>Image:</label>
                                <input type="file" name="image" class="form-control image">
				                <span class="error_img" style="color: red;font-size: 1rem;"></span>
				                </fieldset>
				                <div class="form-group">
				                    <label>Status</label>
				                    <select class="form-control status" name="status">
				                        <option value="1" class="ht">Hiển Thị</option>
				                        <option value="0" class="kht">Không Hiển Thị</option>
				                    </select>
				                </div>
                                <div class="form-group">
                                    <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Save">
                                    <button type="reset" class="btn btn-primary">Làm Lại</button>
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div> 
				            </form>
				        </div>
				    </div>
                </div>
                
            </div>
        </div>
    </div>
<!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa Slide <span class="title"></span></h5>
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
				                    <input class="form-control name1" name="name1" placeholder="Nhập tên Slide">
				                    <span class="error" style="color: red;font-size: 1rem;"></span>
				                </fieldset>
				                <fieldset class="form-group">
				                    <label>url</label>
				                    <input class="form-control url1" name="url1" placeholder="Nhập url slide">
				             
				                </fieldset>
				                <fieldset class="form-group">
				                    <label>Image</label>
                                <input class="form-control image1" name="image1" placeholder="Nhập image slide">
				                    
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
	// Thêm Slide
$(document).ready(function(){
    $('.add').click(function(){
        $('.error').hide();
        $('#upload_form').on('submit', function(event){
            event.preventDefault();
            // let name = $('.name').val();
            // let url = $('.url').val();
            // let image = $('.image').val();
            // let status = $('.status').val();
            let form_data = new FormData(this);
            console.log($form_data);
            $.ajax({
                url : 'admin/slides',
                data : $form_data,
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
                        if($result.error_img=='true')
                            {
                                $('.error_img').show();
                                $('.error_img').text($result.message_img);
                            }
                            else
                            {
                                toastr.success($result.success, 'Thêm thành công', {timeOut: 5000});
                                $('.add').modal('hide');
                                location.reload();
                            }
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
            url : 'admin/slides/'+id+'/edit',
            dataType : 'json',
            type : 'get',
            success :function($result){
                $('.name1').val($result.name);
                $('.title1').val($result.name);
                $('.url1').val($result.url);
                $('.image1').val($result.image);
                if($result.status == 1){
                    $('.ht1').attr('selected','selected');
                }else{
                    $('.kht1').attr('selected','selected');
                }
            }
        });
        $('.update').click(function(){
            let name = $('.name1').val();
            let url = $('.url1').val();
            let image = $('.image1').val();
            let status = $('.status1').val();
            console.log($('.image1').val() );
            $.ajax({
                url : 'admin/slides/'+id,
                data : {
                    name : name,
                    url : url,
                    image : image,
                    status : status,
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
                url : 'admin/slides/'+id,
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