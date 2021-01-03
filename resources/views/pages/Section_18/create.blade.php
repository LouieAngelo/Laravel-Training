@extends('Layout.app')

@section('content')

<div>
    @if (\Session::has('success'))
    <div class="alert alert-success col-md-5">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

 
</div>
 
    <div class="form-group row">
        
       <form action="{{route('section18.store')}}" method="POST">
           {{ csrf_field() }}
           <div class="col-md-5 col-sm-12">
            <h5 class="font-weight-bold">New Post</h5>
            <input type="text" class="form-control  " placeholder="Enter Title" name="title">
            <textarea name="content" id="" cols="30" rows="2" class="form-control mt-2" placeholder="Enter Post Content"></textarea>
           </div>
         
        <button class="btn btn-success  mt-2 col-md-3 col-sm-10"> Submit</button>
    </form>
 
</div>
 

    
@endsection