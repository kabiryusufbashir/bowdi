<div id="dept" class="hidden">
    <div id="dept-content">
        <div id="dept-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>New Department</span>
            <span id="closeModalDept" class="cursor-pointer">X</span>
        </div>
        <div id="dept-body" class="p-4">
            <!-- Add dept  -->
            <div id="addDeptForm" class="hidden">
                <form action="{{ route('add-dept') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div class="lg:grid grid-cols-2 gap-4 items-center">
                        <div>
                            <label for="name" class="text-lg font-medium">Department Name</label><br>
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Department Name" class="input-field">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>     
                        <div class="text-center">
                            <button class="submit-button">Add Department</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>