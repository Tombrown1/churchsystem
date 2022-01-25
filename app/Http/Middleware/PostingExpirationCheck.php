<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\plugins\MyPlugin;

class PostingExpirationCheck extends MyPlugin
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
        $processdate = config('posting.process_date');
        $currentDate = date('Y-m-d');
        if($processdate == null){
            // run the expiration function
            $this->expirePosting();
            //update config file with the latest date
            Config::set('posting.process_date', $currentDate);
        }else{
            //check if the value is equal to todays date if yes it means the function have run for today 
            //if no then run the function
            if($processdate != $currentDate){
                // run the expiration function
                $this->expirePosting();
                //update config file with the latest date
                //config(['posting.process_date' => $currentDate]);
                Config::set('posting.process_date', $currentDate);
            }
        }

        return $next($request);
    }
}
