@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                
            <form action="{{route('jobs.update',[$jobs->id])}}" method="POST">
                @csrf
        <div class="card-header">Update A job</div>
            <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
            value="{{$jobs->title}}"
                >
                @if($errors->has('title'))
                <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                    @endif
            
            </div>

            <div class="form-group">
                <label for="position">position</label>
                <input type="text" name="position" class="form-control"
            value="{{$jobs->position}}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
            <textarea name="description" class="form-control">{{$jobs->description}}</textarea>
            </div>
                <div class="form-group">
                    <label for="role">Duties</label>
                    <textarea name="roles" class="form-control">{{$jobs->roles}}</textarea>
                </div>
            <div class="form-group">
                <label for="cetegory">Cetegory:</label>
                <select name="cetegory" class="form-control">
                    @foreach(App\Models\Category::all() as $cat)
                <option value="{{$cat->id}}" {{$cat->id==$jobs->category_id?'selected':''}}>{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control"
                value="{{$jobs->address}}">
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type">
                <option value="fulltime"{{$jobs->type==='fulltime'?'selected':''}}>fulltime</option>
                <option value="causal"{{$jobs->type==='causal'?'selected':''}}>causal</option>
                <option value="parttime"{{$jobs->type==='parttime'?'selected':''}}>parttime</option>
                </select>
            </div>
             
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="1"{{$jobs->status=='1'?'selected':''}}>Live</option>
                    <option value="0"{{$jobs->status=='0'?'selected':''}}>Draft</option>
                  
                    
                </select>
            </div>

            <div class="form-group">
                <label for="lastdate">Lastdate</label>
                <input type="date" name="laste_date" class="form-control"
            value="{{$jobs->laste_date}}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success" style="width: 100%"> Update</button>
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
