
@section("nav_sidebar")
    <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar" class="active">
                
        <ul class="list-unstyled components mb-5">
            <li><h1><a href="index.html" class="logo-shivila logo">S</a></h1></li>
          <li class="active">
            <a href="#"><span class="fa fa-home"></span> Home</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-user"></span> About</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-sticky-note"></span> Blog</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cogs"></span> Services</a>
          </li>
          <li class="nav-item" title="LogOut">
            <a class="nav-link" href="{{Route('logout')}}">
              <span class="fa fa-sign-out"></span>
              Logout
            </a>
      </li>
        </ul>

        <div class="footer">
          
        </div>
        </nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item" title="LogOut">
                    <a class="nav-link" href="{{Route('logout')}}">
                      <i class="fa fa-sign-out btn-primary" style="font-size: 20px;padding: 2px;"></i>
                    </a>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="main-container p-4">

@endsection