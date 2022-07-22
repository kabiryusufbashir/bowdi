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
            <form action="{{ route('blog-update', $blog->id) }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex">
                    <a href="{{ route('blog') }}">
                        <button class="create-btn">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                            All Blog
                        </button>
                    </a>
                </div>
                <div>
                    <img class="w-64 p-2 mx-auto" src=" {{ $blog->photo }} " alt="{{ $blog->title }} Image">    
                </div>
                <div id="changePhoto" class="my-2 cursor-pointer text-xl underline text-blue-600">Change Photo</div>
                <div id="changePhotoField" class="my-2 hidden">
                    <input type="file" name="photo" value="{{old('photo')}}" class="input-field border-0 @error('photo') border-red-500 @enderror">
                    @error('photo')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input type="text" value="{{ $blog->title }}" name="title" value="{{old('title')}}" placeholder="Blog Title" class="input-field @error('title') border-red-500 @enderror">
                    @error('title')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <textarea id="content" name="content" class="ckeditor px-5 w-full border h-24 rounded-lg my-2 text-lg focus:outline-none @error('content') border-red-500 @enderror">{{ $blog->content }}</textarea>
                    @error('content')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <span class="input-title">Status</span>
                    <select name="status" class="input-field">
                        <option value="{{ $blog->status }}">{{ $blog->status }}</option>
                        @if($blog->status === 'Publish')
                            <option value="Save as Draft">Save as Draft</option>
                        @else
                            <option value="Publish">Publish</option>
                        @endif
                    </select>
                    @error('status')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center">
                    <button class="submit-button">Edit Blog</button>
                </div>
            </form>
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection

<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    
<script type="text/javascript">
    const viewFile = document.querySelector('.ckeditor');
        window.onload = function(){
            viewFile.ckeditor();
        }
</script>

<script type="text/javascript">
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script src="text/javascript">
    
//Change Blog Photo
const changePhoto = document.querySelector("#changePhoto");
const changePhotoField = document.querySelector("#changePhotoField");

changePhoto.addEventListener('click', ()=>{
    if(changePhotoField.classList.contains('hidden')){
        changePhotoField.classList.remove('hidden');
    }else{
        changePhotoField.classList.add('hidden');
    }
});
//End of Blog
</script>