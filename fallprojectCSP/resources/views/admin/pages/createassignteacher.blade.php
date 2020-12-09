@extends('admin.layouts.master')

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
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Section</label>
                        <select name="section" class="form-control">
                          <option value="A">Sec:A</option>
                          <option value="B">Sec:B</option>
                          <option value="C">Sec:C</option>
                          <option value="D">Sec:D</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Course Name</label>
                      

                            
                       
                        <select name="courseid" class="form-control">
                          @foreach ($allcourse as $course)
                          <option value="{{$course->id}}">{{$course->course_name}}</option>
                         
                          @endforeach
                        </select>

                      
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Teacher Name</label>
                      
                        <select name="teacherid" class="form-control">
                          @foreach ($allteacher as $teacher)
                          <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                         
                          @endforeach
                              
                         
                        </select>
                       
                      </div>
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