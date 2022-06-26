<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\User;
use App\Models\Department;
use App\Models\Rank;

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
        $staff = User::where('status', 1)->get();
        $department = Department::all();
        $rank = Rank::all();

        View::share('staff', $staff);
        View::share('department', $department);
        View::share('rank', $rank);
        
        return $next($request);
    }
}
