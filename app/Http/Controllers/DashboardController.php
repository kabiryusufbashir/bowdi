<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;
use App\Models\Rank;
use App\Models\Staff;
use DB;

use App\Charts\StaffStat;

class DashboardController extends Controller
{
    public function index(){

        $dataset = DB::table('staff')
            ->select('staff.gender', \DB::raw("COUNT(gender) as total"))
            ->groupBy('staff.gender')
            ->get();
        
        $chart = new StaffStat;
        $chart->labels($dataset->pluck('gender'));
        $chart->dataset('Staff Gender', 'bar', $dataset->pluck('total'))->options(['backgroundColor' => 'green']);

        return view('dashboard.index', compact('chart'));
    }

    //Add Dept
    public function addDept(Request $request){
        $data = $request->validate([
            'name' => ['required'],
        ]);

        try{
            Department::create([
                'name' => $data['name'],
            ]);

            return redirect()->route('dashboard-admin')->with('success', $data['name'].' deptment added'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    //Dept All
    public function dept(){
        $dept = Department::orderby('created_at', 'desc')->paginate(50);
        return view('dashboard.dept', compact('dept'));
    }

    //Delete Dept
    public function deletedept($id){
        $dept = Department::findOrFail($id);
        try{
            $dept->delete();
            return redirect()->route('dept')->with('success', 'Department Deleted');
        }catch(Exception $e){
            return redirect()->route('dept')->with('error', 'Please try again... '.$e);
        }
    }

    //Edit dept
    public function editdept($id){
        $dept = Department::findOrFail($id);
        return view('dashboard.edit.dept', compact('dept'));
    }

    //Update dept
    public function updatedept(Request $request, $id){
        $data = $request->validate([
            'name' => ['required']
        ]);

        try{
            $dept = Department::where('id', $id)->update([
                'name' => $data['name'],
            ]);
            return redirect()->route('dept')->with('success', 'Department Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    //Add Rank
    public function addrank(Request $request){
        $data = $request->validate([
            'name' => ['required'],
        ]);

        try{
            Rank::create([
                'name' => $data['name'],
            ]);

            return redirect()->route('dashboard-admin')->with('success', $data['name'].' rank added'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    //Rank All
    public function rank(){
        $rank = Rank::orderby('created_at', 'desc')->paginate(50);
        return view('dashboard.rank', compact('rank'));
    }

    //Delete Rank
    public function deleterank($id){
        $rank = Rank::findOrFail($id);
        try{
            $rank->delete();
            return redirect()->route('rank')->with('success', 'Rank Deleted');
        }catch(Exception $e){
            return redirect()->route('rank')->with('error', 'Please try again... '.$e);
        }
    }

    //Edit Rank
    public function editrank($id){
        $rank = Rank::findOrFail($id);
        return view('dashboard.edit.rank', compact('rank'));
    }

    //Update Rank
    public function updaterank(Request $request, $id){
        $data = $request->validate([
            'name' => ['required']
        ]);

        try{
            $rank = Rank::where('id', $id)->update([
                'name' => $data['name'],
            ]);
            return redirect()->route('rank')->with('success', 'Rank Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
    
    //Staff
    public function addStaff(Request $request){
        $data = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'personal_email' => ['required'],
        ]);

        $name = $data['first_name'].' '.$request->last_name.' '.$request->other_name;
        $email = $request->personal_email;
        $username = $request->first_name.$request->last_name;
        $password = Hash::make('1234567890');
        $type = 2;

        try{

            $staff = User::create([
                'name' => $name,
                'email' => $request->personal_email,
                'username' => $username,
                'password' => $password,
                'type' => $type,
                'status' => 1
            ]);

            $staff_id = $staff->id;

            try{
                Staff::create([
                    'user_id' => $staff_id,
                    'rank_id' => $request->rank_id,
                    'department_id' => $request->department_id,
                    'supervisor_id' => $request->supervisor_id,
                    'title' => $request->title,
                    'e_code' => $request->e_code,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'other_name' => $request->other_name,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'place_of_birth' => $request->place_of_birth,
                    'photo' => $request->photo,
                    'lga' => $request->lga,
                    'state' => $request->state,
                    'nationality' => $request->nationality,
                    'marital_status' => $request->marital_status,
                    'blood_group' => $request->blood_group,
                    'next_of_kin' => $request->next_of_kin,
                    'tax_id_no' => $request->tax_id_no,
                    'vaccinated_yes' => $request->vaccinated_yes,
                    'vaccinated_no' => $request->vaccinated_no,
                    'vaccination_type' => $request->vaccination_type,
                    'date_of_vaccination' => $request->vaccination_type,
                    'residential_address' => $request->residential_address,
                    'permanent_address' => $request->permanent_address,
                    'permanent_address_city' => $request->permanent_address_city,
                    'permanent_address_state' => $request->permanent_address_state,
                    'permanent_address_country' => $request->permanent_address_country,
                    'personal_email' => $request->personal_email,
                    'mobile_no' => $request->mobile_no,
                    'emergency_contact_name_1' => $request->emergency_contact_name_1,
                    'emergency_contact_relationship_1' => $request->emergency_contact_relationship_1,
                    'emergency_contact_contact_no_1' => $request->emergency_contact_contact_no_1,
                    'emergency_contact_address_1' => $request->emergency_contact_address_1,
                    'emergency_contact_name_2' => $request->emergency_contact_name_2,
                    'emergency_contact_relationship_2' => $request->emergency_contact_relationship_2,
                    'emergency_contact_contact_no_2' => $request->emergency_contact_contact_no_2,
                    'emergency_contact_address_2' => $request->emergency_contact_address_2,
                    'emergency_contact_name_3' => $request->emergency_contact_name_3,
                    'emergency_contact_relationship_3' => $request->emergency_contact_relationship_3,
                    'emergency_contact_contact_no_3' => $request->emergency_contact_contact_no_3,
                    'emergency_contact_address_3' => $request->emergency_contact_address_3,
                    'account_name' => $request->account_name,
                    'account_no' => $request->account_no,
                    'bank_name' => $request->bank_name,
                    'bank_branch' => $request->bank_branch,
                ]);

                return redirect()->route('dashboard-admin')->with('success', $request->first_name.' '.$request->last_name.' Added');

            }catch(Expection $e){
                return back()->with(['error' => 'Please try again later! ('.$e.')']);        
            } 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }
    
    //Staff
    public function staff(){
        $staff = Staff::orderby('created_at', 'desc')->paginate(10);
        // $staff->toJson();
        return view('dashboard.staff', compact('staff'));
    }

    public function editstaff($staff){
        $staff = User::findOrFail($staff);
        return view('dashboard.edit.staff', compact('staff'));
    }

    public function updatestaff(Request $request, $id){
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'username' => ['required'],
            'type' => ['required'],
        ]);

        try{
            $staff = User::where('id', $id)->update($data);
            return redirect()->route('dashboard-staff')->with('success', 'Staff Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deletestaff($id)
    {
        $staff = User::findOrFail($id);
        
        try{
            $staff = User::where('id', $id)->update([
                'status'=> 0
            ]);
            return back()->with('success', 'Staff deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function resetstaffpassword($id)
    {
        $staff = User::findOrFail($id);
        $password = Hash::make(1234567890);
        
        try{
            $staff = User::where('id', $id)->update([
                'password'=> $password
            ]);
            return back()->with('success', 'Staff Password Reset');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
    
    //Edit Profile
    public function editProfile(Request $request){
        
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required'],
        ]);
        
        $user =  Auth::guard('web')->user();
        
        if($request->old_password){
            if (Hash::check($request->old_password, $user->password)){
                $password = Hash::make($request->password);
                    try{
                        $user = User::where('id', $user->id)->update(['password'=> $password]);
                        return redirect()->route('dashboard-admin')->with('success', 'Password Changed');
                    }catch(Exception $e){
                        return back()->with('error', 'Please try again... '.$e);
                    }
            }else{
                return back()->with('error', 'Please Check Your Password and Try Again');
            }
        }
    }

}
