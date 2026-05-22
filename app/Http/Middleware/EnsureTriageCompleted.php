<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTriageCompleted
{
    /**
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user === null) {
            return $next($request);
        }

        if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()) {
            return $next($request);
        }

        if (method_exists($user, 'hasEnabledTwoFactorAuthentication')
            && ! $user->hasEnabledTwoFactorAuthentication()) {
            return $next($request);
        }

        if ($user->triage_completed) {
            return $next($request);
        }

        if ($request->routeIs('triage.*')) {
            return $next($request);
        }

        return redirect()->route('triage.show');
    }
}
