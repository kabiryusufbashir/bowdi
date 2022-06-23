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
                    <span><i class="fas fa-user-circle"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Staff: {{ $staff->count() }}</span>
                </a>
            </div>
            <div class="stats-div w-full mx-4">
                <a href="{{ route('dept') }}" class="flex items-center">
                    <span><i class="fas fa-book"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Department: {{ $department->count() }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Trademark  -->
    @include('includes.trademark')
    {!! $chart->script() !!}
</div>