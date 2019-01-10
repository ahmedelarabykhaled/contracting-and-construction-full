<!DOCTYPE html>
<html lang="en">

<head>

  <title>Dashio</title>

  <!-- <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Bootstrap core CSS -->
  <link href="{{url('assets/libs/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/libs/css/all.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{url('assets/admin/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <!-- <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/zabuto_calendar.css')}}"> -->

  <style type="text/css">
    .card
    {
      height: auto!important;
    }
    aside a
    {
      font-size: 16px !important;
    }
    @yield('style')
  </style>
    <link rel="stylesheet" type="text/css" href="{{url('assets/admin/lib/gritter/css/jquery.gritter.css')}}" />
  <!-- Custom styles for this template -->
  <link href="{{url('assets/admin/css/style.css')}}" rel="stylesheet">

</head>


<body>
  <section id="container">
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>

      <!--logo start-->
      <a href="{{url('admin/dashboard')}} " class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{url('adminlogout')}} ">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>

  {{session_start()}}
  @yield('active')

      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="{{url('admin/admins',Auth::guard('admin')->user()->id)}} ">
            @if(Auth::guard('admin')->user()->image_name != null)
              <img src="{{url('upload/admins',Auth::guard('admin')->user()->image_name)}}" class="img-circle rounded-circle" width="80">
            @else
              <img src="{{url('assets/images/dummy admin.jpg')}}" class="img-circle rounded-circle" width="80">
            @endif
          </a></p>
          <h5 class="centered">{{Auth::guard('admin')->user()->name}}</h5>
          <li class="mt">
            <a class="{{session('dashboard')}}" href="{{url('admin/dashboard')}}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="#" class="{{session('main')}}">
              <i class="fa fa-desktop"></i>
              <span>Main Page</span>
              </a>
            <ul class="sub">
              <li><a href="{{url('admin/maininfo')}}">Main Info</a></li>
              <li><a href="{{url('admin/sliderimages')}}" >Slider Images</a></li>
              <li><a href="{{url('admin/news')}}">Company News</a></li>
              <li><a href="{{url('admin/photos')}}">Photos Album</a></li>
              <li><a href="{{url('admin/events')}}">Company Events</a></li>
              <li><a href="{{url('admin/services')}}">Company Services</a></li>
              <li><a href="{{url('admin/projects')}}">Company Projects</a></li>
              <li><a href="{{url('admin/clients')}}">Clients Feedback</a></li>
            </ul>
          </li>
          <li class="">
            <a class="{{session('about')}}" href="{{url('admin/about')}}">
              <i class="fa fa-dashboard"></i>
              <span>About Page</span>
              </a>
          </li>
          <li class="">
            <a class="{{session('media center')}}" href="{{url('admin/mediacenter')}}">
              <i class="fa fa-dashboard"></i>
              <span>Media Center Page</span>
              </a>
          </li>
          <li class="">
            <a class="{{session('articles')}}" href="{{url('admin/articles')}}">
              <i class="fa fa-dashboard"></i>
              <span>Articles Page</span>
              </a>
          </li>
          <li class="">
            <a class="{{session('admins')}}" href="{{url('admin/admins')}}">
              <i class="fa fa-dashboard"></i>
              <span>Admins</span>
              </a>
          </li>
          <li class="">
            <a class="{{session('profile')}}" href="{{url('admin/admins',Auth::guard('admin')->user()->id)}}">
              <i class="fa fa-dashboard"></i>
              <span>My Profile</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <!-- /col-lg-9 END SECTION MIDDLE -->

              @yield('content')

          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->

    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>


  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{url('assets/admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{url('assets/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{url('assets/admin/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{url('assets/admin/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{url('assets/admin/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{url('assets/admin/lib/jquery.sparkline.js')}}"></script>
  <script src="{{url('assets/admin/lib/common-scripts.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/admin/lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/admin/lib/gritter-conf.js')}}"></script>
  <script type="text/javascript">
    @yield('js')
  </script>
</body>

</html>
