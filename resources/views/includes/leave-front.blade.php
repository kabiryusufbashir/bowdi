<div id="leave" class="hidden">
    <div id="leave-content">
        <div id="leave-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>New Leave Request</span>
            <span id="closeModalLeave" class="cursor-pointer">X</span>
        </div>
        <div id="leave-body" class="p-4">
            <!-- Add leave  -->
            <div id="addleaveForm" class="hidden">
                <form action="{{ route('add-leave') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="request_date" class="text-lg font-medium">Request Date</label><br>
                        <input type="date" name="request_date" value="{{old('request_date')}}" placeholder="Request Date" class="input-field">
                        @error('request_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="lg:grid grid-cols-2 gap-4">
                        <div>
                            <label for="no_of_days" class="text-lg font-medium">Number of Leave Days Requested (Inclusive of Travel Days)</label><br>
                            <input type="text" name="no_of_days" value="{{old('no_of_days')}}" placeholder="No of Days" class="input-field">
                            @error('no_of_days')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="date_of_leave" class="text-lg font-medium">Date of Leave</label><br>
                            <input type="date" name="date_of_leave" value="{{old('date_of_leave')}}" placeholder="leave Date" class="input-field">
                            @error('date_of_leave')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="nature_of_leave" class="text-lg font-medium">Nature of Leave Requested <br><i class="font-normal">(state type of leave being taken, i.e., annual leave, bereavement, leave without pay)</i></label><br>
                        <input type="text" name="nature_of_leave" value="{{old('nature_of_leave')}}" placeholder="Nature of Leave Requested" class="input-field">
                        @error('nature_of_leave')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="submit-button">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>