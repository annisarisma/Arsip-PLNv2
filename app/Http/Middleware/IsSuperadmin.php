<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

use function PHPUnit\Framework\isNull;

class IsSuperadmin
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
        if (empty(auth()->user()->role)) {
            return redirect('/login');
        } elseif (auth()->user()->role != 'superadmin') {
            abort(403);
        }
        return $next($request);
    }
}
