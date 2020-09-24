@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
            <div class="card-header">{{$job->title}}</div>

                <div class="card-body">
                    <h1>Descriptions</h1>
                <p>{{$job->description}}</p>
                <h3>Duties</h3>
                <p>{{$job->roles}}</p>
                <p>{{$job->id}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info</div>
                    
            <div class="card-body">
                <p><i class="fa fa-building"></i>
                Company:<a href="{{route('company.index',[$job->company->id, $job->company->slug])}}"> {{$job->company->cname}}</a></p>
                    <p><i class="fa fa-map-marker-alt"></i>&nbsp; Address: {{$job->address}}</p>
                    <p><i class="fa fa-clock-o"></i>&nbsp; Employemnt type:{{$job->type}} </p>
                    <p><i class="fa fa-crosshairs"></i>&nbsp; position:{{$job->position}}</p>
                    <p><i class="fa fa-calendar-day"></i>&nbsp; Date:{{$job->created_at->diffForHumans()}} </p>
                
                </div>
                
            </div>
            <br>
            @if(Auth::check()&&Auth::user()->user_type='seeker')
            @if(!DB::table('jobs_user')->where('user_id',Auth::user()->id)->where('jobs_id',$job->id)->exists())
            <form action="{{route('jobs.apply',[$job->id])}}" method="POST">@csrf
            <button type="submit" class="btn btn-success" style="width: 100%">Apply</button>
            </form>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection


<style>
    .fa{
        color: blue;
    }
</style>