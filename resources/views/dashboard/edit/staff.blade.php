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
        <div class="md:w-1/2 w-full mx-auto shadow-lg">
            <form action="{{ route('staff-update', $staff->id) }}" method="POST" class="px-6 lg:px-8 py-8">
                @csrf
                @method('PATCH')
                <div>
                    <label for="name" class="text-lg font-medium">Staff Name</label><br>
                    <input type="text" name="name" value="{{ $staff->name }}" placeholder="Staff Name" class="input-field">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="text-lg font-medium">Staff Email</label><br>
                        <input type="email" name="email" value="{{ $staff->email }}" placeholder="Staff Email" class="input-field">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="username" class="text-lg font-medium">Staff Username</label><br>
                        <input type="text" name="username" value="{{ $staff->username }}" placeholder="Staff Username" class="input-field">
                        @error('username')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="details" class="text-lg font-medium">Account Type</label><br>
                    <select required name="type" class="input-field">
                        @if($staff->type == 1)
                            <option value="1">Super User</option>
                            <option value="2">Normal User</option>
                        @else
                            <option value="2">Normal User</option>
                            <option value="1">Super User</option>
                        @endif
                    </select>
                    @error('type')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="submit-button">Edit Staff</button>
                </div>
            </form>
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection