@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{-- @include('admin.class.header') --}}
    {{-- @include('admin.master.header') --}}

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Discount List
                        <a href="{{route('fees-discount.create')}}" class="btn btn-sm btn-success pull-right fa fa-plus btn-sm">Add discount</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Discount Code</th>
                                <th>Discount Name</th>
                                <th>Discount Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php $i=1; @endphp
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
                                            <button class="bg-success mr-2 editSubject" id="{{$data->id}}" data-id="{{$data->subject_name}}"  data-class="{{$data->subject_code}}" data-subject="{{$data->subject_sequence}}" ><i class="fa fa-edit text-white" ></i>
                                            </button>
                                            <button class="bg-danger" onclick="return confirm('Are you sure you want to delete?');">
                                            <i class="fa fa-trash text-white"> </i>    
                                            </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection

