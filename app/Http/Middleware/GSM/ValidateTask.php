<?php

namespace App\Http\Middleware\GSM;

use Closure;

class ValidateTask {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        //  check if there is already a task for this user under this time
        

        return $next($request);
    }

}
