 @extends('layouts.main')
 @section('content')

<div class="container">
   <div class="col-lg-12">
    @include('admin.class.header')
      <div class="container">
        <div class="row mt-2">
          <div class="col-lg-12">
          <div class="container">
              <div class="app-title">
               @if($message = Session::get('success'))
                      
                <div class="alert alert-success">
                  {{ $message }}
                </div>
                    @endif
              </div>
          </div>
{{-- =================================== --}}
  {{-- START INSERT MODEL BOX --}}
      
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
             <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addGrade">Add Subject</button>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="row">
       
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
                      <h3 class="tile-title">Add Subject</h3>
                      <div class="tile-body">
                      {{-- INSERT FORM --}}
                        <form class="row" action="{{route('subject.store')}}" method="post" id="add_subject">
                       @csrf
                          <div class="form-group col-md-6" >
                              <label for="subject_name"> Subject Name</label>
                                <input type="text" name="subject_name" id="subject_name" class="form-control" >
                                @error('subject_name')
                                  <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           </div>
                           <div class="form-group col-md-6" >
                              <label for="subject_code"> Subject Code </label>
                                <input type="text" name="subject_code" id="subject_code" class="form-control" >
                                @error('subject_code')
                                  <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           </div>
                           <div class="form-group col-md-6" >
                              <label for="subject_sequence">  Subject Sequence  </label>
                                <input type="text" name="subject_sequence" id="subject_sequence" class="form-control" >
                                @error('subject_sequence')
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
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Subject Sequence</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <tbody>
                      @php $i=1; @endphp
                      {{-- Foreach Loop start --}}
                      @foreach($subject as $data)
                    
                        <tr>
                          <td>{{ $i++}}</td>
                          <td>{{ $data->subject_name}}</td>
                          <td>{{ $data->subject_code}}</td>
                          <td>{{ $data->subject_sequence}}</td>
                         
                          <td>
                            <form method="post" action="{{ route('subject.destroy',$data->id) }}">
                              @csrf
                              @method('DELETE')
                                   <button type="button" data-toggle="modal" data-target="#editGrad{{ $data->id }}" class="fa fa-pencil-square-o btn btn-primary">
                                   </button>
                                   <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
                                    </button>
                            </form>
                          </td>
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
                                        <h3 class="tile-title">Update subject</h3>
                                        <div class="tile-body">
                                        {{-- Update FORM --}}
                               
                                          <form class="row" action="{{route('subject.update',$data->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                 
                                          
                                            <div class="form-group col-md-6" >
                                              <label for="subject_name">Subject Name</label>
                                                <input type="text" name="subject_name" id="subject_name" class="form-control" value="{{$data->subject_name}}">
                                                @error('subject_name')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div>
                                             <div class="form-group col-md-6" >
                                              <label for="subject_code"> Subject Code </label>
                                                <input type="text" name="subject_code" id="subject_code" class="form-control" value="{{$data->subject_code}}">
                                                @error('subject_code')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                           </div>
                                           <div class="form-group col-md-6" >
                                              <label for="subject_sequence">  Subject Sequence  </label>
                                                <input type="text" name="subject_sequence" id="subject_sequence" class="form-control" value="{{$data->subject_sequence}}">
                                                @error('subject_sequence')
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
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript">
  
   $.validator.addMethod("mobile_regex", function(value, element) {
    return this.optional(element) || /^\d{10}$/i.test(value);
    }, "Please Enter No Only.");
    
    $.validator.addMethod("password_regex", function(value, element) {
    return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/i.test(value);
    }, "Password must contain at least 1 lowercase, 1 uppercase, 1 numeric and 1 special character");
    
    $.validator.addMethod("email_regex", function(value, element) {
    return this.optional(element) || /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/i.test(value);
    }, "The Email Address Is Not Valid Or In The Wrong Format");
    
    $.validator.addMethod("name_regex", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ]{2,100}$/i.test(value);
    }, "Please choose a name with only a-z 0-9.");
    
    $("#add_subject").validate({
       errorElement: 'required',
        errorClass: 'help-inline',
      
      rules: {
       
      subject_name:{
        letterswithbasicpunc:true,
        minlength:3,
        maxlength:30,
      }, 
      subject_code:{
        letterswithbasicpunc:true,
        minlength:3,
        maxlength:30,
      },
      
    
    },
     
  
    messages: {
     subject_name: {
      required: "Please enter subject name",
     },
     subject_code: {
      required: "Please enter subject code",
     },
     
    },
      submitHandler: function(form) {
      form.submit();
      }
 });
 @endsection('content')


