<!DOCTYPE html >
<html lang="ar">

<?php
$logo = App\MainInfo::where('id',1)->get();
?>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>مكتب المقاولات والانشاءات الهندسيه</title>
    <link rel="icon" type="image" href="{{url('upload/logo',$logo[0]->content)}}">
    <!-- style sheets -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/libs/css/bootstrap.min.css')}}">
    <link href="{{url('assets/libs/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('assets/libs/css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/user/css/style.css')}}">
    <style type="text/css">
        @yield('style')
        i
        {
            color: #fff;
            font-size: 30px;
            margin-right: 10px;
        }
        .footer p
        {
            color: #fff;
        }
    </style>
</head>
<body>


<!-- navigation bar -->
<section class="border-bottom">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
        <a class="navbar-brand mx-2" href="{{url('home')}}">
            
            <img src="{{url('upload/logo',$logo[0]->content)}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('home')}}">الرئيسيه <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{url('about')}}" id="navbarDropdown">
                        عن الشركه
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{url('mediacenter')}}" id="navbarDropdown">
                        المركز الاعلامى
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{url('services')}}" id="navbarDropdown">
                        خدمات الشركه
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{url('projects')}}" id="navbarDropdown">
                        المشاريع
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{url('articles')}}" id="navbarDropdown">
                        مقالات
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{url('contact')}}" id="navbarDropdown">
                        اتصل بنا
                    </a>
                </li>
            </ul>


            <div class="float-right navbar">
                <ul class="navbar-nav mr-auto">
                
                    @if(Auth::guard('web')->check())
                    <li class="nav-item">
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::guard('web')->user()->name}}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{url('userlogout')}} ">Logout</a>
                          </div>
                        </div>
                    </li>
                    @endif
                    @if(!Auth::guard('web')->check())
                    <li class="nav-item">
                        <a href="{{url('userlogin')}}" class="nav-link">تسجيل دخول</a>
                    </li>
                    @endif


                    @if(Auth::guard('employee')->check())
                    <li class="nav-item">
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::guard('employee')->user()->name}}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{url('employeelogout')}} ">Logout</a>
                          </div>
                        </div>
                    </li>
                    @endif
                    @if(!Auth::guard('employee')->check())
                    <li class="nav-item">
                        <a href="{{url('employeelogin')}}" class="nav-link">دخول موظف</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

    </nav>
</section>
<!-- end navigation bar -->


@yield('content')


<!--  الفوتر-->
<section class="footer border-top">
    <div class="text-center p-5">
        <?php
            $icons = App\Icon::get();
            $phone = App\MainInfo::where('info','phone number')->get();
        ?>
        @foreach($icons as $icon)
        @if($icon->status == true)
            <a href="{{$icon->link}}" target="_blank">
                {!!$icon->html!!}
            </a>
        @endif
        @endforeach

    <div>
        <p class="text-center fa-2x my-4">{{$phone[0]->content}}</p>
    </div>
    </div>
</section>
<!--  نهايه الفوتر-->




<script src="{{url('assets/admin/lib/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/libs/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/libs/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/user/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/user/js/mine.js')}}"></script>
<script type="text/javascript">
    @yield('js')
</script>
</body>
</html>
