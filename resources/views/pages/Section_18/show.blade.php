@extends('Layout.app')


@section('content')

<div class="container">

    @if (\Session::has('success'))
    <div class="alert alert-success col-md-5">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
    </div>
    @endif



    <div class="col-md-4">
    <h2>{{$posts->title}}</h2>
    <p>{{$posts->content}}</p>

    <form action="{{route('section18.destroy',$posts->id)}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="delete" name="_method">
        <div class="group-form">
        <a href="{{route('section18.edit',$posts->id)}}" class="btn btn-primary">EDIT</a>
        <input type="submit" value="DELETE" class="btn btn-danger">
        <a href="{{route('section18.index')}}" class="btn btn-secondary">Back</a>
    </div>
</form>
</div>
</div>
    
@endsection