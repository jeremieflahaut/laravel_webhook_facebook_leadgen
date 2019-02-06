<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request)
    {
        if ($request->input('hub_mode') === 'subscribe'
            && $request->input('hub_verify_token') === env('FACEBOOK_VERIFY_TOKEN')) {
            return response($request->input('hub_challenge'), 200);
        }
        return response('error', 400);
    }
}