<nav class="d-flex justify-content-end  w-100 sticky-top" >
    <ul class="navbar  list-unstyled w-50 ">
        <li class="nav-item"><a class="nav-link" href="">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="">Notes </a></li>
        <li class="nav-item"><a class="nav-link" href="">Notes partagée</a></li>
        <li class="nav-item"><a class="nav-link" href="">Notes likés</a></li>

        @if (Route::has('login'))
            @auth
                <li >
                  <a class="nav-link scrollto text-decoration-underline" href="{{ route('back') }}" >Dashboard</a>
              </li>
            <li >
              <form class="m-0" action="{{ route('logout') }}" method="post" id="form">
              @csrf

                <a class="nav-link scrollto text-decoration-underline" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('form').submit();" >Log out </a>
              </form>
            </li>
            @else
            <li >
              <a class="nav-link scrollto text-decoration-underline" href="{{ route('login') }}"  >Log in</a>
            </li>


              @if (Route::has('register'))
                <li >
                  <a class="nav-link scrollto text-decoration-underline" href="{{ route('register') }}" >Register</a>
                </li>

                @endif
            @endauth
         @endif
    </ul>
</nav>