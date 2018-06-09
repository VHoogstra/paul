<!-- Nvincent_Hoogstra@live.nlavigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('dashboard.index')}}">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="{{route('registering.index')}}">
                    <i class="fa fa-fw fa-paper-plane"></i>
                    <span class="nav-link-text">Student sign in</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Statistics</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-calendar-o"></i>
                    <span class="nav-link-text">Party</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="{{route("party.index")}}">Show</a>
                    </li>
                    <li>
                        <a href="{{route("party.create")}}">Create</a>
                    </li>
                    <li>
                        <a href="{{route("party.indexArchive")}}">archief</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-address-book-o"></i>
                    <span class="nav-link-text">Students</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">

                    <li>
                        <a href="{{route('student.create')}}">Update list</a>
                    </li>
                    <li>
                        <a href="{{route('student.index')}}">Update Photo's</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                    <i class="fa fa-fw  fa-lock"></i>
                    <span class="nav-link-text">admin</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti">
                    <li>
                        <a href="">log</a>
                    </li>
                    <li>
                        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Users</a>
                        <ul class="sidenav-third-level collapse" id="collapseMulti2">
                            <li>
                                <a href="#">Show</a>
                            </li>
                            <li>
                                <a href="#">Edit</a>
                            </li>
                            <li>
                                <a href="#">Create</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
