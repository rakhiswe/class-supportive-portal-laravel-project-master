@extends('teacher.layouts.master')

@section('content')


<div class="col-xl-8 order-xl-1">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Update a Blog </h3>
          </div>
          
        </div>
      </div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data" >
            
          @csrf
          <!-- Address -->
      
          <!-- Description -->
          <h6 class="heading-small text-muted mb-4">Post Details</h6>
          <div class="pl-lg-8">
            
            <div class="form-group">
              <label class="form-control-label">Title</label>
              <textarea name="title" rows="4" class="form-control" value="{{$blog[0]->title}}" ></textarea>
            </div>
            <div class="form-group">
              <label class="form-control-label">Details</label>
              <textarea name="details" rows="4" class="form-control" value="{{$blog[0]->details}} placeholder="A few words about you ..."></textarea>
            </div>
            <div class="form-group">
              <label class="form-control-label">Add Photo</label>
              
            </div>
          </div>
          <input type="submit" name="submit" class="btn btn-lg btn-neutral mr-auto">
        </form>
      </div>
    </div>
  </div>
</div>


@endsection