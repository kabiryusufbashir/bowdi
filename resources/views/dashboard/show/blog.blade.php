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
            <div class="flex">
                <a href="{{ route('blog') }}">
                    <button class="create-btn">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                        All Blog
                    </button>
                </a>
            </div>
            @if($blog->count())
                <div class="shadow-lg p-4 lg:w-3/4 lg:mx-auto">
                    <div class="my-6 mx-3 text-3xl font-medium">
                        {{ $blog->title }} <br>
                        <span class="font-normal text-sm">By {{ \App\Models\User::where(['id' => $blog->user_id])->first()->name }}</span>
                    </div>
                    <div class="my-6 mx-3 text-3xl font-medium">
                        <img class="w-full md:w-full mx-auto" src=" {{ $blog->photo }}" alt=" {{ $blog->name }} logo">
                    </div>
                    <div class="md:my-auto text-lg">
                        {!! html_entity_decode($blog->content) !!} <br>
                    </div>
                    <div>
                        {{ $blog->created_at->diffForhumans() }}
                    </div>
                </div>
            @else
                <div class="bg-white text-2xl text-center py-2">
                    No Blog Found
                </div>
            @endif
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection