<div id="menu" class="p-6">
    <!-- Notification -->
    @include('includes.notification')
    <!-- Message  -->
    <div class="py-1 mb-8 text-center">
        @include('layouts.messages')
    </div>
    <!-- Section  -->
    <div id="homeBar" class="grid grid-cols-3 gap-3">
        <!-- Bar Chart  -->
        <div class="shadow-lg col-span-2">
            {!! $chart->container() !!}
        </div>
        <!-- Statistics  -->
        <div class="my-auto col-span-1">
            <div class="stats-div w-full mx-4">
                <a href="{{ route('dashboard-staff') }}" class="flex items-center">
                    <span><i class="fas fa-users"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Staff: {{ $staff->count() }}</span>
                </a>
            </div>
            <div class="stats-div w-full mx-4">
                <a href="{{ route('dept') }}" class="flex items-center">
                    <span><i class="fas fa-building"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Department: {{ $department->count() }}</span>
                </a>
            </div>
            <div class="stats-div w-full mx-4">
                <a href="{{ route('report') }}" class="flex items-center">
                    <span><i class="fas fa-folder"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Reports: {{ $report->count() }}</span>
                </a>
            </div>
            <div class="stats-div w-full mx-4">
                <a href="{{ route('doc') }}" class="flex items-center">
                    <span><i class="fas fa-folder"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Documents: {{ $document->count() }}</span>
                </a>
            </div>
            <div class="stats-div w-full mx-4">
                <a href="{{ route('doc') }}" class="flex items-center">
                    <span><i class="fas fa-blog"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Blog Posts: {{ $blog->count() }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Trademark  -->
    @include('includes.trademark')
    {!! $chart->script() !!}
</div>