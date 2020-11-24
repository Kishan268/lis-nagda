@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">          
            @include('admin.master.header')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Batches ({{count($studentBatch)}}) 
                       <button type="button" class="btn btn-primary btn-sm pull-right addClass">Add Batch</button>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Batch Name</th>
                              <th>start Date</th>
                              <th>End Date</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            {{-- Foreach Loop start --}}
                            @foreach($studentBatch as $data)

                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $data->batch_name}}</td>
                                <td>{{ $data->batch_from}}</td>
                                <td>{{ $data->batch_to}}</td>
                                <td> <button class="fa fa-pencil-square-o btn btn-sm btn-primary editClass" id="{{$data->id}}" data-id="{{$data->batch_name}}" data-class="{{$data->batch_from}}" data-batch="{{$data->batch_from}}">
                                         </button></td>
                                {{-- <td>
                                <form method="post" action="{{ route('add-branch.destroy',$datas1->id) }}">
                                  @csrf
                                  @method('DELETE')
                                       <button type="button" data-toggle="modal" data-target="#editGrad{{ $datas1->id }}" class="fa fa-pencil-square-o btn btn-primary">
                                       </button>
                                       <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
                                        </button>
                                </form>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal" id="addClass">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Batch</h4>
                        <button type="button" class="close modalClose" >&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('batches_add')}}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                                    <label for="batch_from"> Start Date</label>
                                    <input type="text" name="batch_from" id="batch_from" class="form-control datepicker" placeholder="dd/mm/yyyy" value="{{old('batch_from')}}">
                                    @error('batch_from')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6 form-group">
                                    <label for="batch_to"> End Date</label>
                                    <input type="text" name="batch_to" id="batch_to" class="form-control datepicker" placeholder="dd/mm/yyyy" value="{{old('batch_to')}}">
                                    @error('batch_to')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <label for="batch_name"> Batch Name</label>
                                    <input type="text" name="batch_name" id="batch_name" class="form-control" readonly="true" placeholder="Batch name" value="{{old('batch_name')}}">
                                    @error('batch_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                 <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <input type="hidden" name="flag" value="{{old('flag') ?? 'add'}}"  >
                                    <input type="hidden" name="batch_id" value="" value="{{old('batch_id')}}">
                                    <button  class="btn btn-primary btn-sm" type="submit" id="btnSubmit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm modalClose" >Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script >
$(document).ready(function(){
// $(function () {
// $(".datepicker").datepicker({ 
// singleDatePicker: true,
// showDropdowns: true,
// });
// });



     $(document).on('blur', '#batch_to', function(){
        var batch_from = $('#batch_from').val();
        var batch_to = $('#batch_to').val();
        var lastDigitbatch_from = batch_from.toString().slice(-4);
        var lastDigitbatch_to = batch_to.toString().slice(-4);
        var batch_name = $('#batch_name').val(lastDigitbatch_from+'-'+lastDigitbatch_to);
      }); 



    $('.addClass').on('click',function(e){
        e.preventDefault();
        $('input[name="flag"]').val('add');
        $('input[name="batch_id"]').val('');
        $('#batch_from').val('');
        $('#batch_to').val('');
        $('#batch_name').val('');
        $('#addClass').modal('show');

    });
    $('.modalClose').on('click',function(e){
        e.preventDefault();
        $('#addClass').modal('hide');
    });
    $('.editClass').on('click',function(e){
        e.preventDefault();
   
        $('input[name="flag"]').val('edit');
        $('input[name="batch_id"]').val($(this).attr('id'));
        $('#batch_name').val($(this).data('id'));
        $('#batch_from').val($(this).data('class'));
        $('#batch_to').val($(this).data('batch'));

        $('#addClass').modal('show');
    });

    @if($message = Session::get('success'))
        alert("{{$message}}")
    @endif


    @if($errors->any())
         $('#addClass').modal('show');     
    @endif

})
</script>

@endsection