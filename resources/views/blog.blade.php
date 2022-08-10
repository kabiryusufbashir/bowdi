@extends('layouts.front')

@section('title')
    Home | Borno Women Development Initiative (BOWDI)
@endsection

@section('page-meta')
    <meta name="description" content="To promote social justice for girls/women, to produce a poverty free environment by providing access to education for Girls and empowering Women, to mitigate and prevent Sexual and Gender Based Violence">
    <meta name="keywords" content="Maiduguri, Help, BOWDI, NGO, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('body-content')
    <!-- Blog -->
    @if($blogs->count())
    <div class="mt-2 py-16 lg:px-24 px-8">
        <div class="text-center mx-auto">
            <h1 class="text-3xl font-bold mb-4">Blog Posts</h1>
        </div>
        <div class="lg:grid grid-cols-3 gap-4">
            @foreach($blogs as $blog)
                <a href="{{ route('blog.read', $blog->id) }}">
                    <div class="p-10 m-4 border">
                        <img class="h-42 my-4 mx-auto border" src="{{ $blog->photo }}" alt="{{ $blog->title }}">
                        <div>
                            {{ date('M d, Y', strtotime($blog->created_at)) }}
                        </div>
                        <h3 class="text-3xl font-medium">{{ Str::limit($blog->title, 30, '...') }}</h3>
                        <p class="paragraph">
                            {!! html_entity_decode(Str::limit($blog->content, 150, '...')) !!}<br>
                            <div class="text-2xl font-medium">
                                Read More...
                            </div>
                            <div class="flex my-4 items-center justify-between">
                                <span>
                                    <img class="w-10 h-10" src="{{ \App\Models\Staff::where(['id' => $blog->user_id])->first()->photo ?? asset('/images/bowdi.png') }}" alt="{{ \App\Models\Staff::where(['id' => $blog->user_id])->first()->name }}"> 
                                </span>
                                
                                <span>{{ \App\Models\Staff::where(['id' => $blog->user_id])->first()->name ?? 'Admin' }}</span>
                            </div>
                            <span>Read: {{ $blog->views }}</span>
                        </p>
                    </div>
                </a>   
            @endforeach
        </div>
        <div class="flex justify-center mt-4">
            {{ $blogs->links() }}
        </div>
    </div>
    @endif
@endsection

