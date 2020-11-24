@extends('layouts.main')
 @section('content')
<div id="content">

<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Time Table<h4 class="panel-title">  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm">Add Time Table</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm">Back</a></h4></h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            {{-- {{dd($examTimeTableMast)}} --}}
            <table class="table table-striped table-bordered mytable">
               <thead>
                  <tr>
                    <th>Class Name</th>
                    <?php $date = []; ?>
                     @foreach($examTimeTableMast as $class)

                      @foreach($class->get_time_table as $dates)
                        <?php 
                           if(!in_array($dates->date, $date)){
                            $date[] = $dates->date

                        ?>
                          <th>{{$dates->date}}</th> 
                        <?php } ?>
                      
                      @endforeach
                    @endforeach
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $classData = []; ?>
                  @foreach($examTimeTableMast as $class)
                    @foreach ($class->get_time_table as $subjectsClass) 
                      <?php 
                          $classData[$subjectsClass->get_class->class_name][] = $subjectsClass->get_subject?$subjectsClass->get_subject->subject_name:'';                       
                      ?>
                    @endforeach
                  @endforeach         
                  @foreach($classData as $key => $value)
                  <tr>
                    <td>{{$key}}</td>
                    @foreach($value as $key => $sub)                  
                      <td>{{$sub ? $sub : ''}}</td>                    
                    @endforeach
                  </tr>
                  @endforeach    

                </tbody>
            </table> 
        </div>
      </div>
    </div>
</div>



 @endsection