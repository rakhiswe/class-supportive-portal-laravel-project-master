@extends('student.layouts.master')

@section('content')

<div class="container ml-5">
    <div class="row col-md-12 mt-3">
        <div class="card col-md-12" width="100%">
            <h1>{{$blog[0]->title}}</h1>
            <img src="{{asset('images/'.$blog[0]->bphoto)}}" width="300" alt="">
            <hr>
            <p>{{$blog[0]->details}}</p>
            <p>posted by : {{$blog[0]->name}}</p>
            <p>time: {{$blog[0]->time}}</p>
        </div>
    </div>
</div>
    
@endsection