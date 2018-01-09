<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title')</title>
        @yield('excessjs')
        @yield('css')
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <style></style>
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body>


        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Sahulat</h3>
                    <h5>Your Own Services Finder</h5>
                </div>
                <ul class="list-unstyled components">
                  <li>
                      <a href="{{ Route('getHomeView') }}">&nbsp; Home</a>
                  </li>
                @if (Route::has('login'))
                        @auth
                        @if(auth()->user()->role == "user")
                                <li>
                                    <a href="{{ Route('getUserProfile') }}">&nbsp; Profile</a>
                                </li>
                                <li>
                                    <a href="{{ Route('getHomeView') }}">&nbsp; Services</a>
                                </li>
                      @elseif (auth()->user()->role == "provider")
                                <li>
                                    <a href="{{ Route('getProviderProfile') }}">&nbsp; Profile</a>
                                </li>
                                <li>
                                    <a href="{{ Route('getServiceProvider') }}">&nbsp; Provided Services</a>
                                </li>
                      @elseif (auth()->user()->role == "admin")
                                <li>
                                    <a href="{{ Route('getServiceAdmin') }}">&nbsp; Manage Services</a>
                                </li>
                                <li>
                                    <a href="{{ Route('getServiceAnalysis') }}">&nbsp; Services Analysis</a>
                                </li>
                      @endif

                                <li>
                                    <a href="{{ route('logout')}}">&nbsp; Log Out</a>

                                </li>

                        @else
                        <li>
                            <a href="{{ route('login') }}">&nbsp; Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">&nbsp; Sign Up</a>
                        </li>
                        @endauth
                      </ul>
                      <ul class="list-unstyled CTAs">
                          <li><a href="{{Route('getAboutUs')}}" class="download">About Us</a></li>
                          <li><a href="#" class="article">How to Use</a></li>
                      </ul>


                @endif


            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                              @if (Route::has('login'))
                                      @auth
                                      @if(auth()->user()->role == "user")
                                              <li>
                                                  <a href="{{ Route('getUserProfile') }}">Profile</a>
                                              </li>
                                              <li>
                                                  <a href="#">Services</a>
                                              </li>
                                    @elseif (auth()->user()->role == "provider")
                                              <li>
                                                  <a href="{{ Route('getProviderProfile') }}">Profile</a>
                                              </li>
                                              <li>
                                                  <a href="{{ Route('getServiceProvider') }}">Provided Services</a>
                                              </li>
                                    @elseif (auth()->user()->role == "admin")
                                              <li>
                                                  <a href="{{ Route('getServiceAdmin') }}">Manage Services</a>
                                              </li>
                                              <li>
                                                  <a href="{{ Route('getServiceAnalysis') }}">Services Analysis</a>
                                              </li>
                                    @endif

                                              <li>
                                                  <a href="{{ route('logout')}}">Log Out</a>

                                              </li>

                                      @else
                                      <li>
                                          <a href="{{ route('login') }}">&nbsp; Login</a>
                                      </li>
                                      <li>
                                          <a href="{{ route('register') }}">&nbsp; Sign Up</a>
                                      </li>
                                      @endauth
                                      @endif
                                      <li><a href="{{Route('getAboutUs')}}" class="download">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="welcomemessage">
                  @if(Route::has('login'))
                  <h4>@yield('message')</h4>
                  @auth
                  <center><h3> Welcome {{ auth()->user()->name }}! </h3></center>
                  @else
                  <center><h3> Welcome User! </h3></center>
                  @endauth
                  @endif
                </div>
                <div id="welcomemessage1">
                  <center><h3>@yield('bodytitle')</h3><center>
                </div>
                  <div id="messages">
                  @foreach ($errors->all() as $message)
                    <h4 class="warning">{{ $message }}</h4>
                  @endforeach
                  </div>
                @yield('content')

            </div>
        </div>





        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });
                $(document).ready(function() {
                  $("#welcomemessage").delay(1000).fadeOut(1000);
                  $("#welcomemessage1").hide();
                  $("#welcomemessage1").delay(2000).fadeIn(1000);
                  $("#messages").delay(2000).fadeOut(1000);
                });
                @yield('js')
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
    </body>
</html>
