@extends('layouts.main')
@section('title','Welcom: To Admin Panel')

@section('content')

 <main class="app-content">
    <div class="app-title">
{{--       <div>
        <h1><i class="fa fa-dashboard"></i>ACL</h1>
      </div> --}}
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::previous() }}"><i class="fa fa-arrow-left fa-lg "></i></a>&nbsp; &nbsp;</li>
        <li class="breadcrumb-item"><a href="#">ACL/{{request()->segment(1)}}/show roles & permissions</a></li>
      </ul>
    </div>
    <div class="col-md-12 m-auto">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-12 col-xl-12 col-sm-12 d-inline-flex radio-group" style=" ">

                <a  data = 'role' class="col-md-6 col-sm-6 text-center btn big active_class get_table roles_table btn btn-outline-info active">
                Roles</a>

                <a  data = 'permissions_table' class=" btn btn-outline-info col-md-6 col-sm-6 text-center btn big get_table permissions_table inactive">
                Permissionss</a>
                 
            </div>
          </div>        
        </div>

         <div class="card-body "  >
          <div class="row mytable1">
          <div class="col-md-12 m-auto">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label>Assign Roles to user:</label> 
                    <span><?php echo($data['user']['name']);?></span>
                    <input id="id" type="hidden" name="id" value="<?php echo($data['user']['id']);?>">
                  </div>
                </div>
              </div>
                <div class="col-sm-9 col-md-9">
                    <?php
                    foreach($data['role'] as $roles){ ?>
                        <input class="taskchecker" 
                        type="checkbox" name="role_val" <?php if(in_array($roles->id,$role_ids)){echo 'checked'; }?> value="{{$roles->id}}" disabled>&nbsp;&nbsp;{{$roles->name}}<br>
                      <label class="checkbox-inline">
                      </label>
                   <?php } ?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="display: none;" class="row mytable2" >
          
          <div class="col-md-12 m-auto">
            <div class="card">
               <div class="card-header">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label>Assign Permissions to user:</label> 
                    <span><?php echo($data['user']['name']);?></span>
                    <input id="id" type="hidden" name="id" value="<?php echo($data['user']['id']);?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-9 col-md-9">
                <?php foreach($data['permissions'] as $permission){ ?>
                    <input name="permission_id" class="taskchecker1" <?php if(in_array($permission->id,$permission_ids)){echo 'checked'; }?>
                      type="checkbox" value="{{$permission->id}}" disabled>&nbsp;&nbsp;{{$permission->name}}<br>
                    <label class="checkbox-inline">
                      
                    </label>
                <?php } ?>
             </div>
            </div>
          </div>
        </div>

        <div style="display: none;" class="row mytable3" >
          <div class="col-md-12 m-auto">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                      <table class="table table-stripped table-bordered" id="role_table2" style="width: 100%">
                      <thead>
                        <tr>
                          <th>SNo.</th>
                          <th>User</th>
                          <th>Email</th>
                          {{-- <th>Action</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @php  $count =0;  @endphp 
                        @foreach($user as $users)
                          <tr>
                            <td style="width: 15%">{{ ++$count}}</td>
                            <td style="width: 42%">{{$users->name}}</td>
                            <td style="width: 42%">{{$users->email}}</td>
                          {{--   <td style="width: 16.66%;text-align: center;">
                              {{ <a href="{{route('users.edit',$users->id)}}"><i class="fa-lg fa fa-pencil-square-o" aria-hidden="true"></i></a> --}}
                             {{--  <a href="{{route('destroy',$users->id)}}"><i class="fa-lg fa fa-trash" aria-hidden="true"></i></a> --}}
                             {{--  <a href="{{route('users.show',$users->id)}}"><i class="fa fa-eye   fa-lg" aria-hidden="true"></i></a>--}}                             
                          </tr>
                        @endforeach
                      </tbody>
                    </table>                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</main>     
<script>
  $(document).ready(function(){

    $('.btn').click(function(){
    $('.btn').removeClass('active').addClass('inactive');
     $(this).removeClass('inactive').addClass('active');
    });
    $('#role_table2').DataTable();

    $(".taskchecker").on("change", function() {
        var id  = $('#id').val();
        var val = [];        
        
          $("input[name='role_val']:checked").each(function(){
              val.push($(this).val());
           });
          $.ajax({
            type:'POST',
            url: "{{route('changesRole')}}",
            data: {'userId':id, 'roleId':val, "_token": "{{ csrf_token() }}",},
               success:function(res){
              if(res == 'success'){
                $.notify("Role change successfully",'success');
                
              }
            }
          });         
       /*  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
        $.post("/changes_role", {'userId':id, 'roleId':val}, function() {

        });*/
    })

    $('.roles_table,.permissions_table,.users_table').on('click',function(){
      var mylawyers = $(this).attr('data');
      
      if(mylawyers=='role'){
        $('.mytable1').show();
        $('.mytable2').hide();
        $('.mytable3').hide();
      }
    else if(mylawyers == 'users_table'){
        $('.mytable1').hide();
        $('.mytable2').hide();
        $('.mytable3').show();
      }
      else if(mylawyers == 'permissions_table'){
        $('.mytable1').hide();
        $('.mytable2').show();
        $('.mytable3').hide();
      }
    });

    $(".taskchecker1").on("change", function() {
        var id  = $('#id').val();
        var val = [];

          $("input[name='permission_id']:checked").each(function(i){
              val.push($(this).val());
           });
          
        //  $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //    });
        // $.post("/changePermission", {'userId':id, 'permissionId':val}, function() {

        // });
        $.ajax({
          type:'POST',
          url: "{{route('changePermission')}}",
          data: {'roleId':id, 'permissionId':val, "_token": "{{ csrf_token() }}",},
             success:function(res){
            if(res == 'success'){
              $.notify("Permissions change successfully",'success');
              
            }
          }
      });
    })
  })
</script>

@endsection
