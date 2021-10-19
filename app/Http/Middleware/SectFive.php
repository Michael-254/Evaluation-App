<?php

namespace App\Http\Middleware;

use App\Models\SectionFive;
use App\Models\SectionFour;
use Closure;
use Illuminate\Http\Request;

class SectFive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $progress = SectionFour::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();
        if ($progress != '') {
            return $next($request);
        }
        abort(403,'you must complete the previous section');
    }
}
