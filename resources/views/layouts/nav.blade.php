<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('welcome')}}">Time Management System</a>
    <ul class="navbar-nav ml-auto">
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Welcome, {{Auth::user()->name}}!
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('home')}}">Dashboard</a>
                    <a class="dropdown-item" href="{{route('logout')}}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit()">{{__('Logout')}}</a>

                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a href="{{route('login')}}" class="nav-link">Login</a>
            </li>
        @endauth
    </ul>
</nav>
