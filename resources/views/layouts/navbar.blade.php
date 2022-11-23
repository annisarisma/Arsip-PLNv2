<div class="home-navbar">
    <i class='bx bx-menu'></i>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu dropdown-menu-light">
                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</div>
