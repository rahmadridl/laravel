<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container navigation">

      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="">
          <img src="img/logo.png" alt="" width="150" height="40" />
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#Product">Services</a></li>
          <li><a href="#aboutus">About Us</a></li>
          <li><a href="#contactus">Contact Us</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                class="badge custom-badge red pull-right">Extra</span>More <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('register') }}">Register</a></li>
              <li><a href="{{ route('login') }}" >Login</a></li>
              <li><a href="Action/careers">Careers</a></li>
              <li><a href="Action/blog">Blog</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>