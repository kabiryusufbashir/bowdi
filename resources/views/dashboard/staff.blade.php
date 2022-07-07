@extends('layouts.dashboard')

@section('container')
    <!-- Nav  -->
    @include('layouts.template')
    <!-- Menu  -->
    <div class="col-span-10">
        <div id="menu" class="p-6">
        <!-- Notification -->
        @include('includes.notification')
        <!-- Message  -->
        <div class="py-1 mb-8 text-center">
            @include('layouts.messages')
        </div>
        <!-- Section  -->
        <div id="homeBar" class="">
            @if(count($staff) > 0)
                <div class="text-center text-2xl border-b border-green-600">
                    Borno Women Development Initiative (BOWDI) <br> Staff
                </div>
                <div class="my-2 p-3">
                    <div class="lg:grid grid-cols-4 gap-4">
                        @foreach($staff as $worker)
                            <div class="p-3 shadow text-center">
                                <div>
                                    <img class="mx-auto" style="width:200px; 200px;" src="{{ ($worker->photo != null) ? asset('images/staff/'.$worker->photo) : asset('images/bowdi.png')  }}" alt="{{ $worker->name }}">
                                </div>
                                <div class="font-normal">
                                    {{ $worker->name }}
                                </div>
                                <div class="font-bold">
                                    {{ App\Models\Rank::where('id', $worker->rank_id)->pluck('name')->first() }}
                                </div>
                                <div>
                                    {{ App\Models\Department::where('id', $worker->department_id)->pluck('name')->first() }}
                                </div>
                                <div class="flex justify-center">
                                    @if(Auth::user()->type == 1)
                                        <!-- Action  -->
                                        <form action="{{ route('staff-edit', $worker->id) }}">
                                            @csrf 
                                            <button class="relative top-2">
                                                <span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg></span>
                                            </button>
                                        </form>
                                        &nbsp;&nbsp;
                                        <form action="{{ route('staff-delete', $worker->id) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="relative top-2">
                                                <span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></span>
                                            </button>
                                        </form>
                                        &nbsp;&nbsp;
                                        <form action="{{ route('staff-reset-password', $worker->id) }}" method="POST">
                                            @csrf 
                                            <button class="relative top-2">
                                                <svg class="w-6 h-6" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M288 416v-96a128 128 0 0 1 256 0v96h64v-96c0-106-86-192-192-192s-192 86-192 192v96zM512 704h-64v-64l384-384 64 64-384 384z"  /><path d="M544 736H416V608l160-160H192a64.19 64.19 0 0 0-64 64v320a64.19 64.19 0 0 0 64 64h448a64.19 64.19 0 0 0 64-64V576z"  /></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center text-2xl">
                    No Staff Found
                </div>
            @endif
        </div>
        <div>
            {{ $staff->links() }}
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection