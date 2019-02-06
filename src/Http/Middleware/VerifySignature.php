<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;
use Closure;

class VerifySignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $fb_signature = substr($request->header('x-hub-signature'), 5);
        $my_signature = hash_hmac('sha1', $request->getContent(), env('FACEBOOK_APP_SECRET'));

        if($fb_signature === $my_signature)
        {
            return $next($request);
        }

        return response('error', 400);
    }
}