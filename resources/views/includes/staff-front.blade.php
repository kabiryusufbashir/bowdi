<div id="staff" class="hidden">
    <div id="staff-content">
        <div id="staff-header" class="bg-red-800 text-white p-4 flex justify-between">
            <span>New Staff</span>
            <span id="closeModalStaff" class="cursor-pointer">X</span>
        </div>
        <div id="staff-body" class="p-4">
            <!-- Add record  -->
            <div id="addStaffForm" class="hidden">
                <form action="{{route('add-staff')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="name" class="text-lg font-medium">Staff Name</label><br>
                        <input type="text" name="name" value="{{old('name')}}" placeholder="Staff Name" class="input-field">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="email" class="text-lg font-medium">Staff Email</label><br>
                            <input type="email" name="email" value="{{old('email')}}" placeholder="Staff Email" class="input-field">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="text-lg font-medium">Staff Username</label><br>
                            <input type="text" name="username" value="{{old('username')}}" placeholder="Staff Username" class="input-field">
                            @error('username')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="type" class="text-lg font-medium">Account Type</label><br>
                            <select required name="type" value="{{old('type')}}" class="input-field">
                                <option value=""></option>
                                <option value="1">Super User</option>
                                <option value="2">Normal User</option>
                            </select>
                            @error('type')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="text-lg font-medium">Staff Password</label><br>
                            <input type="password" name="password" value="{{old('password')}}" placeholder="Staff Password" class="input-field">
                            @error('password')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Add Staff</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>