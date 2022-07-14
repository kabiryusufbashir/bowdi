<div id="staff" class="hidden">
    <div id="staff-content">
        <div id="staff-header" class="bg-green-800 text-white p-4 flex justify-between">
            <span>New Staff</span>
            <span id="closeModalStaff" class="cursor-pointer">X</span>
        </div>
        <div id="staff-body" class="p-4">
            <!-- Add record  -->
            <div id="addStaffForm" class="hidden">
                <form action="{{route('add-staff')}}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                    @csrf
                    <!-- Employees Details -->
                    <div id="employeeDetails" class="block">
                        <h1 class="font-bold mb-2">Employees Details</h1>
                        <div class="lg:grid grid-cols-4 gap-4">
                            <div>
                                <input type="text" name="title" value="{{old('title')}}" placeholder="Title" class="input-field">
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <div>
                                    <input type="text" name="e_code" value="{{old('e_code')}}" placeholder="E Code" class="input-field">
                                    @error('e_code')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="other_name" value="{{old('other_name')}}" placeholder="Other Name" class="input-field">
                                    @error('other_name')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="lga" value="{{old('lga')}}" placeholder="LGA" class="input-field">
                                    @error('lga')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="First Name *" class="input-field">
                                    @error('first_name')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div>
                                    <input type="date" name="dob" value="{{old('dob')}}" placeholder="Date of Birth" class="input-field">
                                    @error('dob')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="state" value="{{old('state')}}" placeholder="State" class="input-field">
                                    @error('state')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="Last Name *" class="input-field">
                                    @error('last_name')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="place_of_birth" value="{{old('place_of_birth')}}" placeholder="Place Of Birth" class="input-field">
                                    @error('place_of_birth')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="nationality" value="{{old('nationality')}}" placeholder="Nationality" class="input-field">
                                    @error('nationality')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-4 gap-4">
                            <div>
                                <input type="text" name="marital_status" value="{{old('marital_status')}}" placeholder="Marital Status" class="input-field">
                                @error('marital_status')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="blood_group" value="{{old('blood_group')}}" placeholder="Blood Group" class="input-field">
                                @error('blood_group')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="next_of_kin" value="{{old('next_of_kin')}}" placeholder="Next of Kin" class="input-field">
                                @error('next_of_kin')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="tax_id_no" value="{{old('tax_id_no')}}" placeholder="Tax Identification No" class="input-field">
                                @error('tax_id_no')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-4 gap-4">
                            <div class="col-span-3">
                                <div>
                                    <h1 class="text-sm"><b>FULLY VACCINATED FOR COVID-19</b>(If not vaccinated PCR info required)</h1>
                                </div>
                            </div>
                            <div class="col-span-1 flex justify-between items-center">
                                <span>Yes</span>
                                <input value="yes" type="checkbox" name="vaccinated_yes" id="vaccinated_yes">
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-4 gap-4 items-center">
                            <div class="col-span-3 flex justify-between">
                                <div>
                                    <input type="text" name="vaccination_type" value="{{old('vaccination_type')}}" placeholder="Vaccination Type" class="input-field">
                                    @error('vaccination_type')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="date_of_vaccination" value="{{old('date_of_vaccination')}}" placeholder="Date Of Vaccination" class="input-field">
                                    @error('date_of_vaccination')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-1 flex justify-between items-center">
                                <span>No</span>
                                <input value="no" type="checkbox" name="vaccinated_no" id="vaccinated_no">
                            </div>
                        </div>
                        <div class="text-center my-6 float-right">
                            <div id="nextEmployeeContactDetails" class="cursor-pointer">Contact Details -></div>
                        </div> 
                    </div>
                    <!-- Contact Details  -->
                    <div id="employeeContactDetails" class="hidden">
                        <h1 class="font-bold mb-2">Contact Details</h1>
                        <div>
                            <label for="photo">Staff Photo</label>
                            <input type="file" name="photo" value="{{old('photo')}}" placeholder="Upload Photo" class="input-field">
                            @error('photo')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="residential_address" value="{{old('residential_address')}}" placeholder="Residential Address" class="input-field">
                            @error('residential_address')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="permanent_address" value="{{old('permanent_address')}}" placeholder="Permanent Address" class="input-field">
                            @error('permanent_address')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="lg:grid grid-cols-3 gap-4">
                            <div>
                                <input type="text" name="permanent_city" value="{{old('permanent_city')}}" placeholder="City" class="input-field">
                                @error('permanent_city')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="permanent_state" value="{{old('permanent_state')}}" placeholder="State" class="input-field">
                                @error('permanent_state')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="permanent_country" value="{{old('permanent_country')}}" placeholder="Country" class="input-field">
                                @error('permanent_country')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 gap-4">
                            <div>
                                <input type="email" name="personal_email" value="{{old('personal_email')}}" placeholder="Personal Email *" class="input-field">
                                @error('personal_email')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="mobile_no" value="{{old('mobile_no')}}" placeholder="Mobile No" class="input-field">
                                @error('mobile_no')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-6 flex justify-between items-center">
                            <div id="prevEmployeeDetails" class="cursor-pointer"><- Employee Details</div>
                            <div id="nextEmployeeEmergencyContactDetails" class="cursor-pointer">Emergency Contact Details -></div>
                        </div>
                    </div>
                    <!-- Emergency Contact Details  -->
                    <div id="employeeEmergencyContactDetails" class="hidden">
                        <h1 class="font-bold mb-2">Emergency Contact Details</h1>
                        <div class="lg:grid grid-cols-5 gap-4">
                            <div>
                                <h1>S/N</h1>
                            </div>
                            <div>
                                <h1>Name</h1>
                            </div>
                            <div>
                                <h1>Relationship</h1>
                            </div>
                            <div>
                                <h1>Contact No</h1>
                            </div>
                            <div>
                                <h1>Address</h1>
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-5 gap-4 items-center">
                            <div>
                                <h1>1</h1>
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_name_1" value="{{old('emergency_contact_name_1')}}" placeholder="Name" class="input-field">
                                @error('emergency_contact_name_1')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_relationship_1" value="{{old('emergency_contact_relationship_1')}}" placeholder="Relationship" class="input-field">
                                @error('emergency_contact_relationship_1')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_no_1" value="{{old('emergency_contact_no_1')}}" placeholder="Contact No" class="input-field">
                                @error('emergency_contact_no_1')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_address_1" value="{{old('emergency_contact_address_1')}}" placeholder="Address" class="input-field">
                                @error('emergency_contact_address_1')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-5 gap-4 items-center">
                            <div>
                                <h1>2</h1>
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_name_2" value="{{old('emergency_contact_name_2')}}" placeholder="Name" class="input-field">
                                @error('emergency_contact_name_2')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_relationship_2" value="{{old('emergency_contact_relationship_2')}}" placeholder="Relationship" class="input-field">
                                @error('emergency_contact_relationship_2')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_no_2" value="{{old('emergency_contact_no_2')}}" placeholder="Contact No" class="input-field">
                                @error('emergency_contact_no_2')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_address_2" value="{{old('emergency_contact_address_2')}}" placeholder="Address" class="input-field">
                                @error('emergency_contact_address_2')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-5 gap-4 items-center">
                            <div>
                                <h1>3</h1>
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_name_3" value="{{old('emergency_contact_name_3')}}" placeholder="Name" class="input-field">
                                @error('emergency_contact_name_3')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_relationship_3" value="{{old('emergency_contact_relationship_3')}}" placeholder="Relationship" class="input-field">
                                @error('emergency_contact_relationship_3')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_no_3" value="{{old('emergency_contact_no_3')}}" placeholder="Contact No" class="input-field">
                                @error('emergency_contact_no_3')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="emergency_contact_address_3" value="{{old('emergency_contact_address_3')}}" placeholder="Address" class="input-field">
                                @error('emergency_contact_address_3')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-6 flex justify-between items-center">
                            <div id="prevContactDetails" class="cursor-pointer"><- Contact Details</div>
                            <div id="nextEmployeeBanksDetails" class="cursor-pointer">Bank Details -></div>
                        </div>
                    </div> 
                    <!-- Bank Details -->
                    <div id="employeeBankDetails" class="hidden">
                        <h1 class="font-bold mb-2">Bank Details</h1>
                        <div class="lg:grid grid-cols-2 gap-4">
                            <div>
                                <input type="text" name="account_name" value="{{old('account_name')}}" placeholder="Account Name" class="input-field">
                                @error('account_name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="account_no" value="{{old('account_no')}}" placeholder="Account Number" class="input-field">
                                @error('account_no')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="lg:grid grid-cols-2 gap-4">
                            <div>
                                <input type="text" name="bank_name" value="{{old('bank_name')}}" placeholder="Bank Name" class="input-field">
                                @error('bank_name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="bank_branch" value="{{old('bank_branch')}}" placeholder="Bank Branch" class="input-field">
                                @error('bank_branch')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-6 flex justify-between items-center">
                            <div id="prevEmergencyContactDetails" class="cursor-pointer"><- Emergency Contact Details</div>
                            <div id="nextOfficialDetails" class="cursor-pointer">Official Details -></div>
                        </div>
                    </div>
                    <!-- Offical Details  -->
                    <div id="officialDetails" class="hidden">
                        <h1 class="font-bold mb-2">Offical Details</h1>
                        <div>
                            <select name="rank_id" class="input-field">
                                <option value="">Select Rank</option>
                                @foreach($rank as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                            @error('rank_id')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <select name="department_id" class="input-field">
                                <option value="">Select Department</option>
                                @foreach($department as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <select name="supervisor_id" class="input-field">
                                <option value="">Select Supervisor</option>
                                @foreach($supervisor as $worker)
                                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                @endforeach
                            </select>
                            @error('supervisor_id')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="state_of_primary_assignment" value="{{old('state_of_primary_assignment')}}" placeholder="State of Primary Assignment" class="input-field">
                            @error('state_of_primary_assignment')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="text-center mt-4">
                            <button class="submit-button">Add Staff</button>
                        </div>
                        <div class="text-center mt-6 flex justify-between items-center">
                            <div id="prevBankDetails" class="cursor-pointer"><- Bank Details</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>