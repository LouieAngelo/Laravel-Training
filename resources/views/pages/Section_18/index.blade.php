@extends('Layout.app')


@section('content')

<div class="container">

    <h4 class="text-uppercase">Welcome to section 18</h4> 

    <div class="col-md-10">
        <table class="table table-sm table-striped ">
            <caption>List of Post</caption>
            <thead class="table-dark">
                <tr> 
                    <th class="text-center">#</th>
                    <th>NAME</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>View</th>
                </tr>                
            </thead>
            <tbody>
             
               @foreach ($posts as $posts)
               <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$posts->title}}</td>
                    <td>{{date('M / d / Y',strtotime($posts->created_at))}}</td>
                    <td>{{date('M / d / Y',strtotime($posts->updated_at))}}</td>
                    <td><a href="{{ route('section18.show', $posts->id) }}" class="btn btn-primary">View </a></td>
                </tr>
               @endforeach
             
            </tbody>
        </table>
    </div>
    

</div>
    
@endsection