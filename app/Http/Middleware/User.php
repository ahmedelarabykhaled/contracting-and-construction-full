<?php

namespace App\Http\Middleware;

use Closure;
use App\MainInfo;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $maininfo = MainInfo::find(10);
        if ($maininfo->content == true) {
            return $next($request);
        }
        else if ($maininfo->content == false)
        {
            return redirect('stop');
        }
        // return $next($request);
    }
}
