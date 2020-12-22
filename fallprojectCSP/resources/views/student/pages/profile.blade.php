@extends('student.layouts.master')
@section('content')

<div class="container-fluid mt--20">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{asset('images/'.$profile[0]->photo)}}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
               
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                   
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  {{$profile[0]->name}}<span class="font-weight-light"></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Email : {{$profile[0]->email}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>student ID: {{$profile[0]->official_id}}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i> Contact No : {{$profile[0]->number}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
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