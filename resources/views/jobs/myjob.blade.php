@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>pic</th>
                            <th>postion</th>
                            <th>Title</th>
                            <th>post date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($job as $job)
                                
                            
                            <tr>
                            <td>
                                @if(empty(auth()->user()->company->logo))
                             <img src="{{asset('avatar/main.jpg')}}" width="100" style="width: 100;">
        
                              @else 
                            <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100;">
       
                            @endif

                            </td>
                            <td>Postion: {{$job->position}}
                                <br>
                                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$job->type}}
                            </td>
                        {{-- <td><i class="fa fa-map-marker" aria-hidden="true"></i> Address: {{$job->address}}</td> --}}
                        <td><i class="fa fa-briefcase" aria-hidden="true"></i> Tittle: {{$job->title}}</td>
                        <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp; Date: {{$job->created_at->diffForHumans()}}</td>
                            <td>
                            <a href="{{route('jobs.show',[$job->id, $job->slung])}}">
                                <button class="btn btn-primary " >Details</button>
                            </a>
                            <a href="{{route('jobs.edit',[$job->id])}}">
                            <button class="btn btn-primary">Edit</button>
                            </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
