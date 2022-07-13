<div id="blog" class="hidden">
    <div id="blog-content">
        <div id="blog-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>New Blog</span>
            <span id="closeModalBlog" class="cursor-pointer">X</span>
        </div>
        <div id="blog-body" class="p-4">
            <!-- Add blog  -->
            <div id="addBlogForm" class="hidden">
                <form action="{{ route('add-blog') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input style="display:none;" type="text" name="author" value="{{ auth()->user()->id }}">
                        <input type="text" name="title" value="{{old('title')}}" placeholder="Blog Title" class="input-field @error('title') border-red-500 @enderror">
                        @error('title')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <input type="file" name="photo" value="{{old('photo')}}" class="input-field border-0 @error('photo') border-red-500 @enderror">
                        @error('photo')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <textarea id="content" name="content" class="ckeditor px-5 w-full border h-24 rounded-lg my-2 text-lg focus:outline-none @error('content') border-red-500 @enderror" placeholder="Description"></textarea>
                        @error('content')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <select name="status" value="{{old('status')}}" class="input-field @error('status') border-red-500 @enderror">
                            <option value="">Select Blog Status</option>
                            <option value="Publish">Publish</option>
                            <option value="Save as Draft">Save as Draft</option>
                        </select>
                        @error('status')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="submit-button">Add Blog</button>
                    </div>

                </form>
            </div>
        </div>
    </div> 
</div>

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