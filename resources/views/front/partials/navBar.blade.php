{{-- <nav class="d-flex justify-content-end  w-100 sticky-top" >
    <ul class="navbar  list-unstyled  " width="60%">
        <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Globale</a></li>
        @can('user_connected')
          
          <li class="nav-item"><a class="nav-link" href="{{route('notespersos')}}">Notes persos </a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('notespartagees')}}">Notes partagée</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('noteslikees')}}">Notes likés</a></li>
        @endcan

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
</nav> --}}


 <!-- Require css -->
    <style>
    .scroll-hidden::-webkit-scrollbar {
        height: 0px;
        background: transparent; /* make scrollbar transparent */
    }
    </style>

    <nav class="bg-white shadow-lg">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="flex space-x-7">
						<div>
							<!-- Website Logo -->
							<a href="#" class="flex items-center py-4 px-2">
								<img src="https://thumbs.dreamstime.com/z/vecteur-logo-template-notes-simple-80046720.jpg" alt="Logo" class="h-8 w-8 mr-2">
								<span class="font-semibold text-gray-500 text-lg">Navigation</span>
							</a>
						</div>
						<!-- Primary Navbar items -->
						<div class=" menu md:flex items-center space-x-1">
							<a href="{{route('index')}}" class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold ">Globale</a>
							<a href="{{route('notespersos')}}" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Notes persos </a>
							<a href="{{route('notespartagees')}}" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Notes partagée</a>
							<a href="{{route('noteslikees')}}" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Notes likés</a>
						</div>
					</div>
					<!-- Secondary Navbar items -->
					<div class="menu md:flex items-center space-x-3 ">
 @if (Route::has('login'))
            @auth
              
                  <a class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-green-500 hover:text-white transition duration-300" href="{{ route('back') }}" >Dashboard</a>
             
          
              <form class="m-0" action="{{ route('logout') }}" method="post" id="form">
              @csrf

                <a class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('form').submit();" >Log out </a>
              </form>
           
            @else
          
              <a class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-green-500 hover:text-white transition duration-300" href="{{ route('login') }}"  >Log in</a>
           


              @if (Route::has('register'))
              
                  <a class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300" href="{{ route('register') }}" >Register</a>
               

                @endif
            @endauth
         @endif
						{{-- <a href="" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-green-500 hover:text-white transition duration-300">Log In</a>
						<a href="" class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300">Sign Up</a> --}}
					</div>
					<!-- Mobile menu button -->
					<div class="md:hidden flex items-center">
						<button class="outline-none mobile-menu-button">
						<svg class=" w-6 h-6 text-gray-500 hover:text-green-500 "
							x-show="!showMenu"
							fill="none"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
					</button>
					</div>
				</div>
			</div>
			<!-- mobile menu -->
			<div class="hidden mobile-menu">
				<ul class="">
					<li class="active"><a href="index.html" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
					<li><a href="#services" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a></li>
					<li><a href="#about" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a></li>
					<li><a href="#contact" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact Us</a></li>
				</ul>
			</div>
			<script>
				const btn = document.querySelector("button.mobile-menu-button");
				const menu = document.querySelector(".mobile-menu");

				btn.addEventListener("click", () => {
					menu.classList.toggle("hidden");
				});
			</script>

      <style>
        @media(max-width:750px){
          .menu{
            visibility: hidden;
          }

        }
        @media(min-width:750px){


          .mobile-menu{
            visibility: hidden;
          }

        }
      </style>
		</nav>