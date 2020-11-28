@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Approve Certificate<h4 class="panel-title">  <a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
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
                      <div class="col-md-2">
                         <img src="{{asset($settings->logo !=null ? 'storage/'.$settings->logo : 'storage/admin/student_demo.png')}}" style="width: 100px; height: 100px;" class="form-control">
                        <hr>
                      </div>
                      <div class="col-md-10">
                         <h2><u>{{$settings->title}}</u><br>Website : <a href="{{$settings->website}}">{{$settings->website}}</a> | Email : | Phone : {{$settings->tel1}}</h2>
                      
                      </div><hr>
                    </div>
                  </div>
                   <div class="col-md-12" style="margin-left: 60px;">
                    <div class="row mt-3">
                      <div class="col-md-6">
                         <h2>CBSE AFF. No.{{$settings->cbse_aff_no }} </h2>
                      
                      </div>
                      <div class="col-md-6 full-right">
                         <h2 class="">School Code:-.{{$settings->school_code  }} </h2>
                      </div>
                       <div class="col-md-12 full-center mt-5" align="center">
                         <h2 class=""><u><strong>{{$showRequest->cert_type }}</strong></u> </h2>
                      </div>
                      <div class="col-md-12">
                        <div class="row mt-5">
                          <div class="col-md-6">
                            <h2>TC. No:- {{$showRequest->studentInfo->student_batch->batch_name}}/{{$showRequest->cert_req_id }} </h2>
                      
                          </div>
                          <div class="col-md-6 full-right">
                             <h2 class="">Admission No:-{{$showRequest->studentInfo->admision_no  }} </h2>
                          </div>
                        </div>
                    </div>
                   <div class="col-md-12">
                      <div class="row ">
                        <div class="col-md-12 ">
                           1. Name of Pupil:- <strong>{{$showRequest->studentInfo->f_name  }} {{$showRequest->studentInfo->l_name  }}</strong><br>
                           2. Father`s Name/Guardians` Name:- <strong>
                            @foreach($showRequest->gaudiantInfo as $gaudiantInfos) 
                            {{$gaudiantInfos->relation_id == 1 ? $gaudiantInfos->g_name : ''}}@endforeach</strong><br>
                           3. Mother`s Name:- @foreach($showRequest->gaudiantInfo as $gaudiantInfos) 
                            {{$gaudiantInfos->relation_id == 2 ? $gaudiantInfos->g_name : ''}}@endforeach</strong><br>
                           4. Nationality:- <strong>{{$showRequest->studentInfo->f_name  }} {{$showRequest->studentInfo->l_name  }}</strong><br>
                           5. Whether the candidate belongs to schedule tribe:- <strong>No</strong><br>
                           6. Date of first admission in the with class:- <strong>{{date('Y-m-d',strtotime($showRequest->studentInfo->created_at )) }} ({{$showRequest->studentInfo->student_class->class_name  }}) </strong><br>
                           7. Date of birth(according to admission register):- <strong>({{$showRequest->studentInfo->student_class->class_name  }})  </strong><br>
                           8.Class in which the Pupil last studied:- <strong>{{$showRequest->studentInfo->f_name  }} {{$showRequest->studentInfo->l_name  }}</strong><br>
                           9. School/board Annual Examination last taken with result:- <strong>{{$settings->school_board}}</strong><br>
                           10. Whether faild, if so,once/twice in the same class:- <strong>No</strong><br>
                           11.Subjects studied:- <strong>Subject Names</strong><br>
                           12.Third language in class VIII:- <strong>No</strong><br>
                           13.Month up to which the (pupil has paid):- <strong> </strong><br>
                           14.Total no. of working days present:- <strong>100 </strong><br>
                           15.Wheather NCC cadet/boy scout/Girl Guide(details may be given) conduct:-  <strong> </strong><br>
                           16.Genral conduct: <strong> {{$showRequest->general_conduct}}</strong><br>
                           17.Date of application for certificate:- <strong> {{$showRequest->apply_date}}</strong></strong><br>
                           18.Date of issue of certificate:- {{$showRequest->issue_date}}<br>
                           19.Reason for leaving the school:- <strong>{{$showRequest->reason  }} </strong><br>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                
          </div>    
  </div>
</div>

 @endsection
