<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">CodingLab</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list ">

        <li>
            <a href="{{route('notes.index')}}" class="text-light">
            <i class='bx bx-note' ></i>
            <span class="links_name">Notes</span>
            </a>
            <span class="tooltip">Notes</span>
        </li>



        <li class="profile">
            <div class="profile-details">
                <i class='bx bx-user'></i>

                <div class="name_job">
                    <div class="name">{{ Auth::user() !== null ? Auth::user()->name : '' }}</div>
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
            <a href="/index">
                <i class='bx bx-home'></i>
                <span class="tooltip">front</span>
            </a>
        </li>
    </ul>
</div>

