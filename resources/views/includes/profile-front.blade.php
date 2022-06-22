<div id="profile" class="hidden">
    <div id="profile-content">
        <div id="profile-header" class="bg-red-800 text-white p-4 flex justify-between">
            <span>Profile</span>
            <span id="closeModalProfile" class="cursor-pointer">X</span>
        </div>
        <div id="profile-body" class="p-4">
            <!-- Add record  -->
            <div id="profileForm" class="hidden">
                <form action="{{route('edit-profile')}}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="name" class="text-lg font-medium">Name</label><br>
                        <input disabled="disabled" type="text" name="name" value="{{ Auth::guard('web')->user()->name }}" class="input-field">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="grid grid-2 gap-4">
                        <div>
                            <label for="email" class="text-lg font-medium">Email</label><br>
                            <input disabled="disabled" type="email" name="email" value="{{ Auth::guard('web')->user()->email }}" class="input-field">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="text-lg font-medium">Username</label><br>
                            <input disabled="disabled" type="text" name="username" value="{{ Auth::guard('web')->user()->username }}" class="input-field">
                            @error('username')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
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
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Edit Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>