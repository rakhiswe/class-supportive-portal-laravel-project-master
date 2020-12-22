@extends('teacher.layouts.master')

@section('content')

<div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Update Notice</h3>
                </div>
                <div class="col-4 text-right">
                
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Notice information</h6>
                <div class="pl-lg-4">
                  
  
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">My Courses</label>
                        
                          <select class="form-control" name="coursename" >
                              @foreach ($mycourse as $mc)
                              <option value="{{$mc->course_name.$mc->section}}"> {{$mc->course_name}} [Section-{{$mc->section}}]</option>
                              @endforeach
                      
                          </select>
                         
                        </div>
                      </div>
                   
                
                    <div class="pl-lg-4">
            
                        <div class="form-group">
                          <label class="form-control-label">Title</label>
                          <textarea name="title" rows="4" class="form-control" ></textarea>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Details</label>
                          <textarea name="details" rows="4" class="form-control" placeholder="A few words about you ..."></textarea>
                        </div>
                    </div>
                     
                          
                   
                    </div>
                   
                <input type="submit" name="submit" class="btn-md btn-primary">
              
                </div>
               
              </form>
            </div>
          </div>
        </div>
      </div>

      @endsection