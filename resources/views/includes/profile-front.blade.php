<div id="profile" class="hidden">
    <div id="profile-content">
        <div id="profile-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>Change Password</span>
            <span id="closeModalProfile" class="cursor-pointer">X</span>
        </div>
        <div id="profile-body" class="p-4">
            <!-- Add record  -->
            <div id="profileForm" class="hidden">
                <form action="{{route('edit-profile')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="old_password" class="text-lg font-medium">Old Password</label><br>
                        <input type="password" name="old_password" value="{{old('old_password')}}" placeholder="Old Password" class="input-field">
                        @error('old_password')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="text-lg font-medium">New Password</label><br>
                        <input type="password" name="password" value="{{old('password')}}" placeholder="New Password" class="input-field">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>