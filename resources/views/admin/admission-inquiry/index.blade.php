 @extends('layouts.main')
 @section('content')

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
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @php $i=1; @endphp
          {{-- Foreach Loop start --}}
          @foreach($datas as $data)
        
            <tr>
              <td>{{ $i++}}</td>
              <td>{{ $data->your_name}}</td>
              <td>{{ $data->your_email}}</td>
              <td>{{ $data->mobile_no}}</td>
              <td>{{ $data->created_at}}</td>
              <td> <button type="button" data-toggle="modal" data-target="#editGrad{{ $data->id }}" class=" fa fa-eye text-primary">
              </button></td>
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
                            <h3 class="tile-title">All Detail</h3>
                            <div class="tile-body">
                             
                               <div class="row">
                                  <div class="form-group col-md-6" >
                                    <label for="your_name"> Name</label>
                                      <input type="text" name="your_name" value="{{ $data->your_name }}" class="form-control" readonly="true" >
                                 </div> 
                                 <div class="form-group col-md-6" >
                                    <label for="your_email">Email</label>
                                      <input type="text" name="your_email"  class="form-control" readonly="true" value="{{ $data->your_email }}">
                                 </div>
                                 <div class="form-group col-md-6" >
                                    <label for="child_name"> Child Name</label>
                                      <input type="text" name="child_name"class="form-control" readonly="true" value="{{ $data->child_name }}">
                                 </div>
                                 <div class="form-group col-md-6" >
                                    <label for="child_age"> Child Age</label>
                                      <input type="text" name="child_age"class="form-control" readonly="true" value="{{ $data->child_age }}">
                                 </div>
                                  <div class="form-group col-md-6" >
                                    <label for="child_class"> Calss</label>
                                      <input type="text" name="child_class" value="{{ $data->child_class }}" class="form-control" readonly="true" >
                                 </div> 
                                 <div class="form-group col-md-6" >
                                    <label for="mobile_no"> Mobile No</label>
                                      <input type="text" name="mobile_no" id="mobile_no" class="form-control" readonly="true"value="{{ $data->mobile_no }}">
                                 </div>
                                </div>
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
 
 @endsection('content')


