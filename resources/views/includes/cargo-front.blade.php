<div id="cargo" class="hidden">
    <div id="cargo-content">
        <div id="cargo-header" class="bg-red-800 text-white p-4 flex justify-between">
            <span>New Cargo</span>
            <span id="closeModalCargo" class="cursor-pointer">X</span>
        </div>
        <div id="cargo-body" class="p-4">
            <!-- Add Cargo  -->
            <div id="addCargoForm" class="hidden">
                <form action="{{ route('add-cargo') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="name" class="text-lg font-medium">Cargo Type</label><br>
                        <select type="text" name="cargo_type" class="input-field">
                            <option value=""></option>
                            <option value="Air Freight">Air Freight</option>
                            <option value="Sea Freight">Sea Freight</option>
                        </select>
                        @error('cargo_type')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="cust_name" class="text-lg font-medium">Customer Name</label><br>
                            <input type="text" name="cust_name" value="{{old('cust_name')}}" placeholder="Customer Name" class="input-field">
                            @error('cust_name')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="cust_phone" class="text-lg font-medium">Customer Phone</label><br>
                            <input type="text" name="cust_phone" value="{{old('cust_phone')}}" placeholder="Customer Phone" class="input-field">
                            @error('cust_phone')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="good_type" class="text-lg font-medium">Good Type</label><br>
                            <input type="text" name="good_type" value="{{old('good_type')}}" placeholder="Good Type" class="input-field">
                            @error('good_type')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="quantity" class="text-lg font-medium">Quantity</label><br>
                            <input type="text" name="quantity" value="{{old('quantity')}}" placeholder="Quantity" class="input-field">
                            @error('quantity')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="weight" class="text-lg font-medium">Weight</label><br>
                            <input type="text" name="weight" value="{{old('weight')}}" placeholder="Weight" class="input-field">
                            @error('weight')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="rate" class="text-lg font-medium">Rate</label><br>
                            <input type="text" name="rate" value="{{old('rate')}}" placeholder="Rate" class="input-field">
                            @error('rate')
                                {{$message}}
                            @enderror
                        </div>    
                    </div>
                    <div>
                        <label for="ship_details" class="text-lg font-medium">Cargo Details</label><br>
                        <input type="text" name="ship_details" value="{{old('ship_details')}}" placeholder="Cargo Details" class="input-field">
                        @error('ship_details')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="date" class="text-lg font-medium">Date</label><br>
                        <input required type="date" name="date" value="{{old('date')}}" placeholder="Date" class="input-field">
                        @error('date')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center mt-6">
                        <button class="submit-button">Add Cargo</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>