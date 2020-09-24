@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        {{-- @if(empty(auth()->user()->profile->avatar)) --}}
        @if(empty(auth()->user()->company->logo))
        <img src="{{asset('avatar/main.jpg')}}" width="100" style="width: 100%;">
        
        @else 
        <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100%;">
       
        @endif
        <br>
        <br>
        <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Update Your Logo</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="company_logo">
                    <br>
                    <button class="btn btn-primary float-right" type="submit">Update</button>
                    @if($errors->has('company_logo'))
                    <div class="error" style="color: red;">{{$errors->first('company_logo')}}</div>
                        @endif
                </div>
            </div>
        </form>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Udate Your Company details</div>
                <div class="card-body">
                <form action="{{route('company.store')}}" method="POST">@csrf
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address"
                        value="{{Auth::user()->company->address}}"
                        >
                                        
                    </div>

                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone"
                        value="{{Auth::user()->company->phone}}"
                        >
                                        
                    </div>

                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" class="form-control" name="website"
                        value="{{Auth::user()->company->website}}"
                        >
                                        
                    </div>

                    <div class="form-group">
                        <label for="">Slogan</label>
                        <input type="text" class="form-control" name="slogan"
                        value="{{Auth::user()->company->slogan}}">
                                        
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description"  class="form-control">{{Auth::user()->company->description}}</textarea>
                                        
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
                <div class="card-header">your Company details</div>
                <div class="card-body">
                <p>Company name: {{Auth::user()->company->cname}}</p>
                <p>Company Address: {{Auth::user()->company->address}}</p>
                <p>Company phone: {{Auth::user()->company->phone}}</p>
                <p>Company website: <a href="{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a></p>
                <p>Listing: <a href="company/{{Auth::user()->company->slug}}">View</a></p>
                <p>Company description: {{Auth::user()->company->description}}</p>
                <p>Member On:{{date('F d Y',strtotime(auth()->user()->created_at))}}</p>
                </div>
            </div>
<br>


            <br>
            <form action="{{route('company.coverphoto')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">Update Cover photos</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_photo">
                    <br>
                    <button class="btn btn-primary float-right" type="submit">Update</button>
                  
                </div>
            </div>
        </form>

        </div>
    </div>
</div>
@endsection
