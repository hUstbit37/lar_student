<div class='header'>
    <div class="jumbotron text-center" style="margin-bottom:0;">
        <h1>Example Make Blog</h1>
        <p>The busy have no time for tears!</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="{{ route('home')}}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register">Sign Up</a>
                </li>
                @endguest
                @auth
                <li class="nav-item">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user"></i> {{\Auth::user()->username}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register"></a>
                </li>

                <form action="{{route('search')}}" method="post">
                    @csrf
                    <input type="text" name='search' placeholder="Search">
                    <button type='submit' class="btn btn-outline-info">Search</button>
                </form>


                </li>

                @endauth

            </ul>
        </div>
    </nav>


</div>