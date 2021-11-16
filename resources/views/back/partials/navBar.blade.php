<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">CodingLab</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list ">

        <li>
            <a href="" class="text-light">
            <i class='bx bx-navigation'></i>
            <span class="links_name">NavBar</span>
            </a>
            <span class="tooltip">NavBar</span>
        </li>
        <li>
            <a href="" class="text-light">
                <i class='bx bx-heading'></i>
                <span class="links_name">Hero</span>
            </a>
            <span class="tooltip">Hero</span>
        </li>
        <li>
            <a href="" class="text-light">
                <i class='bx bx-question-mark'></i>
                <span class="links_name">About</span>
            </a>
            <span class="tooltip">About</span>
        </li>

        <li>
            <a href="" class="text-light">
               <i class='bx bx-folder-open' ></i>
                <span class="links_name">Portfolio</span>
            </a>
            <span class="tooltip">Portfolio</span>
        </li>
        <li>
            <a href="" class="text-light">
               <i class='bx bx-list-ul'></i>
                <span class="links_name">Service</span>
            </a>
            <span class="tooltip">Service</span>
        </li>
        <li>
            <a href="" class="text-light">
               <i class='bx bx-group' ></i>
                <span class="links_name">Team</span>
            </a>
            <span class="tooltip">Team</span>
        </li>

        <li>
            <a href="" class="text-light">
               <i class='bx bx-book-open'></i>
                <span class="links_name">Testimonials</span>
            </a>
            <span class="tooltip">Testimonials</span>
        </li>

            


    
        <li>
            <a href="" class="text-light">
               <i class='bx bx-envelope' ></i>
                <span class="links_name">Contact</span>
            </a>
            <span class="tooltip">Contact</span>
        </li>

        <li>
            <a href="" class="text-light">
                <i class='bx bx-book-content'></i>
                <span class="links_name">Features</span>
            </a>
            <span class="tooltip">Features</span>
        </li>
        <li>
            <a href="" class="text-light">
                <i class='bx bx-chat'></i>
                <span class="links_name">Footer</span>
            </a>
            <span class="tooltip">Footer</span>
        </li>








        <li>
            <a href="" class="text-light">
                <i class='bx bx-user'></i>
                <span class="links_name">Users</span>
            </a>
            <span class="tooltip">Users</span>
        </li>


        <li class="profile">
            <div class="profile-details">
                <i class='bx bx-user'></i>

                <div class="name_job">
                    {{-- <div class="name">{{ Auth::user() !== null ? Auth::user()->name : '' }}</div> --}}
                    <div class="job">Web designer</div>
                </div>
                <form action="#" method="post">
                    @csrf

                    <button type="submit">
                        <a href="#">

                            <i class='bx bx-log-out' id="log_out"></i>


                        </a>

                    </button>
                </form>
            </div>
        </li>

        <li class="border border-light w-100 mt-2"></li>
        <li class="mt-3">
            <a href="/">
                <i class='bx bx-home'></i>
                <span class="tooltip">Home</span>
            </a>
        </li>
    </ul>
</div>

