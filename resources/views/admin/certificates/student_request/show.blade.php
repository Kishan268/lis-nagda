 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<input type="button" value="Print" onclick="printReport()" class="btn btn-success"> 

<div class="container" id="reportPrinting" style="width: 800px; height: 925px; border: solid;">
     
    <div class="row">               
      <div class="col-md-12" >
        <span class="school-logo"> 
          <img src="{{asset($settings->logo !=null ? 'storage/'.$settings->logo : 'storage/admin/student_demo.png')}}" style="width: 128px; height: 112px;" ></span>
       
           <h2 class="school-heading"><u><span>{{$settings->title}}</span></u></h2>

            <span style="margin-left: 70px; font-size: 10px; margin-top: 10px;" class="email-web"><strong>Website :</strong> <a href="{{$settings->website}}">{{$settings->website}}</a> | <strong>Email :</strong>{{$settings->email}} |<strong> Phone :</strong> {{$settings->tel1}}</span>
            <hr style="background: solid black;">
          </div>
      </div>
              
    {{--  <div class="col-md-12 mb-4" style="margin-left: 50px;">
        <div class="row mt-3">
          <div class="col-md-6">
          
          </div>
          <div class="col-md-12 cert-type" >
            <span>
              
            </span>
          </div>
        </div>
      </div> --}}
        <div class="row  mt-3" >
          <div class="col-md-12" style="margin-left: 60px; ">
              <span style="font-size: 15px;" class="cbse"><strong>CBSE AFF. No.{{$settings->cbse_aff_no }}</strong></span>
            
              <span class="school-code"><strong>School Code:-.{{$settings->school_code  }} </strong></span>
            <div class="cert_type" align="center">  
               <span> <u><strong>{{$showRequest->cert_type }}</strong></u> </span><br>
            </div>
                <span class="tc-no">T<strong>C. No:- {{$showRequest->studentInfo->student_batch->batch_name}}/{{$showRequest->cert_req_id }} </strong></span>
              <span style="font-size: 15px; " class="admision_no"><strong>Admission No:-{{$showRequest->studentInfo->admision_no  }} </strong></span>
          </div>
        </div>

      <div class="row " >
        <div class="col-md-12 " style="font-size: 15px; margin-top: 30px; margin-left: 70px;">
           <span>1. Name of Pupil:- <strong>{{$showRequest->studentInfo->f_name  }} {{$showRequest->studentInfo->l_name  }}</strong><br>
           2. Father`s Name/Guardians` Name:- <strong>
            @foreach($showRequest->gaudiantInfo as $gaudiantInfos) 
            {{$gaudiantInfos->relation_id == 1 ? $gaudiantInfos->g_name : ''}}@endforeach</strong><br>
           3. Mother`s Name:- @foreach($showRequest->gaudiantInfo as $gaudiantInfos) 
            {{$gaudiantInfos->relation_id == 2 ? $gaudiantInfos->g_name : ''}}@endforeach</strong><br>
           4. Nationality:- <strong>{{$showRequest->studentInfo->nationality_id  }}</strong><br>
           5. Whether the candidate belongs to schedule tribe:- <strong>No</strong><br>
           6. Date of first admission in the with class:- <strong>{{date('Y-m-d',strtotime($showRequest->studentInfo->created_at )) }} ({{$showRequest->studentInfo->student_class->class_name  }}) </strong><br>
           7. Date of birth(according to admission register):- <strong>({{$showRequest->studentInfo->student_class->class_name  }})  </strong><br>
           8. Class in which the Pupil last studied:- <strong>{{$showRequest->studentInfo->f_name  }} {{$showRequest->studentInfo->l_name  }}</strong><br>
           9. School/board Annual Examination last taken with result:- <strong>{{$settings->school_board}}</strong><br>
           10. Whether faild, if so,once/twice in the same class:- <strong>No</strong><br>
           11. Subjects studied:- <strong>@foreach($subjectName->assign_subjectId as $subjectNames)
              {{$subjectNames->subject->subject_name}},
             @endforeach</strong><br>
           12. Third language in class VIII:- <strong>No</strong><br>
           13. Month up to which the (pupil has paid):- <strong> </strong><br>
           14. Total no. of working days present:- <strong>100 </strong><br>
           15. Wheather NCC cadet/boy scout/Girl Guide(details may be given) conduct:-  <strong> </strong><br>
           16. Genral conduct: <strong> {{$showRequest->general_conduct}}</strong><br>
           17. Date of application for certificate:- <strong> {{$showRequest->apply_date}}</strong></strong><br>
           18. Date of issue of certificate:- {{$showRequest->issue_date}}<br>
           19. Reason for leaving the school:- <strong>{{$showRequest->reason  }} </strong><br></span>
        </div>
    </div>
      
    <div class="row">
      <div class="col-md-12" style="margin-left: 70px; margin-top: 50px;">
            <span><strong>Prepared by:</strong></span>
            <br><br>
            <span>Checked and verified by:-</span><br>
            <span>(<a href="https://cbse.nic.in">cbse.nic.in</a>/source from where verified)</span>
          
            <span style="margin-left: 275px;" class="principale"><strong>Pincipale Sign</strong></span>
          </div>
        </div>
    </div>
    
</div>
<style>
  .cert-type{
        margin-left: 190px;
        margin-top: 35px;
        margin-bottom: 35px;
        font-size: 24px;
    }
    .school-heading {
      float: right;
      position: absolute;
      top:0px;
      margin-left: 100px;
      color: #136d40; 
      margin-left: 150px;
  }
  .school-code {
    float: right;
    position: absolute;
    margin-left: 295px;
    top: 0px;
    font-size: 15px;
     
  }
  .principale {
    float: right;
    position: absolute;
    margin-left: 295px;
    top: 0px;
  }
  .tc-no {
    float: right;
    position: absolute;
    margin-left: 500px;
    top: 110px;
    font-size: 15px;
  }
  .cert_type {
    margin-top: 27px;
    margin-bottom: 27px;
    font-size: 25px;
    margin-right: 95px;
}

</style>
 <script> 
    // function printReport() { 
    //     var divContents = document.getElementById("reportPrinting").innerHTML; 
    //     var a = window.open('', '', 'height=500, width=500'); 
       
    //     a.document.write(divContents); 
    //     a.document.close(); 
    //     a.print(); 
    // } 
     function printReport()
    {
        var prtContent = document.getElementById("reportPrinting");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
//     function printReport() 
// {

//   var divToPrint=document.getElementById('reportPrinting');

//   var newWin=window.open('','Print-Window');

//   newWin.document.open();

//   newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

//   newWin.document.close();

//   setTimeout(function(){newWin.close();},10);

// }
</script> 