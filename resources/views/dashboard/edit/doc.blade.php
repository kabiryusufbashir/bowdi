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
            <form action="{{ route('doc-update', $doc->id) }}" method="POST" class="px-6 lg:px-8 py-8">
                @csrf
                @method('PATCH')
                <div>
                    <label for="name" class="text-lg font-medium">Name</label><br>
                    <input type="text" name="name" value="{{$doc->name}}" placeholder="Document Name" class="input-field">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <label for="description" class="text-lg font-medium">Description</label><br>
                    <input type="text" name="description" value="{{$doc->description}}" placeholder="Document Description" class="input-field">
                    @error('description')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <label for="path" class="text-lg font-medium">Upload Document</label><br>
                    <input type="file" name="path" placeholder="Upload Document" class="input-field">
                    <input type="hidden" name="old_path" value="{{$doc->path}}" class="input-field">
                    @error('path')
                        {{$message}}
                    @enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="date" class="text-lg font-medium">Date</label><br>
                        <input type="date" name="date" value="{{$doc->date}}" placeholder="Document Date" class="input-field">
                        @error('date')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="category" class="text-lg font-medium">Category</label><br>
                        <select name="category" class="input-field">
                            <option value="{{$doc->category}}">{{ App\Models\Directory::where('id', $doc->category)->pluck('name')->first() }}</option>
                            @foreach($directory as $folder)
                                <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button class="submit-button">Edit Document</button>
                </div>
            </form>
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection