<div id="doc" class="hidden">
    <div id="doc-content">
        <div id="doc-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>New Document</span>
            <span id="closeModalDoc" class="cursor-pointer">X</span>
        </div>
        <div id="doc-body" class="p-4">
            <!-- Add Document  -->
            <div id="addDocForm" class="hidden">
                <form action="{{ route('add-doc') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="text-lg font-medium">Name</label><br>
                        <input type="text" name="name" value="{{old('name')}}" placeholder="Document Name" class="input-field">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="text-lg font-medium">Description</label><br>
                        <input type="text" name="description" value="{{old('description')}}" placeholder="Document Name" class="input-field">
                        @error('description')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="path" class="text-lg font-medium">Upload Document</label><br>
                        <input type="file" name="path" value="{{old('path')}}" placeholder="Upload Document" class="input-field">
                        @error('path')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="date" class="text-lg font-medium">Date</label><br>
                        <input type="date" name="date" value="{{old('date')}}" placeholder="Document Date" class="input-field">
                        @error('date')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="submit-button">Add Document</button>
                    </div>

                </form>
            </div>
        </div>
    </div> 
</div>