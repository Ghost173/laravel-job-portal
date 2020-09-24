@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        @if(empty(auth()->user()->profile->avatar))
        <img src="{{asset('avatar/main.jpg')}}" width="100" style="width: 100%">
        @else
            <img src="{{asset('uploads/avatar')}}/{{auth()->user()->profile->avatar}}" width="100" style="width: 100%">

        @endif
        <br>
        <br>
        <form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Update Profile picr</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="avatar">
                    <br>
                    <button class="btn btn-primary float-right" type="submit">Update</button>
                    @if($errors->has('avatar'))
                    <div class="error" style="color: red;">{{$errors->first('avatar')}}</div>
                        @endif
                </div>
            </div>
        </form>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Udate Your Profile</div>
                <div class="card-body">
                <form action="{{route('profile.create')}}" method="POST">@csrf
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address"
                        value="{{Auth()->user()->profile->address}}" >  
                        @if($errors->has('address'))
                    <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                        @endif
                        
                    </div>

                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" class="form-control" name="phone_number"
                        value="{{Auth()->user()->profile->phone_number}}" >  
                        @if($errors->has('phone_number'))
                        <div class="error" style="color: red;">{{$errors->first('phone_number')}}</div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="">Experience</label>
                        <textarea type="text" class="form-control" name="experience">{{Auth()->user()->profile->experience}}
                        </textarea>
                        @if($errors->has('experience'))
                        <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="">Bio</label>
                        <textarea type="text" class="form-control" name="bio">{{Auth()->user()->profile->bio}}
                        </textarea>
                        @if($errors->has('bio'))
                        <div class="error" style="color: red;">{{$errors->first('bio')}}</div>
                            @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit">Update</button>
                    </div>
                    </form>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
            </div>
        </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">your information</div>
                <div class="card-body">
                <p>Name:{{Auth()->user()->name}}</p>
                <p>Email:{{Auth()->user()->email}}</p>
                <p>Address:{{Auth()->user()->profile->address}}</p>
                <p>Phone number:{{Auth()->user()->profile->phone_number}}</p>
                <p>Gender:{{Auth()->user()->profile->gender}}</p>
                <p>Bio:{{Auth()->user()->profile->bio}}</p>
                <p>Experience:{{Auth()->user()->profile->experience}}</p>
                <p>Member On:{{date('F d Y',strtotime(auth()->user()->created_at))}}</p>

                @if(!empty(Auth()->user()->profile->cover_letter))
                <p><a href="{{Storage::url(Auth()->user()->profile->cover_letter)}}">Cover Letter</a></p>

                @else
                <p class="alert alert-warning">Please upload your cover letter</p>
                @endif

                @if(!empty(Auth()->user()->profile->resume))
                <p><a href="{{Storage::url(Auth()->user()->profile->resume)}}">resume</a></p>

                @else
                <p class="alert alert-warning">Please upload your resume</p>
                @endif
                </div>
            </div>
<br>

        <form action="{{route('cover.letter')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Update coverletter</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_latter">
                    <br>
                    <button class="btn btn-primary float-right" type="submit">Update</button>
                    @if($errors->has('cover_latter'))
                    <div class="cover_latter" style="color: red;">its reuired</div>
                        @endif
                </div>
            </div>
        </form>

            <br>
            <form action="{{route('resume')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">Update resume</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="resme">
                    <br>
                    <button class="btn btn-primary float-right" type="submit">Update</button>
                    @if($errors->has('resme'))
                    <div class="resme" style="color: red;">{{$errors->first('resme')}}</div>
                        @endif
                </div>
            </div>
        </form>

        </div>
    </div>
</div>
@endsection
