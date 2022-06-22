<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Cargo;
use DB;

use App\Charts\WeeklyReport;

class DashboardController extends Controller
{
    public function index(){

        $dataset = DB::table('cargos')
            ->select('cargos.cargo_type', \DB::raw("COUNT(cargo_type) as total"))
            ->groupBy('cargos.cargo_type')
            ->get();
        
        $chart = new WeeklyReport;
        $chart->labels($dataset->pluck('cargo_type'));
        $chart->dataset('Weekly Report', 'bar', $dataset->pluck('total'))->options(['backgroundColor' => '#D03D56']);

        return view('dashboard.index', compact('chart'));
    }

    //Cargo
    public function addcargo(Request $request){
        $data = $request->validate([
            'cargo_type' => ['required'],
            'cust_name' => ['required'],
            'cust_phone' => ['required'],
            'quantity' => ['required'],
            'good_type' => ['required'],
            'weight' => ['required'],
            'rate' => ['required'],
            'ship_details' => ['required'],
            'date' => ['required'],
        ]);

        $date = $data['date'];
        $weight = floatval($data['weight']);
        $rate = floatval($data['rate']);
        $amount = $weight * $rate;
        $timestamp = strtotime($data['date']) + date('His');
        
        try{
            Cargo::create([
                'cargo_type' => $data['cargo_type'],
                'cust_name' => $data['cust_name'],
                'cust_phone' => $data['cust_phone'],
                'quantity' => $data['quantity'],
                'good_type' => $data['good_type'],
                'weight' => $data['weight'],
                'rate' => $data['rate'],
                'amount' => $amount,
                'day' => date('d', strtotime($date)),
                'month' => date('m', strtotime($date)),
                'year' => date('Y', strtotime($date)),
                'ship_details' => $data['ship_details'],
                'timestamp' => $timestamp
            ]);

            return redirect()->route('dashboard-admin')->with('success', 'Cargo Stored'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    //cargo
    public function cargo(){
        $cargo = Cargo::orderby('created_at', 'desc')->paginate(50);
        return view('dashboard.cargo', compact('cargo'));
    }

    //Delete cargo
    public function deletecargo($id){
        $cargo = Cargo::findOrFail($id);
        try{
            $cargo->delete();
            return redirect()->route('cargo')->with('success', 'Cargo Deleted');
        }catch(Exception $e){
            return redirect()->route('cargo')->with('error', 'Please try again... '.$e);
        }
    }

    //Edit cargo
    public function editcargo($id){
        $cargo = Cargo::findOrFail($id);
        return view('dashboard.edit.cargo', compact('cargo'));
    }

    //Update cargo
    public function updatecargo(Request $request, $id){
        $data = $request->validate([
            'cargo_type' => ['required'],
            'cust_name' => ['required'],
            'cust_phone' => ['required'],
            'quantity' => ['required'],
            'good_type' => ['required'],
            'weight' => ['required'],
            'rate' => ['required'],
            'ship_details' => ['required'],
            'date' => ['required'],
        ]);

        $date = $data['date'];
        $weight = floatval($data['weight']);
        $rate = floatval($data['rate']);
        $amount = $weight * $rate;
        $timestamp = strtotime($data['date']) + date('His');

        try{
            $cargo = Cargo::where('id', $id)->update([
                'cargo_type' => $data['cargo_type'],
                'cust_name' => $data['cust_name'],
                'cust_phone' => $data['cust_phone'],
                'quantity' => $data['quantity'],
                'good_type' => $data['good_type'],
                'weight' => $data['weight'],
                'rate' => $data['rate'],
                'amount' => $amount,
                'day' => date('d', strtotime($date)),
                'month' => date('m', strtotime($date)),
                'year' => date('Y', strtotime($date)),
                'ship_details' => $data['ship_details'],
                'timestamp' => $timestamp
            ]);
            return redirect()->route('cargo')->with('success', 'Cargo Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    //payment
    public function payment(){
        
        $months = Cargo::select('month')->orderby('month', 'asc')->distinct()->get();
        $years = Cargo::select('year')->orderby('year', 'asc')->distinct()->get();

        return view('dashboard.payment', compact('months', 'years'));
    
    }

    public function viewpayment(Request $request){
        
        $data = $request->validate([
            'month' => ['required'],
            'year' => ['required'],
        ]);

        $month = $data['month'];
        $year = $data['year'];

        $payment = Cargo::where('month', $month)->where('year', $year)->orderby('day', 'asc')->paginate(100);

        return view('dashboard.viewpayment', compact('payment', 'month', 'year'));
        
    }

    //Manifest
    public function manifest(){
        
        $months = Cargo::select('month')->orderby('month', 'asc')->distinct()->get();
        $years = Cargo::select('year')->orderby('year', 'asc')->distinct()->get();

        return view('dashboard.manifest', compact('months', 'years'));
    
    }

    public function viewmanifest(Request $request){
        
        $data = $request->validate([
            'month' => ['required'],
            'year' => ['required'],
        ]);

        $month = $data['month'];
        $year = $data['year'];

        $manifest = Cargo::where('month', $month)->where('year', $year)->orderby('day', 'asc')->paginate(100);

        return view('dashboard.viewmanifest', compact('manifest', 'month', 'year'));
        
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
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => $password,
                'type' => $data['type'],
                'status' => 1
            ]);

            return redirect()->route('dashboard-admin')->with('success', $name.' Added'); 
            
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
