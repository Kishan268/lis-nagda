 @extends('layouts.main')
 @section('content')

<div class="container">
   <div class="col-lg-12">
    @include('admin.master.header')
      <div class="container">
        <div class="row mt-2">
          <div class="col-lg-12">
            
           <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> Student Sections </h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="row">
                  <div class="container">
                    <div class="card-body">
                      <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-body">        
                              <div class="row">
                                <div class="col-md-3 col-xs-6 col-sm-6 error-div">
                                  <label>Class</label><span class="text-danger">*</span>
                                  <select class="form-control" name="std_class_id" id="std_class_id"> 
                                    <option value="">Select Class</option>

                                    @foreach($classes as $key=>$class)
                                      <option value="{{$class->id}}">{{$class->class_name}}</option>
                                    @endforeach
                                  </select>
                                  @error('std_class_id')
                                      <span class="text-danger">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>                
                                <div class="col-md-3">
                                  <label>Batch</label>
                                  <span class="text-danger">*</span>
                                  <select class="form-control" name="batch_id" id="batch_id">
                                    <option value="">Select Batch</option>
                                    @foreach($batches as $key=>$batch)
                                      <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                                    @endforeach
                                     
                                  </select>
                                  @error('batch_id')
                                      <span class="text-danger">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                                
                                <div class="col-md-3">
                                  <label>Section</label>
                                  <span class="text-danger">*</span>
                                  <select name="section_id[]" class="form-control select2" multiple="multiple" id="section_id">
                                    <span class="text-danger">*</span> 
                                    @foreach($sections as $key=>$section)
                                      <option value="{{$section->id}}">{{$section->section_name}}</option>
                                    @endforeach
                                  </select>
                                  @error('section_id')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-2 show_result" >
                                  <button class="btn btn-sm btn-primary" id="btnFilter" style="margin-top: 33px;">Show</button>
                                  <a href="{{ URL::previous() }}" class="btn btn-sm btn-success pull-right" style="margin-top: 33px;">Back</a>
                                </div>
                              </div>
                          </div>
                          <br>
                        </div>
                         <div id="temp">
                        </div>
                        <a class="btn btn-primary" id="insertSaveSection" style="display: none;">Save</a>

                    </div>
                  </div>
              </div>
            </div>
        </div>
      
    </div>
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> Sections List </h6>
                <a href="{{route('assign_section_student')}}" class="full-rigt btn-success">Assign Student</a>
          </div>
          <div class="container">
                <div class="app-title">
                 @if($message = Session::get('success'))
                        
                  <div class="alert alert-success">
                    {{ $message }}
                  </div>
                      @endif
                </div>
            </div>
              <!-- Card Body -->
          <div class="card-body">
           <table class="table table-striped table-bordered mytable">
            <thead>
              <tr>
                <th>Section ID</th>
                <th>Class Name</th>
                <th>Batch Name</th>
                <th>Section Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sectionList as $sectionLists) 
              <tr>
                <td>{{$sectionLists->id}}</td>
                <td>{{$sectionLists->class_name->class_name}}</td>
                <td>{{$sectionLists->batch_name->batch_name}}</td>
                <td>{{$sectionLists->section_names->section_name}}</td>
                <td>
                  <form action="{{route('delete_section_list',$sectionLists->id)}}" method="post">
                   @csrf
                    @method('DELETE')
                     <button class="fa fa-trash" onclick="return confirm(' you want to delete?');">
                      </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
       </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $('.mytable').DataTable();

  $(document).ready(function(){


      var sectionArr = new Array();
      var sectionNameArr = new Array();
     $('#btnFilter').on('click', function(){
         var course = $("#std_class_id").val();
         var batch = $("#batch_id").val();
         var section =$("#section_id").val();
         if(section !=''  && batch !='' && course != '' ){
         var obj = {};
         var i = 0;
         $("#section_id option:selected").each(function () {
              var $this = $(this);
              if ($this.length) {
                obj[i] = $this.text();
                i++;
              }
        });
        var courseName = $("#std_class_id :selected").text();
        var batchName = $("#batch_id :selected").text();
        var sectionName = $("#section_id :selected").text();
       // alert(sectionName);
        if(course>0 && batch>0)
        {
         $("#temp").html('');
        var temp ='';
  
        temp += '<table class="table table-vcenter table-condensed table-bordered"><tr><th>Sr No</th><th>Course</th><th>Batch</th><th>Section</th></tr>';
  
        for(i=1;i<=section.length;i++)
        {
          temp += '<tr><td>' + i + '</td><td>' + courseName + '</td><td>' + batchName + '</td><td>' + obj[i-1] + '</td></tr>';
          sectionArr.push(section[i-1]);
          sectionNameArr.push(sectionName[i-1]);
        }
        temp += '</table>';
  
        $("#temp").append(temp);
        $("#insertSaveSection").show();
      }
    }else{
        alert('please select all field');

    }
});
    $('#insertSaveSection').on('click', function(){   
      var course = $("#std_class_id").val();
      var batch = $("#batch_id").val();
      var section_id = $("#section_id").val();
      
      var section = sectionArr;
      var sectionName = sectionNameArr;
      swal({
          title: "Are you sure?",
          text: "Make Sure you add section. If you are not sure then close this pop up window",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
    .then((isConfirm) => {
      if (isConfirm) {

      $.ajax({
              type: "POST",
              url: "{{route('add_section_list')}}",
              data: {
                  course_id: course,
                  batch_id : batch,
                  section_id :section_id,
                  section_name:sectionName,
                  "_token": "{{ csrf_token() }}"
              },
              success: function(data){
        
                swal({
                  icon:'success',
                  title: data,
                  button: true,
                }).then((ok)=> {
                  if(ok){
                    location.reload();
                  }
                });
                     
                  
              }
          })
    }
    })
               
  });
    $('body').on('click','.selectAll' ,function(){  
      // console.log('select');
       if ($(this).is( ":checked" )) {
        $('body .check').prop('checked',true);

       }else{
        $('body .check').prop('checked',false);
       }
    });
    
  });
</script>
 @endsection('content')


