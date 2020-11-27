@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Show Request<h4 class="panel-title">  <a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">               
                    <div class="col-md-4">
                       <label for="name"> Certificate Type</label>
                       <input class="form-control input-small " id="title" name="title"  aria-label="Small" type="text" value="{{$certifReqShow->cert_type}}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="logo">Students Name </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <input class="form-control input-small " id="title" name="title"  aria-label="Small" type="text" value="{{$certifReqShow->studentInfo->f_name}}-{{$certifReqShow->studentInfo->l_name}}" readonly>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="email">Class </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <input type="emial" class="form-control onlyDigit input-sm" id="email"  name="email"  value="{{$certifReqShow->studentInfo->student_class->class_name}}"  readonly>
                         </div>
                    </div>
                    <div class="col-md-4">
                         <label for="website">Batch</label>
                         <input type="text" name="website" class="form-control" value="{{$certifReqShow->studentInfo->student_batch->batch_name}}"  readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="mobile1">Section</label>
                         <input type="text" name="mobile1" class="form-control " value="{{$certifReqShow->studentInfo->student_section->section_name}}"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  readonly>
                    </div>
                   
                    <div class="col-md-4">
                         <label for="description">Reason</label>
                         <textarea type="text" name="description" class="form-control "  readonly >{{$certifReqShow->reason}}</textarea> 
                        
                    </div>

                  </div>
                  </div>
                </div>
                
              </form>
          </div>    
  </div>
</div>

 @endsection
