@extends('student.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 post">
                    <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                    @foreach ($blog as $b)
                        
                   
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                            <span class="glyphicon glyphicon-user"></span>by <b>{{$b->name}}</b> | <span class="glyphicon glyphicon-calendar">
                            </span>{{$b->created_at}} </span>
                        </div>
                    </div>
                    <div class="row post-content">
                        <div class="col-md-3">
                            <a href="#">
                                <img src="{{asset('images/'.$b->bphoto)}}" width="250px" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-9">
                            <p>
                               {{$b->title}}
                            </p>
                            <p>
                                <a class="btn btn-read-more" href="{{route('student.viewblog',$b->bid)}}">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                        href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                        </span></a>
            </div>
        </div>
    </div>
</div>
<style>
    body
{
    margin-top: 50px;
}
a:hover { text-decoration:none; }
.btn
{
    transition: all .2s linear;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
}
.btn-read-more
{
    padding: 5px;
    text-align: center;
    border-radius: 0px;
    display: inline-block;
    border: 2px solid #662D91;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 12px;
    color:#662D91;
}

.btn-read-more:hover
{
    color: #FFF;
    background: #662D91;
}
.post { border-bottom:1px solid #DDD }
.post-title {  color:#662D91; }
.post .glyphicon { margin-right:5px; }
.post-header-line { border-top:1px solid #DDD;border-bottom:1px solid #DDD;padding:5px 0px 5px 15px;font-size: 12px; }
.post-content { padding-bottom: 15px;padding-top: 15px;}

</style>

    
@endsection