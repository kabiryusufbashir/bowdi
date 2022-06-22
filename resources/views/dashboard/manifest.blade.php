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
        <div>
            <form action="{{ route('view-manifest') }}" method="POST" class="md:w-1/2 w-full mx-auto px-6 lg:px-8 py-8 shadow-md">
                @csrf
                <div class="text-center text-xl font-medium my-2 py-2 border-b">
                    Weekly Manifest
                </div>
                <div>
                    <label for="month" class="text-lg font-medium">Month</label><br>
                    <select required type="text" name="month" value="{{old('month')}}" placeholder="Month" class="input-field">
                        <option value=""></option>
                        @foreach($months as $month)
                            <option value="{{ $month->month }}">{{ date('F', mktime(null, null, null, $month->month, 1)) }}</option>
                        @endforeach
                    </select>
                    @error('month')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <label for="year" class="text-lg font-medium">Year</label><br>
                    <select required type="text" name="year" value="{{old('year')}}" placeholder="Year" class="input-field">
                        <option value=""></option>
                        @foreach($years as $year)
                            <option value="{{ $year->year }}">{{ $year->year }}</option>
                        @endforeach
                    </select>
                    @error('year')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="submit-button">View Manifest</button>
                </div>
            </form>
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection