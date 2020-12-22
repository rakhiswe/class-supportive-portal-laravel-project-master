@extends('student.layouts.master')

@section('content')

<div class="container">
    <div class="col-md-4 mt-3 ml-2">
        <h4>Select Course & Section</h4>

        <form method="get" action="">
    <select class="course form-control" name="coursename" >
        @foreach ($course as $course)
            
        
                
                <option value="{{$course->course_name.$course->section}}" >{{$course->course_name}} [Section: {{$course->section}}]</option>

      @endforeach

    </select>
    
</form>
</div>
</div>
<br><hr>

<div class="container">

    <div class="col-md-12">

        <div class="notice">

      
        @foreach ($notice as $n)
            
        
        <h1>{{$n->title}}</h1>
        <p>{{$n->details}}</p>
        <p style="color:blue;">Posted By : {{$n->name}}</p>
        <p style="color:red;">Time: {{$n->time}}</p>
        <hr>

        @endforeach
        
    
        <hr>
       
       
    </div>
</div>


    </div>


    <script>
        $(document).ready(function(){


            $(document).on('change','.course',function(){

var course = $(this).val();


console.log('Raakhkihi->',course);


$('.notice').empty();
$.ajax({

    type:'get',
    url: "{{ url('/student/findnotice') }}",
    data:{'course':course },
    dataType:'json',
    success:function(data){

        console.log(data);
        

      
        $.each(data, function(key, value) {

$('.notice').append('<h1>'+ value.title +'</h1><p>'+value.details+'</p><p style="color:blue;">Posted By : '+value.name+'</p> <p style="color:red;">Time: '+value.time+'</p><hr>');
});

        
        
       
    }
    
   

});



    });



        })
    </script>
    
@endsection