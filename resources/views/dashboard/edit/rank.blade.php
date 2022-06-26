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
        <div class="lg:w-2/3 w-full mx-auto shadow-lg">
            <form action="{{ route('rank-update', $rank->id) }}" method="POST" class="px-6 lg:px-8 py-8">
                @csrf
                @method('PATCH')
                    <div class="lg:grid grid-cols-2 gap-4 items-center">
                        <div>
                            <label for="name" class="text-lg font-medium">Rank Name</label><br>
                            <input type="text" name="name" value="{{$rank->name}}" placeholder="Rank Name" class="input-field">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="submit-button">Edit Rank</button>
                        </div>    
                    </div>
            </form>
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection