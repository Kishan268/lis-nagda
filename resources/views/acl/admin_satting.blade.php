@extends('layouts.main')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<a data = 'role' class="col-md-2 btn btn-outline-primary  text-center active_class get_table active role_permission_user show"  id="roles_table">
						Roles & Permissions</a>

						{{-- <a style="background: #5bc0de;" data = 'permissions_table' class="col-md-3 text-center btn big get_table" id="permissions_table">
						Permissions</a> --}}

						<a data="user" class="col-md-2 text-center btn btn-outline-primary get_table inactive role_permission_user" id="user_table" >
						Users</a>
					</div>
				</div>
				<div class="card-body">
					<div class="full-center" align="center">
							<a data = 'role' class=" text-center btn btn-outline-info  active_class role_permission get_table active"  id="roles_table" align="center">
							Roles</a>
							<a  data = 'permissions_table' class="text-center btn btn-outline-info role_permission active_class get_table inactive" id="permissions_table">
							Permissions</a>
						</div>
					<div class="row mt-4">
						<div class="col-sm-12 col-md-12 col-xl-12  table-responsive " id="mytable1">
							<form class="form-block" method="post" action="{{route('admin.store')}}" >
							{{csrf_field()}}
							<div class="form-group" style="margin-left: 20px;text-align: center;" align="center">	
								<input  class="form-group col-md-3" type="text" name="name" placeholder="Role Name" align="center"><br>

								@error('name')
									<span class="invalid-feedback d-block" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
								<input  style="margin-top: 10px;" class="btn btn-outline-success" type="submit" name="submit" value="Submit">
							</div>
						</form>	
					<table class="table table-stripped table-bordered" id="role_table" style="width: 100%">
						<thead>
							<tr>
								<th>SNo.</th>
								<th>Role</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php  $count =0;	@endphp 
							@foreach($show_role as $roles)
								<tr>
									<td  style="width: 16.66%">{{ ++$count}}</td>
									<td>{{$roles->name}}</td>
									<td  style="width: 16.66%;text-align: center;">
										<a href="{{route('admin.edit',[$roles->id])}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
										{{-- <a href="{{route('delete',$roles->id)}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> --}}
										<a href="{{route('admin.show',[$roles->id])}}"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					</div>
				</div>
				
					<div class="row">

					<div class="col-sm-12 col-md-12 col-xl-12  table-responsive " id="mytable2" style="display: none;">
						{{-- <a style="margin-left: 18px;margin-bottom: 10px;" href="{{route('permissions.create')}}" id="add" type="button" class="btn btn-primary fa fa-plus">Add Permissions</a> --}}
						<form style="width:100%;" class="form-block" method="post" action="{{route('permissions.store')}}">
							{{csrf_field()}}
							
							<div class="form-group" style="margin-left: 20px;text-align: center;">	
								<input  class="form-group col-md-3" type="text" name="name" placeholder="Permission Name" align="center"><br>
								@error('name')
									<span class="invalid-feedback d-block" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
								<input  style="margin-top: 10px;" class="btn btn-outline-success" type="submit" name="submit" value="Submit">
							</div>
						</form>
						<table class="table table-stripped table-bordered" id="role_table1" style="width: 100%">
							<thead>
								<tr>
									<th>SNo.</th>
									<th>Permissions</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php  $count =0;	@endphp 
								@foreach($permissions as $permissionss)
									<tr>
										<td  style="width: 16.66%">{{ ++$count}}</td>
										<td>{{$permissionss->name}}</td>
										<td  style="width: 16.66%; text-align: center;">
											<a href="{{route('permissions.edit',$permissionss->id)}}"><i class="fa fa-pencil-square-o  fa-lg" aria-hidden="true"></i></a>
											{{-- <a href="{{route('delete_permissions',$permissionss->id)}}"><i class="fa fa-trash  fa-lg" aria-hidden="true"></i></a> --}}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
			
					<div class="col-sm-12 col-md-12 col-xl-12  table-responsive " style="display: none;" id="mytable3">
		
						<a style="margin-left: 18px;margin-bottom: 10px;" href="{{route('users.create')}}" id="add" type="button" class="btn btn-outline-primary fa fa-plus">Add User</a>

						<table class="table table-stripped table-bordered" id="role_table2" style="width: 100%">
							<thead>
								<tr>
									<th>SNo.</th>
									<th>User</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php  $count =0;	@endphp 
								@foreach($user as $users)
									<tr>
										<td style="width: 16.66%">{{ ++$count}}</td>
										<td>{{$users->name}}</td>
										<td>{{$users->email}}</td>
										<td style="width: 16.66%;text-align: center;">
											<a href="{{route('users.edit',$users->id)}}"><i class="fa-lg fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
											{{-- <a href="{{route('destroy',$users->id)}}"><i class="fa-lg fa fa-trash" aria-hidden="true"></i></a> --}}
											<a href="{{route('users.show',$users->id)}}"><i class="fa fa-eye  fa-lg" aria-hidden="true"></i></a>&nbsp;	
											<buttum class="text-default fa fa-user assign_role_permission" data="{{$users->id}}" id="buttun{{$users->id}}" ></buttum>
											<select style="display: none;" id="role_permission_show{{$users->id}}" data = "{{$users->id}}" class="role_permission_change">
												<option value="0">Select</option>
												<option value="role">Assign Role</option>
												<option value="permission">Assign Permission</option>
											</select>
											{{-- <a href="{{route('users.show',$users->id)}}"><i class="fa fa-eye    fa-lg" aria-hidden="true"></i></a>	 --}}

										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
					<div class="show_role_permission"></div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){

	$('.role_permission_user').on('click',function(){
		$('.role_permission_user').removeClass('active').addClass('inactive');
		$(this).removeClass('inactive').addClass('active');
		$('.role_permission').hide();
	});
	$('.show').on('click',function(){
		
		$('.role_permission').show();
	});
	$('.role_permission').on('click',function(){
		$('.role_permission').removeClass('active').addClass('inactive');
		$(this).removeClass('inactive').addClass('active');

	});
		$('#role_table').DataTable();
		$('#role_table1').DataTable();
		$('#role_table2').DataTable();

		$('#roles_table,#permissions_table,#user_table').on('click',function(){
			var mylawyers = $(this).attr('data');
		
			if(mylawyers=='role'){
				$('#mytable1').show();
				$('#mytable2').hide();
				$('#mytable3').hide();
			}
			else if(mylawyers=='permissions_table'){
				$('#mytable1').hide();
				$('#mytable2').show();
				$('#mytable3').hide();
			}
			else{
				$('#mytable1').hide();
				$('#mytable2').hide();
				$('#mytable3').show();
			}
		});

		$('.assign_role_permission').on('click',function(){
			var id = $(this).attr('data');
				$('#role_permission_show'+id).show();
				$('#button'+id).hide();

		});

		$(this).on('change','.role_permission_change',function(){
			var id = $(this).attr('data');
			var val = $(this).val();

			// if (val !=0) {
				$.ajax({
					type:'POST',
					url:'{{route('showUserRolePermission')}}',
					data:{id:id,val:val, "_token": "{{ csrf_token() }}"},
					 success:function(res){
					 	$('#mytable3').empty(res);
					 	$('#mytable3').hide();
					 	$('.show_role_permission').html(res);
		              // if(res == 'success'){
		                // $.notify("Role change successfully",'success');
		              // }
		            }
				});
			// }

		})

	})	
</script>

@endsection