<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\User;
use App\Models\Department;
use App\Models\Document;
use App\Models\Rank;
use App\Models\Staff;
use App\Models\Blog;
use App\Models\Report;
use App\Models\Directory;

class GlobalData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $supervisor = User::where('status', 1)->get();
        $staff = Staff::all();
        $department = Department::all();
        $document = Document::where('status', 1)->get();
        $rank = Rank::all();
        $blog = Blog::all();
        $report = Report::where('status', 1)->get();
        $directory = Directory::all();

        View::share('supervisor', $supervisor);
        View::share('staff', $staff);
        View::share('department', $department);
        View::share('document', $document);
        View::share('rank', $rank);
        View::share('blog', $blog);
        View::share('report', $report);
        View::share('directory', $directory);
        
        return $next($request);
    }
}
