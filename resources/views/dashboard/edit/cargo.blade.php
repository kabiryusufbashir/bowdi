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
        <div class="md:w-1/2 w-full mx-auto shadow-lg">
            <form action="{{ route('cargo-update', $cargo->id) }}" method="POST" class="px-6 lg:px-8 py-8">
                @csrf
                @method('PATCH')
                <div>
                        <label for="name" class="text-lg font-medium">Cargo Type</label><br>
                        <select type="text" name="cargo_type" class="input-field">
                            @if($cargo->cargo_type == 'Air Freight')
                                <option value="{{ $cargo->cargo_type }}">{{ $cargo->cargo_type }}</option>
                                <option value="Sea Freight">Sea Freight</option>
                                @else 
                                <option value="Sea Freight">Sea Freight</option>
                                <option value="Air Freight">Air Freight</option>
                            @endif    
                        </select>
                        @error('cargo_type')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="cust_name" class="text-lg font-medium">Customer Name</label><br>
                            <input type="text" name="cust_name" value="{{$cargo->cust_name}}" placeholder="Customer Name" class="input-field">
                            @error('cust_name')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="cust_phone" class="text-lg font-medium">Customer Phone</label><br>
                            <input type="text" name="cust_phone" value="{{$cargo->cust_phone}}" placeholder="Customer Phone" class="input-field">
                            @error('cust_phone')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="good_type" class="text-lg font-medium">Good Type</label><br>
                            <input type="text" name="good_type" value="{{$cargo->good_type}}" placeholder="Good Type" class="input-field">
                            @error('good_type')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="quantity" class="text-lg font-medium">Quantity</label><br>
                            <input type="text" name="quantity" value="{{$cargo->quantity}}" placeholder="Quantity" class="input-field">
                            @error('quantity')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="weight" class="text-lg font-medium">Weight</label><br>
                            <input type="text" name="weight" value="{{$cargo->weight}}" placeholder="Weight" class="input-field">
                            @error('weight')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="rate" class="text-lg font-medium">Rate</label><br>
                            <input type="text" name="rate" value="{{$cargo->rate}}" placeholder="Rate" class="input-field">
                            @error('rate')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>
                    <div>
                        <label for="ship_details" class="text-lg font-medium">Cargo Details</label><br>
                        <input type="text" name="ship_details" value="{{$cargo->ship_details}}" placeholder="Cargo Details" class="input-field">
                        @error('ship_details')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="date" class="text-lg font-medium">Date</label><br>
                        <input required type="date" name="date" value="{{ $cargo->date }}" class="input-field">
                        @error('date')
                            {{$message}}
                        @enderror
                    </div>
                <div class="text-center mt-6">
                    <button class="submit-button">Edit Cargo</button>
                </div>
            </form>
        </div>
        <!-- Trademark  -->
        @include('includes.trademark')
    </div>
@endsection