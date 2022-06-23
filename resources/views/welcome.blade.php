<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Borno Women Development Initiative (BOWDI)</title>
    </head>
    <body>
        <div class="sm:w-1/3 sm:mx-auto md:my-24 p-5 bg-white rounded shadow-md">
            <div class="text-lg text-black">
                @include('layouts.messages')
            </div>
            <div class="pb-3">
                <img class="w-1/5 mx-auto" src="{{ asset('images/bowdi.png') }}" alt="BOWDI Logo">
                <h2 class="border-b text-center text-xl mb-4">Borno Women Development Initiative</h2>
            </div>
            <div class="px-6">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="my-2">
                        <input type="text" name="username" placeholder="Username" class="input-field @error('username') border-red-500 @enderror" autofocus>
                        @error('username')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-2">
                        <input type="password" name="password" placeholder="Password" class="input-field @error('password') border-red-500 @enderror">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-2 ml-2">
                        <input class="mr-2" type="checkbox" name="remember">
                        <label for="remember">Remember me</label><br>
                    </div>
                    <div class="text-right mb-4">
                        <span><a href="#" class="hover:text-blue-600 hover:underline">Forgot your Password?</a></span>
                    </div>
                    <div class="text-center">
                        <button class="submit-button tracking-wider">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
