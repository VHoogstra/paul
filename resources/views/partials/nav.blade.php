<div class='nav-side-menu'>
    <div class='brand'>{{ config('app.name', 'Laravel') }}</div>
    <i class='fa fa-bars fa-2x toggle-btn' data-toggle='collapse' data-target='#menu-content' id="menuColapase"></i>
    <div class='menu-list'>
        <ul id='menu-content' class='menu-content collapse out'>
            @if(Auth::user()->userRole->id >=2) {{--//user--}}
            <li>
                <a href='{{route('dashboard.index')}}' class="link_full_space">
                    <i class='fas fa-tachometer-alt fa-lg'></i> Dashboard
                </a>
            </li>

            <li>
                <a href='{{route('registering.index')}}' class="link_full_space">
                    <i class='fa fa-users fa-lg'></i> Studenten aanmelden
                </a>
            </li>
            @endif

            @if(Auth::user()->userRole->id >=3) {{--//admin--}}
            <li>
                <a href='' class="link_full_space">
                    {{--<i class='fa fa-chart-line fa-lg'></i>--}}
                    <i class='fas fa-user-injured  fa-lg'></i>Statistiek <span class='badge badge-warning higher-badge'>(comming soon)</span>

                </a>
            </li>
            <li>
                <a href='{{route('party.index')}}' class="link_full_space">
                    <i class='fab fa-fort-awesome-alt fa-lg'></i> Feesten
                </a>
            </li>

            <li data-toggle='collapse' data-target='#service' class='collapsed'>
                <a class="link_full_space" style='width: 100%;'>
                    <i class='fas fa-hat-wizard fa-lg'></i> Admin <span
                            class='fas fa-angle-down arrow'></span></a>
            </li>
            <ul class='sub-menu collapse' id='service'>
                <li>
                    <a href='{{route('user.index')}}' class="link_full_space">
                        <i class="fas fa-users-cog"></i> Users
                    </a>
                </li>
                <li>
                    <a href='{{route('student.create')}}' class="link_full_space">
                        <i class="far fa-file-excel"></i> Upload new students
                    </a>
                </li>
            </ul>
            @endif
            <li>
                <a class="link_full_space">
                    <i class="fas fa-user-circle fa-lg"></i></i> Profiel <span class='badge badge-warning higher-badge'>(comming soon)</span>
                </a>
            </li>
            <li>
                <a class="link_full_space" data-toggle="modal" data-target="#LogoutModel" class="link_full_space">
                    <i class="fas fa-sign-out-alt fa-lg"></i> Logout
                </a>
            </li>
            {{--<li>--}}
            {{--Logout--}}
            {{--{{(Auth::user()->userRole->name)}}--}}
            {{--@if(Auth::user()->role >2)--}}
            {{--</li>--}}
            {{--<i class='fas fa-user-injured'></i> for unfinished pages--}}
        </ul>
    </div>
</div>