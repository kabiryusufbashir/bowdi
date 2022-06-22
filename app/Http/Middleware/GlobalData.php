<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Program;
use App\Models\Beneficiary;
use App\Models\Donation;
use App\Models\User;
use App\Models\Cargo;

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
        $cargo = Cargo::all();
        $staff = User::where('status', 1)->get();

        View::share('staff', $staff);
        View::share('cargo', $cargo);

        return $next($request);
    }
}
