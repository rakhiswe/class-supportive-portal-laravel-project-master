@extends('student.layouts.master')

@section('content')
<div class="col-xl-12 order-xl-1">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Add Course </h3>
          </div>
          <div class="col-4 text-right">
          
          </div>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <h6 class="heading-small text-muted mb-4">Course information</h6>
          <div class="pl-lg-4">
           
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Course Name</label>
                

                      
                 
                  <select id="course_id" name="courseid" class="form-control course">
                      @foreach ($course as $c)
                          
                     
                     <option value="{{$c->id}}">{{$c->course_name}}</option>

                     @endforeach
                </select>

                </div>
              </div>


              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Select Section</label>
                
                  <select id="teachername" name="section" class="section form-control ">
                   
                  
                    <option value="">select section</option>
                   
                  </select>
                 
                </div>
              </div>

              <div class="col-lg-6">
                  <div class="teacher form-group">
                    
                  </div>
              </div>
            

            <div class="row">
           
            
           
          </div>
          <input type="submit" name="submit" class="btn-md btn-primary">
        
          </div>
         
        </form>
      </div>
    </div>
           
<div class="col-md-12">
    
    <div class="table-responsive">

            <h1>My Courses</h1>
          <table id="mytable" class="table table-bordred table-striped">
               
               <thead>
               
                <th>Course Name</th>
               <th>Section</th>
                <th>Teacher Name</th>
                 <th>status</th>
                 
                  <th>Action</th>
               </thead>
<tbody>

    @foreach ($reg as $r)
        
   

<tr>
    <td>{{$r->course_name}}</td>
    <td>{{$r->section}}</td>
    <td>{{$r->name}}</td>
    <td>{{$r->status}}</td>


</tr>

@endforeach

</tbody>
    
</table>

  </div>
</div>

 

<script>
    $(document).ready(function(){

    $(document).on('change','.course',function(){

        var course_id = $(this).val();
        var div=$(this).parent();
        var op = "";

        $('select[name="section"]').empty();

        $.ajax({

            type:'get',
            url: "{{ url('/student/findsection') }}",
            data:{'id':course_id},
            success:function(data){

               

                
                $('select[name="section"]').append('<option value="">Select Section</option>');
                
                        $.each(data, function(key, value) {

                            $('select[name="section"]').append('<option value="'+ value.section +'">'+ value.section +'</option>');
                        });
            }
           

        });
    });


 $(document).on('change','.section',function(){

var section = $(this).val();
var course = $('#course_id').val();

console.log('xxxxxxxxxxx->',section);

//var div=$(this).parent();
//var op = "";

$('.teacher').empty();


$.ajax({

    type:'get',
    url: "{{ url('/student/findteacher') }}",
    data:{'cid':course,
            'section':section
            },
    dataType:'json',
    success:function(data){
        

        console.log(data[0].name);

        $('.teacher').append('Teacher Name: <input type="text" name="teacher_name" class="form-control" value="'+data[0].name+'" placeholder="'+data[0].name+'" readonly><input type="hidden" name="teacher_id" class="form-control" value="'+data[0].id+'" placeholder="'+data[0].id+'">');
        

        
        
       
    }
   

});



    });
});


</script>



@endsection