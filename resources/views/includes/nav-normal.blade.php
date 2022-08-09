<div id="nav" class="md:bg-green-800 bg-white md:py-12 h-screen md:text-white text-black w-full">
    <div id="homeNav" class="nav-front-menu flex justify-between px-6">
        <a class="flex justify-between w-full" href="{{ route('dashboard-admin') }}">
            <div>Home</div>
            <div><i class="text-black md:text-white fas fa-home"></i></div>
        </a>
    </div>

    <!-- Staff  -->
    <div id="staffNav" class="nav-front-menu flex justify-between px-6">
        <div>Leave Request</div>
        <div><i class="text-black md:text-white fas fa-users"></i></div>
    </div>
    <div id="staffBody" class="hidden bg-green-700">
        <div id="newLeaveRequest" class="nav-front-menu flex justify-between px-6">
            <div>Leave Request</div>
        </div>
        <a href="{{ route('leave') }}">
            <div id="allLeaveRequest" class="nav-front-menu flex justify-between px-6">
                <div>All Leave Requests</div>
            </div>
        </a>
    </div>
    <!-- End of Staff  -->

    <!-- Report  -->
    <div id="reportNav" class="nav-front-menu flex justify-between px-6">
        <div>Report</div>
        <div><i class="text-black md:text-white fas fa-folder"></i></div>
    </div>
    <div id="reportBody" class="hidden bg-green-700">
        <div id="newReport" class="nav-front-menu flex justify-between px-6">
            <div>New Report</div>
        </div>
        <a href="{{ route('report') }}">
            <div id="allReports" class="nav-front-menu flex justify-between px-6">
                <div>All Reports</div>
            </div>
        </a>
    </div>
    <!-- End of Report  -->

    <!-- Profile  -->
    <div id="profileNav" class="nav-front-menu flex justify-between px-6">
        <div>Change Password</div>
        <div><i class="text-black md:text-white fas fa-lock"></i></div>
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
    <!-- End of Profile  -->
</div>