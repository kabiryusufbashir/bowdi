@extends('layouts.front')

@section('title')
    Home | Borno Women Development Initiative (BOWDI)
@endsection

@section('page-meta')
    <meta name="description" content="To promote social justice for girls/women, to produce a poverty free environment by providing access to education for Girls and empowering Women, to mitigate and prevent Sexual and Gender Based Violence">
    <meta name="keywords" content="Maiduguri, Help, BOWDI, NGO, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('body-content')
    <!-- Slider Images  -->
    <div class="lg:grid grid-cols-2 gap-4 my-10 lg:px-24 px-8">
        <div class="my-auto">
            <img src="{{ asset('images/bg-2.jpg') }}" alt="Peer to Peer">
        </div>
        <div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <img class="rounded" src="{{ asset('images/bg-1.jpg') }}" alt="Peer to Peer">
                </div>
                <div>
                    <img class="rounded" src="{{ asset('images/bg-3.jpg') }}" alt="Peer to Peer">
                </div>
                <div>
                    <img class="rounded" src="{{ asset('images/bg-4.jpg') }}" alt="Peer to Peer">
                </div>
                <div>
                    <img class="rounded" src="{{ asset('images/bg-5.jpg') }}" alt="Peer to Peer">
                </div>
            </div>
        </div>
    </div>

    <!-- Our Mission  -->
    <div class="mt-10 py-16 bg-gray-50">
        <div class="text-center mx-auto lg:px-24 px-8">
            <h1 class="text-3xl font-bold mb-4">Our Mission</h1>
            <p class="lg:w-1/3 w-full mx-auto">
                "To promote social justice for girls/women, to produce a poverty free environment by providing access to education for Girls and empowering Women, to mitigate and prevent Sexual and Gender Based Violence"
            </p>
        </div>
        <div class="lg:grid grid-cols-3 gap-4 mt-10">
            <div class="text-center lg:px-24 px-8">
                <div class="mb-2">
                    <i class="fa-solid fa-utensils text-6xl text-green-600"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold mb-4">Food Security and Nutrition</h1>
                </div>
                <div>
                    <p>
                        A WFP supported programme designed to treat and prevent the direct causes of malnutrition, like inadequate diets, complementing programmes that address the underlying factors, such as poor knowledge of feeding practices or lack of clean water, concentrating more efforts on the most vulnerable, targeting young children, pregnant women, breastfeeding mothers in Konduga Community both in IDP Camp and Host Community
                    </p>
                </div>
            </div>
            <div class="text-center lg:px-24 px-8">
                <div class="mb-2">
                    <i class="fa-solid fa-key text-6xl text-green-600"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold mb-4">Protection</h1>
                </div>
                <div>
                    <p>
                        To achieve food and nutrition security for all people without distinction, food assistance policies and programmes must create conditions that advance, rather than undermine, gender equality and women’s empowerment. Women's empowerment is a key means of achieving gender equality. It involves women having the same capacity as men to determine and shape their own lives and contribute in shaping the lives of their families, communities and societies
                    </p>
                </div>
            </div>
            <div class="text-center lg:px-24 px-8">
                <div class="mb-2">
                    <i class="fa-solid fa-heart text-6xl text-green-600"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold mb-4">Women Peace and Security</h1>
                </div>
                <div>
                    <p>
                        In BOWDI's effort to promote women engagement in Peace and Security, BOWDI initiated strategy to raise the capacities of Women Leaders working around Women Peace and Security(WPS) in Borno and Yobe ensuring that women have opportunities for involvement in development and reconstruction projects
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured stories -->
    @if($blogs->count())
    <div class="mt-10 py-16 lg:px-24 px-8">
        <div class="text-center mx-auto">
            <h1 class="text-3xl font-bold mb-4">Featured Stories</h1>
        </div>
        @foreach($blogs as $blog)
            <div class="lg:grid grid-cols-3 gap-4">
                <a href="{{ route('blog.read', $blog->title) }}">
                    <div class="p-10 m-4 border">
                        <img class="h-42 my-4 mx-auto border" src="{{ $blog->photo }}" alt="{{ $blog->title }}">
                        <div>
                            {{ date('M d, Y', strtotime($blog->created_at)) }}
                        </div>
                        <h3 class="text-3xl font-medium">{{ $blog->title }}</h3>
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
            </div>
        @endforeach
    </div>
    @endif
@endsection

