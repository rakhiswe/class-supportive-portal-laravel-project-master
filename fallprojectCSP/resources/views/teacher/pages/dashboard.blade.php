@extends('teacher.layouts.master')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">teacher</a></li>
               
              </ol>
            </nav>
          </div>
         
        </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">My Blog</h5>
                    <span class="h2 font-weight-bold mb-0"> {{count($tb)}} </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-collection"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                 
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Students Request Pending</h5>
                   
                    <span class="h2 font-weight-bold mb-0">
                     {{count($tpr)}}
                      
                    
                      </span>
                       
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-basket"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                 
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">My Notice</h5>
                    <span class="h2 font-weight-bold mb-0">  {{count($tn)}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-paper-diploma"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                  
                </p>
              </div>
            </div>
          </div>
          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h1>hhhhh</h1>

@endsection