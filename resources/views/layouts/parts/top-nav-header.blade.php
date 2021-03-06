<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!--<a href="../../index2.html" class="navbar-brand">{!!config('app.name')!!}</a>-->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul id="navbar-link-container" class="nav navbar-nav">
                    @foreach($views AS $viewURL => $viewName)
                    <li><a href="{{url($viewURL)}}">{{$viewName}}</a></li>
                    @endforeach                                                          
                </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">                   
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <i class="fa fa-user"></i>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{Auth::user()->display_name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{asset("static-img/logo_standalone.jpg")}}" class="img-circle" alt="User Image">
                                <p>
                                    {{Auth::user()->display_name}}
                                </p>
                                <small class="text-white">
                                    Role: {{Auth::user()->role->name}}
                                </small>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="/user/{{Auth::user()->username}}/change-password" class="btn btn-default btn-flat">Change Password</a>
                                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
</header>