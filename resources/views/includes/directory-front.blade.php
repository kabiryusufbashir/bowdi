<div id="directory" class="hidden">
    <div id="directory-content">
        <div id="directory-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>New Directory</span>
            <span id="closeModalDirectory" class="cursor-pointer">X</span>
        </div>
        <div id="directory-body" class="p-4">
            <!-- Add directory  -->
            <div id="addDirectoryForm" class="hidden">
                <form action="{{ route('add-directory') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div class="lg:grid grid-cols-2 gap-4 items-center">
                        <div>
                            <label for="name" class="text-lg font-medium">Directory Name</label><br>
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Directory Name" class="input-field">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>     
                        <div class="text-center">
                            <button class="submit-button">Add Directory</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>