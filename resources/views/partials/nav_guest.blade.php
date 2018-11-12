<!-- Navigation-->
{{--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">--}}
{{--<a class="navbar-brand" href="index.html">{{ config('app.name', 'Laravel') }}</a>--}}

{{--<div class="collapse navbar-collapse" id="navbarResponsive">--}}


{{--<ul class="navbar-nav ml-auto">--}}
{{--@if (Auth::guest())--}}
{{--<a class="nav-link mr-lg-2" href='{{ route('login') }}'>--}}
{{--<i class="fa fa-fw fa-sign-in" aria-hidden="true"></i>Login--}}
{{--</a><a class="nav-link mr-lg-2" href='{{ route('register') }}'>--}}
{{--<i class="fa fa-fw fa-pencil-square-o"></i>Register--}}
{{--</a>--}}
{{--@else--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" data-toggle="modal" data-target="#exampleModal">--}}
{{--<i class="fa fa-fw fa-sign-out"></i>Logout</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}
{{--</nav>--}}

{{--<!-- Navigation-->--}}
{{--<nav class='navbar navbar-expand-lg navbar-dark bg-dark fixed-top' id='mainNav'>--}}
{{--<a class='navbar-brand' href='{{route('dashboard.index')}}'>{{ config('app.name', 'Laravel') }}  </a>--}}
{{--<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>--}}
{{--<span class='navbar-toggler-icon'></span>--}}
{{--</button>--}}
{{--<div class='collapse navbar-collapse' id='navbarResponsive'>--}}
{{--<ul class='navbar-nav navbar-sidenav' id='exampleAccordion'>--}}
{{--@if(Auth::user()->role >1)--}}
{{--<li class='nav-item' data-toggle='tooltip' data-placement='right' title='Dashboard'>--}}
{{--<a class='nav-link' href='{{route('dashboard.index')}}'>--}}
{{--<i class='fa fa-fw fa-dashboard'></i>--}}
{{--<span class='nav-link-text'>Dashboard</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li class='nav-item' data-toggle='tooltip' data-placement='right' title='Charts'>--}}

{{--</li><a class='nav-link' href='{{route('registering.index')}}'>--}}
{{--<i class='fa fa-fw fa-paper-plane'></i>--}}
{{--<span class='nav-link-text'>Student sign in</span>--}}
{{--</a>--}}

{{--<li class='nav-item' data-toggle='tooltip' data-placement='right' title='Charts'>--}}
{{--<a class='nav-link' href='#'>--}}
{{--<i class='fa fa-fw fa-area-chart'></i>--}}
{{--<span class='nav-link-text'>Statistics</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--@if(Auth::user()->role >2)--}}
{{--<li class='nav-item' data-toggle='tooltip' data-placement='right' title='Components'>--}}
{{--<a class='nav-link nav-link-collapse collapsed' data-toggle='collapse' href='#collapseComponents' data-parent='#exampleAccordion'>--}}
{{--<i class='fa fa-fw fa-calendar-o'></i>--}}
{{--<span class='nav-link-text'>Party</span>--}}
{{--</a>--}}
{{--<ul class='sidenav-second-level collapse' id='collapseComponents'>--}}
{{--<li>--}}
{{--<a href='{{route('party.index')}}'>Show</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href='{{route('party.create')}}'>Create</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href='{{route('party.indexArchive')}}'>archief</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--<li class='nav-item' data-toggle='tooltip' data-placement='right' title='Example Pages'>--}}
{{--<a class='nav-link nav-link-collapse collapsed' data-toggle='collapse' href='#collapseExamplePages' data-parent='#exampleAccordion'>--}}
{{--<i class='fa fa-fw fa-address-book-o'></i>--}}
{{--<span class='nav-link-text'>Students</span>--}}
{{--</a>--}}
{{--<ul class='sidenav-second-level collapse' id='collapseExamplePages'>--}}

{{--<li>--}}
{{--<a href='{{route('student.create')}}'>Update list</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href='{{route('student.index')}}'>Update Photo's</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--<li class='nav-item' data-toggle='tooltip' data-placement='right' title='Menu Levels'>--}}
{{--<a class='nav-link nav-link-collapse collapsed' data-toggle='collapse' href='#collapseMulti' data-parent='#exampleAccordion'>--}}
{{--<i class='fa fa-fw  fa-lock'></i>--}}
{{--<span class='nav-link-text'>admin</span>--}}
{{--</a>--}}
{{--<ul class='sidenav-second-level collapse' id='collapseMulti'>--}}
{{--<li>--}}
{{--<a href=''>log</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a class='nav-link-collapse collapsed' data-toggle='collapse' href='#collapseMulti2'>Users</a>--}}
{{--<ul class='sidenav-third-level collapse' id='collapseMulti2'>--}}
{{--<li>--}}
{{--<a href='{{route('user.index')}}'>Show</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href='#'>Edit</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href='#'>Create</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--@endif--}}

{{--</ul>--}}

{{--<ul class='navbar-nav ml-auto'>--}}
{{--<li class='nav-item'>--}}
{{--<a class='nav-link' data-toggle='modal' data-target='#exampleModal'>--}}
{{--<i class='fa fa-fw fa-sign-out'></i>Logout</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</nav>--}}

<div class='nav-side-menu'>
    <div class='brand'>{{ config('app.name', 'Laravel') }}</div>
    <i class='fa fa-bars fa-2x toggle-btn' data-toggle='collapse' data-target='#menu-content'></i>
    <div class='menu-list'>
        <ul id='menu-content' class='menu-content collapse out'>
            @if (Auth::guest())
                <li>
                    <a href='{{ route('login') }}' class="link_full_space">
                        <i class="fas fa-sign-in-alt fa-lg"></i> Login
                    </a>
                </li>
                <li>
                    <a href='{{ route('register') }}' class="link_full_space">
                        <i class="fas fa-pencil-alt fa-lg"></i> Register
                    </a>
                </li>
            @else
                <li>
                    <a class="link_full_space" data-toggle="modal" data-target="#exampleModal" class="link_full_space">
                        <i class="fas fa-sign-out-alt fa-lg"></i> Logout
                    </a>
                </li>
            @endif

        </ul>


    </div>
</div>

