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
            <form action="{{ route('leave-update', $leave->id) }}" method="POST" class="px-6 lg:px-8 py-8">
                @csrf
                @method('PATCH')
                <div>
                    <label for="request_date" class="text-lg font-medium">Request Date</label><br>
                    <input type="date" name="request_date" value="{{$leave->request_date}}" placeholder="Request Date" class="input-field">
                    @error('request_date')
                        {{$message}}
                    @enderror
                </div>
                <div class="lg:grid grid-cols-2 gap-4">
                    <div>
                        <label for="no_of_days" class="text-lg font-medium">Number of Leave Days Requested (Inclusive of Travel Days)</label><br>
                        <input type="text" name="no_of_days" value="{{$leave->no_of_days}}" placeholder="No of Days" class="input-field">
                        @error('no_of_days')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="date_of_leave" class="text-lg font-medium">Date of Leave</label><br>
                        <input type="date" name="date_of_leave" value="{{$leave->date_of_leave}}" placeholder="leave Date" class="input-field">
                        @error('date_of_leave')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="nature_of_leave" class="text-lg font-medium">Nature of Leave Requested <br><i class="font-normal">(state type of leave being taken, i.e., annual leave, bereavement, leave without pay)</i></label><br>
                    <input type="text" name="nature_of_leave" value="{{$leave->nature_of_leave}}" placeholder="Nature of Leave Requested" class="input-field">
                    @error('nature_of_leave')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center">
                    <button class="submit-button">Edit Leave Request</button>
                </div>
            </form>
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection