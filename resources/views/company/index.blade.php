@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-md-12">
        <div class="company-profile">
        @if(empty(Auth::user()->company->cover_photo))
        <img src="{{asset('avatar/cvr.jpg')}}" style="width:100% ">
        @else 
        <img src="{{asset('uploads/coverphoto')}}/{{Auth::user()->company->cover_photo}}" width="100%;">


        @endif
        <div class="company-desc">
            @if(empty(auth()->user()->company->logo))
            <img width="100" src="{{asset('avatar/main.jpg')}}">
            
            @else 
            <img width="100" src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}">
           
            @endif
            <p>{{$company->description}}</P>
            <h1>{{$company->cname}}</h1>
            <p><strong>{{$company->slogan}}</strong></P>
            <p><strong>{{$company->address}}<strong></p>
            <p>website:{{$company->website}}</p>
            <p>phone:{{$company->phone}}</p></strong>
        </div>
        </div>

        <table class="table">
            <thead>
                <th>pic</th>
                <th>postion</th>
                <th>Title</th>
                <th>post date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($company->jobs as $job)
                    
                
                <tr>
                <td><img src="{{asset('avatar/main.jpg')}}" width="80"></td>
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
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div> 
</div> 
@endsection
