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
            @if(count($doc) > 0)
                <div class="text-center text-2xl mb-8">
                    Borno Women Development Initiative (BOWDI) <br> <b>Select Category</b>
                </div>
                <div class="my-2 p-3">
                    <div class="lg:grid grid-cols-4 gap-4">
                        @foreach($directory as $folder)
                            <a href="{{ route('doc-show', $folder->id) }}">
                                <div class="p-3 shadow text-center">
                                    <div>
                                        <i style="font-size:750%;" class="text-green-600 fas fa-folder"></i>
                                    </div>
                                    <div class="font-bold">
                                        {{ $folder->name }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center text-2xl">
                    No Document Found
                </div>
            @endif
        </div>
        <div>
            {{ $doc->links() }}
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection