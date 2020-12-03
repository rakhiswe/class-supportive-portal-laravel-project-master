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
                        <label class="form-control-label" for="input-username">Course Code</label>
                      <input type="text" id="input-username" class="form-control" value="{{$course[0]->course_code}}" placeholder="coursecode" name="coursecode">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Course Name</label>
                        <input type="text" id="input-email" class="form-control" value="{{$course[0]->course_name}}" placeholder="course name" name="coursename">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Department</label>
                        <input type="text" id="input-first-name" class="form-control" value="{{$course[0]->course_department}}" placeholder="Department" name="department">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Course Fee</label>
                        <input type="text" id="input-last-name" class="form-control"value="{{$course[0]->course_fee}}" placeholder="Course Fee" name="coursefee">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Course Credit</label>
                        <input type="text" id="input-last-name" class="form-control" value="{{$course[0]->course_credit}}" placeholder="Course Credit" name="coursecredit">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Course Cover</label>
                        <input type="file" id="input-last-name" class="form-control" value="{{$course[0]->course_cover}}" placeholder="Course Cover" name="photo">
                      </div>
                    </div>
                  </div>
                </div>
                <input type="submit" name="submit" class="btn btn-lg btn-success">
              
                </div>
               
              </form>
            </div>
          </div>
        </div>
      </div>

      @endsection