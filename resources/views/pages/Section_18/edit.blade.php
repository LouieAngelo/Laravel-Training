@extends('Layout.app')

@section('content')

 
<div class="container">
 
    <div class="form-group row">
    <h4>EDIT POST</h4>
       <form  method="POST" class="mt-2" action="{{route('section18.update',$posts->id)}}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
           <div class="col-md-5 col-sm-12">           
            <input type="text" class="form-control  " placeholder="Enter Title" name="title" autocomplete="off" value="{{$posts->title}}">
            <textarea name="content" id="" rows="4" class="form-control mt-2" placeholder="Enter Post Content" >{{rtrim($posts->content,' ' )}}</textarea>
           </div>
         
        <button class="btn btn-success  mt-2 col-md-3 col-sm-10"> Submit</button>
    </form>
 
</div>
 

    
@endsection