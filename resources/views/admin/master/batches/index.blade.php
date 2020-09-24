 @extends('layouts.main')
 @section('content')

<div class="container">
    <div class="app-title">
     @if($message = Session::get('success'))
            
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
          @endif
    </div>
</div>

{{-- =================================== --}}
  {{-- START INSERT MODEL BOX --}}
      
      <div class="container">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addGrade">Add Batches</button>
        <!-- Modal -->
        <div class="modal fade" id="addGrade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="row">
              <div style="width: 131%;" class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                  <div class="clearix"></div>
                  <div class="col-md-12">
                    <div class="tile">
                      <h3 class="tile-title">Add Batch</h3>
                      <div class="tile-body">
                      {{-- INSERT FORM --}}
                        <form class="row" action="{{route('batches_add')}}" method="post">
                       @csrf
                          <div class="form-group col-md-6" >
                              <label for="batch_from"> Start Date</label>
                                <input type="text" name="batch_from" id="batch_from" class="form-control datepicker" placeholder="dd/mm/yyyy" >
                                @error('batch_from')
                                  <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           </div>
                            <div class="form-group col-md-6" >
                              <label for="batch_to"> End Date</label>
                                <input type="text" name="batch_to" id="batch_to" class="form-control datepicker" placeholder="dd/mm/yyyy" >
                                @error('batch_to')
                                  <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           </div>  
                           <div class="form-group col-md-6" >
                              <label for="batch_name"> Batch Name</label>
                                <input type="text" name="batch_name" id="batch_name" class="form-control" readonly="true" placeholder="Batch name">
                                @error('batch_name')
                                  <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           </div>
                            
                            <div class="form-group col-md-4 align-self-end">
                              <button id="addGrade" class="btn btn-primary" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>ADD
                              </button>
                            </div>
                          </form>
                            {{-- END INSERT FORM --}}
                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      {{-- END INSERT MODEL BOX --}}

    {{-- ================================ --}}
        <br>
          <div class="container">
            <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
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
                          <td> <button type="button" data-toggle="modal" data-target="#editGrad{{ $data->id }}" class="fa fa-pencil-square-o btn btn-primary">
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
                    {{-- Edit Model Box start ,this model box popup on edit button click --}}
                        <div class="container">
                          <div class="modal fade" id="editGrad{{ $data->id }}" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="row">
                                <div style="width: 131%;" class="modal-content">
                                  <div class="modal-header">
                                    <button class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="clearix"></div>
                                    <div class="col-md-12">
                                      <div class="tile">
                                        <h3 class="tile-title">Update Batch</h3>
                                        <div class="tile-body">
                                        {{-- Update FORM --}}
                               
                                          <form class="row" action="{{route('batches_update',$data->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                 
                                          
                                            <div class="form-group col-md-6" >
                                              <label for="batch_from">Start Date</label>
                                                <input type="text" name="batch_from" id="batch_from_update" class="form-control datepicker" value="{{$data->batch_from}}">
                                                @error('batch_from')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div> 
                                             <div class="form-group col-md-6" >
                                              <label for="batch_to">End Date</label>
                                                <input type="text" name="batch_to" id="batch_to_update" class="form-control datepicker" value="{{$data->batch_to}}">
                                                @error('batch_to')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div>
                                              <div class="form-group col-md-6" >
                                              <label for="batch_name"> Batch Name</label>
                                                <input type="text" name="batch_name" id="batch_name_update" class="form-control " readonly="true" placeholder="Batch name" value="{{$data->batch_name}}">
                                                @error('batch_name')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                           </div>
                                               <input type="hidden" name="id" id="id" class="form-control" value="{{$data->id}}">
                                              <div class="form-group col-md-4 align-self-end">
                                                <button type="submit" class="btn btn-primary">
                                                  <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                                                </button>
                                              </div>
                                            </form>
                                              {{-- END Update FORM --}}
                             
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    {{-- Edit Model/Update Box End --}}
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
<script>
$(function () {
  $(".datepicker").datepicker({ 
    singleDatePicker: true,
    showDropdowns: true,
  });
});

$(document).ready(function(){
  $(document).on('blur', '#batch_to', function(){
    var batch_from = $('#batch_from').val();
    var batch_to = $('#batch_to').val();
    var lastDigitbatch_from = batch_from.toString().slice(-4);
    var lastDigitbatch_to = batch_to.toString().slice(-4);
    var batch_name = $('#batch_name').val(lastDigitbatch_from+'-'+lastDigitbatch_to);

  }); 
  $(document).on('blur', '#batch_to_update', function(){
    var batch_from = $('#batch_from_update').val();
    var batch_to = $('#batch_to_update').val();
    var lastDigitbatch_from = batch_from.toString().slice(-4);
    var lastDigitbatch_to = batch_to.toString().slice(-4);
    var batch_name = $('#batch_name_update').val(lastDigitbatch_from+'-'+lastDigitbatch_to);
  });
});
</script>
 @endsection('content')


