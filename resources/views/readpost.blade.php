@extends('layouts.front')

@section('title')
    {{ $blog->title }} | Borno Women Development Initiative (BOWDI)
@endsection

@section('page-meta')
    <meta name="description" content="{!!  html_entity_decode($blog->content) !!}">
    <meta name="keywords" content="Maiduguri, Help, BOWDI, NGO, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('body-content')
    <div class="px-8 py-24 lg:w-1/2 w-full mx-auto">
        <div class="text-3xl mb-8">
            <span class="font-bold border-green-600">{{ $blog->title }}</span>
        </div>
        <div>
            <img class="mx-auto w-full mb-6" src="{{ $blog->photo }}" alt="{{ $blog->title }}">
        </div>
        <div class="flex justify-between border-b mb-5 py-5">
            <div>
                {{ $blog->created_at->diffForhumans() }}
            </div>
            <div>
            {!! $sharepost !!}
            </div>
        </div>
        <div class="lg:px-4 text-justify">
            {!!  html_entity_decode($blog->content) !!}
        </div>
        <div class="my-6">
            <div class="flex my-4 items-center justify-between">
                <div class="flex items-center">
                    <img class="w-10 h-10" src="{{ \App\Models\Staff::where(['id' => $blog->user_id])->first()->photo ?? asset('/images/bowdi.png') }}" alt="{{ \App\Models\Staff::where(['id' => $blog->user_id])->first()->name }}"> 
                    &nbsp;&nbsp;
                    <span>{{ \App\Models\Staff::where(['id' => $blog->user_id])->first()->name ?? 'Admin' }}</span>
                </div>
            </div>
            <span>View: {{ $blog->views }}</span>
        </div>
        <div class="w-full my-5 flex justify-end">
            <a href="{{ url()->previous() }}">
                <button class="bg-green-600 text-white px-5 py-2 rounded-full">
                    Back
                </button>
            </a>
        </div>
    </div>
@endsection

