<div id="nav" class="md:bg-green-800 bg-white md:py-12 h-screen md:text-white text-black w-full">
    <div id="homeNav" class="nav-front-menu flex justify-between px-6">
        <a class="flex justify-between w-full" href="{{ route('dashboard-admin') }}">
            <div>Home</div>
            <div><i class="text-black md:text-white fas fa-home"></i></div>
        </a>
    </div>
    
    <!-- Department  -->
    <div id="deptNav" class="nav-front-menu flex justify-between px-6">
        <div>Department</div>
        <div><i class="text-black md:text-white fas fa-building"></i></div>
    </div>
    <div id="deptBody" class="hidden lg:bg-green-700">
        <div id="newDept" class="nav-front-menu flex justify-between px-6">
            <div>New Department</div>
        </div>
        <a href="{{ route('dept') }}">
            <div class="nav-front-menu flex justify-between px-6">
                <div>All Departments</div>
            </div>
        </a>
    </div>
    <!-- End of Department  -->
    
    <!-- Rank  -->
    <div id="rankNav" class="nav-front-menu flex justify-between px-6">
        <div>Rank</div>
        <div><i class="text-black md:text-white fas fa-building"></i></div>
    </div>
    <div id="rankBody" class="hidden lg:bg-green-700">
        <div id="newRank" class="nav-front-menu flex justify-between px-6">
            <div>New Rank</div>
        </div>
        <a href="{{ route('rank') }}">
            <div class="nav-front-menu flex justify-between px-6">
                <div>All Ranks</div>
            </div>
        </a>
    </div>
    <!-- End of Rank  -->

    <!-- Staff  -->
    <div id="staffNav" class="nav-front-menu flex justify-between px-6">
        <div>Staff</div>
        <div><i class="text-black md:text-white fas fa-users"></i></div>
    </div>
    <div id="staffBody" class="hidden lg:bg-green-700">
        <div id="newStaff" class="nav-front-menu flex justify-between px-6">
            <div>New Staff</div>
        </div>
        <a href="{{ route('dashboard-staff') }}">
            <div class="nav-front-menu flex justify-between px-6">
                <div>Staff</div>
            </div>
        </a>
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

    <!-- Document  -->
    <div id="docNav" class="nav-front-menu flex justify-between px-6">
        <div>Document</div>
        <div><i class="text-black md:text-white fas fa-folder"></i></div>
    </div>
    <div id="docBody" class="hidden lg:bg-green-700">
        <div id="newDirectory" class="nav-front-menu flex justify-between px-6">
            <div>Create Directory</div>
        </div>
        <a href="{{ route('directory') }}">
            <div id="allDirectories" class="nav-front-menu flex justify-between px-6">
                <div>All Directories</div>
            </div>
        </a>
        <div id="newDoc" class="nav-front-menu flex justify-between px-6">
            <div>Upload Document</div>
        </div>
        <a href="{{ route('doc') }}">
            <div id="allDoc" class="nav-front-menu flex justify-between px-6">
                <div>All Documents</div>
            </div>
        </a>
    </div>
    <!-- End of Document  -->

    <!-- Report  -->
    <div id="reportNav" class="nav-front-menu flex justify-between px-6">
        <div>Report</div>
        <div><i class="text-black md:text-white fas fa-folder"></i></div>
    </div>
    <div id="reportBody" class="hidden lg:bg-green-700">
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

    <!-- Blog  -->
    <div id="blogNav" class="nav-front-menu flex justify-between px-6">
        <div>Blog</div>
        <div><i class="text-black md:text-white fas fa-blog"></i></div>
    </div>
    <div id="blogBody" class="hidden lg:bg-green-700">
        <div id="newBlog" class="nav-front-menu flex justify-between px-6">
            <div>New Post</div>
        </div>
        <a href="{{ route('blog') }}">
            <div id="allBlog" class="nav-front-menu flex justify-between px-6">
                <div>All Blog Posts</div>
            </div>
        </a>
    </div>
    <!-- End of Blog  -->

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