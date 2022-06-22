<div id="nav" class="md:bg-red-800 bg-white md:py-12 h-screen md:text-white text-black w-full">
    <div id="homeNav" class="nav-front-menu flex justify-between px-6">
        <a class="flex justify-between w-full" href="{{ route('dashboard-admin') }}">
            <div>Home</div>
            <div><i class="text-black md:text-white fas fa-home"></i></div>
        </a>
    </div>
    <div id="cargoNav" class="nav-front-menu flex justify-between px-6">
        <div>New Cargo</div>
        <div><i class="text-black md:text-white fas fa-book"></i></div>
    </div>
    <a href="{{ route('cargo') }}">
        <div class="nav-front-menu flex justify-between px-6">
            <div>Cargos</div>
            <div><i class="text-black md:text-white fas fa-book"></i></div>
        </div>
    </a>
    <a href="{{ route('manifest') }}">
        <div class="nav-front-menu flex justify-between px-6">
            <div>Weekly Manifest</div>
            <div><i class="text-black md:text-white fas fa-book"></i></div>
        </div>
    </a>
    <a href="{{ route('payment') }}">
        <div class="nav-front-menu flex justify-between px-6">
            <div>Payment</div>
            <div><i class="text-black md:text-white fas fa-file-invoice"></i></div>
        </div>
    </a>
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