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
            'name' => ['required'],
            'email' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'type' => ['required'],
        ]);

        $name = $data['name'];
        $email = $data['email'];
        $username = $data['username'];
        $password = Hash::make($data['password']);
        $type = $data['type'];

        try{

            $staff = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => $password,
                'type' => $data['type'],
                'status' => 1
            ]);

            $staff_id = $staff->id;

            dd($staff_id);

            // return redirect()->route('dashboard-admin')->with('success', $name.' Added'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }
    
    //Staff
    public function staff(){
        $staff = User::orderby('created_at', 'desc')->where('status', 1)->paginate(10);
        $staff->toJson();
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
