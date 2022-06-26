<div id="nav" class="md:bg-green-800 bg-white md:py-12 h-screen md:text-white text-black w-full">
    <div id="homeNav" class="nav-front-menu flex justify-between px-6">
        <a class="flex justify-between w-full" href="{{ route('dashboard-admin') }}">
            <div>Home</div>
            <div><i class="text-black md:text-white fas fa-home"></i></div>
        </a>
    </div>
    <div id="deptNav" class="nav-front-menu flex justify-between px-6">
        <div>New Department</div>
        <div><i class="text-black md:text-white fas fa-book"></i></div>
    </div>
    <div id="rankNav" class="nav-front-menu flex justify-between px-6">
        <div>Rank</div>
        <div><i class="text-black md:text-white fas fa-book"></i></div>
    </div>
    <div id="docNav" class="nav-front-menu flex justify-between px-6">
        <div>Documents</div>
        <div><i class="text-black md:text-white fas fa-book"></i></div>
    </div>
    <div id="staffNav" class="nav-front-menu flex justify-between px-6">
        <div>New Staff</div>
        <div><i class="text-black md:text-white fas fa-user"></i></div>
    </div>
    <a href="{{ route('dashboard-staff') }}">
        <div class="nav-front-menu flex justify-between px-6">
            <div>Staff</div>
            <div><i class="text-black md:text-white fas fa-user"></i></div>
        </div>
    </a>
    <div id="profileNav" class="nav-front-menu flex justify-between px-6">
        <div>Profile</div>
        <div><i class="text-black md:text-white fas fa-user"></i></div>
    </div>
    <div id="cargoNav" class="nav-front-menu flex justify-between px-6">
        <div>Blog</div>
        <div><i class="text-black md:text-white fas fa-book"></i></div>
    </div>
    <div class="nav-front-menu flex justify-between px-6">
        <div>Logout</div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex justify-between">
                <div><i class="text-black md:text-white fas fa-sign-out-alt"></i></div>
            </button>
        </form> 
    </div>
</div>