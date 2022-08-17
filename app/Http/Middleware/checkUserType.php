<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next , ...$types)
    {
        $user = $request->user();
        if (!in_array($user->type,$types)) {
            abort(403);
        }
        return $next($request);
    }
}
