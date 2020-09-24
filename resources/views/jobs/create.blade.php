@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <form action="{{route('job.create')}}" method="POST">
                @csrf
        <div class="card-header">Create A job</div>
            <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                @if($errors->has('title'))
                <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                    @endif
            
            </div>

            <div class="form-group">
                <label for="position">position</label>
                <input type="text" name="position" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
                <div class="form-group">
                    <label for="role">Duties</label>
                    <textarea name="roles" class="form-control"></textarea>
                </div>
            <div class="form-group">
                <label for="cetegory">Cetegory:</label>
                <select name="cetegory" class="form-control">
                    @foreach(App\Models\Category::all() as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control">
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type">
                    <option value="causal">causal</option>
                    <option value="fulltime">fulltime</option>
                    <option value="parttime">parttime</option>
                </select>
            </div>
             
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="1">Live</option>
                    <option value="0">Draft</option>
                    
                </select>
            </div>

            <div class="form-group">
                <label for="lastdate">Lastdate</label>
                <input type="date" name="last_date" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success" style="width: 100%"> submit</button>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            </div>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection
