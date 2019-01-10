@extends('layouts.user')
@section('style')
    .owl-carousel .owl-dots.disabled, .owl-carousel .owl-nav.disabled
    {
        display: block !important;
    }
@stop
@section('content')

<?php
$info = ['logo'=>0,'co name'=>1,'co activity'=>2,'co comment'=>3];
?>


<!-- main slider -->
<section class="block1">
    <div class="upper">
        <div class="para text-center">
            <h2 class="p-5 fa-6x" >{{$maininfo[ $info['co name'] ]->content}}</h2>
            <h3>{{$maininfo[ $info['co activity'] ]->content}}</h3>
            <h3 class="py-5">{{$maininfo[ $info['co comment'] ]->content}}</h3>
        </div>
    </div>
    <div id="carouselExampleSlidesOnly" class="carousel slide w-100 h-100" data-ride="carousel">
        <div class="carousel-inner w-100 h-100">
            @foreach($sliderimages as $simage)
                <div class="carousel-item w-100 h-100" >
                    <img src="{{url('upload/slider images',$simage->name)}}" class="d-block w-100">
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end main slider -->


<!-- اخبار الشركه -->
<section class="block2">
    <div class="para text-center pt-5">
        <h2 class="p-4 mt-5">اخبار الشركه</h2>
        <div class="line mx-auto"></div>
    </div>
    <div class="content p-5">
        @foreach($news as $new)
        <p class="text-center px-5 py-3 mx-5">{{$new->content}}</p>
        @endforeach
    </div>

    <div style="background-color: #eee">
        <div class="para text-center pt-5">
            <h2 class="p-4 mt-5">الصور</h2>
            <div class="line mx-auto"></div>
        </div>
        <div class="content p-5">
            <div class="owl-carousel owl-theme first">
                @foreach($photos as $photo)
                    <div class="item">
                        <img src="{{url('upload/photos album',$photo->name)}}" class="d-block w-100 rounded">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="para text-center pt-5">
        <h2 class="p-4 mt-5">فعاليات الشركه</h2>
        <div class="line mx-auto"></div>
    </div>

    <div class="content p-5">
        <div class="container">
            @foreach($events as $event)
                <div class="row my-4">
                    <div class="col-md-6">
                        <h2 class="text-right">{{$event->title}}</h2>
                        <p class="text-right p-3">{{$event->content}}</p>
                    </div>
                    <div class="col-md-6">
                        <img src="{{url('upload/events',$event->image_name)}}" class="d-block w-100 h-100  rounded">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center m-5">
        <iframe width="90%" height="400px" src="https://www.youtube.com/embed/TkHoCBON9ck" frameborder="0"></iframe>
    </div>
</section>
<!-- نهايه اخبار الشركه -->

<section class="block3" style="background-color: #eee">
    <div class="para text-center pt-5">
        <h2 class="p-4 mt-5">خدمات الشركه</h2>
        <div class="line mx-auto"></div>
    </div>
    <div class="content p-5">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4 col-sm-6 my-4">
                        <div class="card">
                            <img src="{{url('upload/services',$service->image_name)}}" class="card-img-top w-100">
                            <div class="card-body">
                                <h5 class="card-title text-right">{{$service->title}}</h5>
                                <p class="card-text text-right">{{$service->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


<!--    بدايه المشاريع  -->
<section class="block4 p-5">
    <div class="para">
        <h2 class="text-center">المشاريع</h2>
        <div class="line">
            <nav>
                <div class="nav nav-tabs mx-auto my-5" id="nav-tab" role="tablist">
                    @foreach($categories as $category)
                        <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-{{$category->id}}" role="tab" aria-controls="nav-home" aria-selected="true">{{$category->category}}</a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                @foreach($categories as $category)
                    <div class="tab-pane fade show" id="nav-{{$category->id}}" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container">
                            <div class="row">
                            @foreach($category->projects as $project)      
                                <div class="col-md-4 col-sm-6">
                                    <div class="card">
                                        <img src="{{url('upload/projects',$project->image_name)}}" class="card-img-top w-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$project->title}}</h5>
                                            <p class="card-text">{{$project->content}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--   نهايه المشاريع  -->

<!--  اهم العملاء-->
<section class="p-5 block5" style="background-color: #eee">
    <h2 class="text-center p-5"> اهم العملاء</h2>
    <div class="line"></div>
    <div class="owl-carousel owl-theme second">
        @foreach($clients as $client)
        <div class="item text-center border p-3">
            <h2>{{$client->name}}</h2>
            <p>{{$client->job}}</p>
            <p class="text-center px-5 mx-auto article">{{$client->comment}}</p>
        </div>
        @endforeach
        
    </div>
</section>
<!--نهايه اهم العملاء-->


@stop
@section('js')

    <!-- set the first carousel item active -->
    $('.carousel-inner .carousel-item:nth-child(1)').addClass('active')
    $('#nav-tab .nav-item:nth-child(1)').addClass('active')
    $('#nav-tabContent .tab-pane:nth-child(1)').addClass('active')

    <!-- set the speed of the carousel -->
    $('.carousel').carousel({
        interval: 2000,
    })

@stop