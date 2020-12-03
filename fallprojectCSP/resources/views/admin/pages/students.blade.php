@extends('admin.layouts.master')

@section('content')

<div class="container">
<div class="col-lg-12 mt-3 col-5 text-right">
              <a href="{{route('admin.createstudent')}}" class="btn btn-lg btn-success">Add Student</a>
            
            </div>
	<div class="row">
		
        
        <div class="col-md-12">
        <h1>Students List</h1>
        <div class="table-responsive">

                
          <table id="mytable" class="table table-bordred table-striped">
                   
            <thead>
            
          
            <th>Student ID</th>
             <th>Email</th>
              <th>Full Name</th>
           
              <th>Photo</th>
               <th>Mobile Number</th>
               
                <th>Action</th>
            </thead>
<tbody>

@foreach ($allstudent as $allstudent)
   


<tr>

<td>{{$allstudent->official_id}}</td>
<td>{{$allstudent->email}}</td>
<td>{{$allstudent->name}}</td>
<td><img src="{{asset('images/'.$allstudent->photo)}}" width="100" alt=""></td>
<td>{{$allstudent->number}}</td>
<td><a href="{{route('admin.students.editstudent', $allstudent->id)}}" class="btn-sm btn-success" >edit</a>
<a href="{{route('admin.students.deletestudent', $allstudent->id)}}" class="btn-sm btn-danger">Delete</a>
</td>
</tr>
@endforeach



</tbody>
 
</table>

<div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
                
            </div>
            
        </div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>


@endsection;