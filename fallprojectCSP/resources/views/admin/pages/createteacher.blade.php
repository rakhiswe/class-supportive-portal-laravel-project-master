@extends('admin.layouts.master')

@section('content')

<div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add Teacher </h3>
                </div>
               
              </div>
            </div>
            <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.teachers.createteacher')}}">
              {{ csrf_field() }}
              <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Teacher ID</label>
                        <input type="text" name="teacherid" id="input-username" class="form-control" placeholder="Teacher Id" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" name="email" id="input-email" class="form-control" placeholder="jesse@diu.edu.bd">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Full name</label>
                        <input type="text" name="name" id="input-first-name" class="form-control" placeholder=" Full name" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Password</label>
                        <input type="password" name="password" id="input-last-name" class="form-control" placeholder="Password" >
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Photo</label>
                        <input type="file" name="photo" id="input-first-name" class="form-control" placeholder=" Photo " >
                      </div>
                    </div>
                  </div>
                </div>
               
                  
               
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Mobile Number</label>
                        <input id="input-address" name="number" class="form-control" placeholder="Mobile Number"  type="text">
                      </div>
                    </div>
                  </div>
                </div>
                  
               <input type="submit" name="submit" class="btn-md btn-primary">

                   
               
              </form>
            </div>
          </div>
        </div>
      </div>

      @endsection