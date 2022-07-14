<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;
use App\Models\Rank;
use App\Models\Staff;
use App\Models\Document;
use App\Models\Blog;
use DB;

use App\Charts\StaffStat;

class DashboardController extends Controller
{
    public function index(){

        $dataset = DB::table('staff')
            ->select('staff.state_of_primary_assignment', \DB::raw("COUNT(state_of_primary_assignment) as total"))
            ->groupBy('staff.state_of_primary_assignment')
            ->get();
        
        $chart = new StaffStat;
        $chart->labels($dataset->pluck('state_of_primary_assignment'));
        $chart->dataset('BOWDI Staff State of Primary Assignment Chart', 'bar', $dataset->pluck('total'))->options(['backgroundColor' => 'green']);

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

        if($request->photo !== null){
            $imageName = '/images/staff/'.time().'.'.$request->photo->extension();
        }else{
            $imageName = '';
        }

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
                    'photo' => $imageName,
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
                    'state_of_primary_assignment' => $request->state_of_primary_assignment,
                ]);

                if($request->photo != null){
                    $request->photo->move('images/staff', $imageName);
                }

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
        $users = User::where('status', 1)->get();
        $staff = DB::table('staff')
                ->join('users', 'staff.user_id','=','users.id')
                ->select(
                    ['users.name AS name',
                    'staff.id AS id', 'staff.rank_id AS rank_id', 'staff.department_id AS department_id', 'staff.photo AS photo'
                ])
                ->where('users.status','=',1)
                ->orderBy('staff.created_at', 'desc')
                ->paginate(10);
        return view('dashboard.staff', compact('staff'));
    }

    public function editstaff($staff){
        $staff = Staff::findOrFail($staff);
        return view('dashboard.edit.staff', compact('staff'));
    }

    public function updatestaff(Request $request, $id){
        $data = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'personal_email' => ['required'],
        ]);

        if($request->photo !== null){
            $imageName = '/images/staff/'.time().'.'.$request->photo->extension();
        }else{
            $imageName = '';
        }

        try{
            $staff = Staff::where('id', $id)->update([
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
                'photo' => $imageName,
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
            
            if($request->photo != null){
                $request->photo->move('images/staff', $imageName);
            }

            return redirect()->route('dashboard-staff')->with('success', 'Staff Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deletestaff($id)
    {
        $staff_user_id = Staff::where('id', $id)->pluck('user_id')->first();
        
        try{
            $staff = User::where('id', $staff_user_id)->update([
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

    //Add Document
    public function addDoc(Request $request){
        $data = $request->validate([
            'name' => ['required'],
            'path' => ['required', 'mimes:pdf,doc,docx,txt,jpeg,jpg,png,'],
            'date' => ['required'],
        ]);

        if($file = $request->file('path')){
            $path = time().str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/documents/', $path);
            
            if($data['path'] != null){
                if(file_exists(public_path().'/assets/documents/'.$data['path'])){
                    unlink(public_path().'/assets/documents/'.$data['path']);
                }
            }
        }

        try{
            Document::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'path' => $path,
                'date' => $data['date'],
                'status' => 1,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->route('dashboard-admin')->with('success', $data['name'].' uploaded successfully'); 
            
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    //Doc All
    public function doc(){
        $doc = Document::where('status', 1)->orderby('created_at', 'desc')->paginate(50);
        return view('dashboard.doc', compact('doc'));
    }

    //Delete Document
    public function deletedoc($id){
        
        try{
            $doc = Document::where('id', $id)->update(['status'=> 0]);
            return redirect()->route('doc')->with('success', 'Document Deleted');
        }catch(Exception $e){
            return redirect()->route('doc')->with('error', 'Please try again... '.$e);
        }

    }

    //Edit Document
    public function editdoc($id){
        $doc = Document::findOrFail($id);
        return view('dashboard.edit.doc', compact('doc'));
    }

    //Update Document
    public function updatedoc(Request $request, $id){
        
        if($request->path != null){
            $data = $request->validate([
                'name' => ['required'],
                'path' => ['mimes:pdf,doc,docx,txt,jpeg,jpg,png,'],
                'date' => ['required'],
            ]);
            
            if($file = $request->file('path')){
                $path = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/documents/', $path);
                
                if($data['path'] != null){
                    if(file_exists(public_path().'/assets/documents/'.$data['path'])){
                        unlink(public_path().'/assets/documents/'.$data['path']);
                    }
                }
            }

        }else{
            $data = $request->validate([
                'name' => ['required'],
                'date' => ['required'],
            ]);

            $path = $request->old_path;
        }

        try{
            $doc = Document::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'path' => $path,
                'date' => $request->date
            ]);
            return redirect()->route('doc')->with('success', 'Document Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function blog()
    {
        $blogs = Blog::orderby('id','desc')->paginate(9);
        return view('dashboard.blog', ['blogs'=>$blogs]);
    }

    public function uploadImage(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move('images/blogs', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            
            $url = '/images/blogs/'.$fileName; 
            
            $msg = 'Image successfully uploaded'; 
            
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function addblog(Request $request)
    {
        $data = request()->validate([
            'title'=> 'required',
            'author'=> 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'=> 'required',
            'status'=> 'required',
        ]);

        $imageName = '/images/blogs/'.time().'.'.$request->photo->extension();  
        
        try{
            Blog::create(
                [
                'title' => $request->title,
                'author' => $request->author,
                'photo' => $imageName,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id
                ]);
                
                $request->photo->move('images/blogs', $imageName);
                
                return redirect()->route('blog');
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }

    public function blogshow($id){
        $blog = Blog::findOrFail($id);
        return view('dashboard.show.blog', ['blog'=>$blog]);
    }
    
    public function editblog($id)
    {
        $blog = Blog::findOrFail($id);
        $blogStatus = $blog->status;
        
        return view('dashboard.edit.blog', ['blog'=>$blog]);
    }
    
    public function updateblog(Request $request, $id)
    {
        if($request->photo !== null){

            $imageName = '/images/blogs/'.time().'.'.$request->photo->extension();  
            
            $data = request()->validate([
                'title'=> 'required',
                'content'=> 'required',
                'status'=> 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            
            try{
                $blog = Blog::where('id', $id)->update([
                    'title'=> $request->title,
                    'content'=> $request->content,
                    'status'=> $request->status,
                    'photo'=> $imageName
                    ]);
                    
                $request->photo->move('images/blogs', $imageName);
                return redirect()->route('blog')->with('success', 'Blog Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }else{
            $data = request()->validate([
                'title'=> 'required',
                'status'=> 'required',
                'content'=> 'required',
            ]);
            
            try{
                $blog = Blog::where('id', $id)->update($data);
                return redirect()->route('blog')->with('success', 'Blog Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }
    }

    public function deleteblog($id)
    {
        $blog = Blog::findOrFail($id);
        
        try{
            $blog->delete();
            return back()->with('success', 'Blog deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

}
