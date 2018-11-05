<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">{{ config('app.name', 'Laravel') }}</a>

    <div class="collapse navbar-collapse" id="navbarResponsive">


        <ul class="navbar-nav ml-auto">
            @if (Auth::guest())
            <a class="nav-link mr-lg-2" href='{{ route('login') }}'>
                <i class="fa fa-fw fa-sign-in" aria-hidden="true"></i>Login
            </a><a class="nav-link mr-lg-2" href='{{ route('register') }}'>
                <i class="fa fa-fw fa-pencil-square-o"></i>Register
            </a>
            @else
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
            @endif
        </ul>
    </div>
</nav>


<!--Authentication Links 
                @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endif-->
