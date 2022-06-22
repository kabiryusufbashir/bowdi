<div id="menu" class="p-6">
    <!-- Notification -->
    @include('includes.notification')
    <!-- Message  -->
    <div class="py-1 mb-8 text-center">
        @include('layouts.messages')
    </div>
    <!-- Section  -->
    <div id="homeBar" class="">
        <!-- Statistics  -->
        <div class="my-auto flex justify-between">
            <div class="stats-div w-full mx-4">
                <a href="{{ route('cargo') }}" class="flex items-center">
                    <span><i class="fas fa-file-invoice"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Cargos: {{ $cargo->count() }}</span>
                </a>
            </div>
            <div class="stats-div w-full mx-4">
                <a href="{{ route('payment') }}" class="flex items-center">
                    <span><i class="fas fa-book"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Transactions: ${{ $cargo->sum('amount') }}</span>
                </a>
            </div>
            <div class="stats-div w-full mx-4">
                <a href="{{ route('dashboard-staff') }}" class="flex items-center">
                    <span><i class="fas fa-user-circle"></i></span> &nbsp;&nbsp;
                    <span class="text-white">Staff: {{ $staff->count() }}</span>
                </a>
            </div>
        </div>
        <!-- Bar Chart  -->
        <div class="shadow-lg">
            {!! $chart->container() !!}
        </div>
    </div>
    <!-- Trademark  -->
    @include('includes.trademark')
    {!! $chart->script() !!}
</div>