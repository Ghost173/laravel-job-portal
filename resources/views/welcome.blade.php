@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
        <table class="table">
            <thead>
                <th>pic</th>
                <th>postion</th>
                <th>Title</th>
                <th>post date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    
                
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


<style>
    .fa{
        color: #4183D7
    }
</style>