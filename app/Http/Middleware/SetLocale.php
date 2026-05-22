<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supported = config('app.supported_locales', ['nl', 'fr']);
        $default = config('app.locale', 'nl');

        $locale = $request->session()->get('locale');

        if (! in_array($locale, $supported, true)) {
            $locale = $this->preferredFromBrowser($request, $supported) ?? $default;
            $request->session()->put('locale', $locale);
        }

        App::setLocale($locale);

        return $next($request);
    }

    protected function preferredFromBrowser(Request $request, array $supported): ?string
    {
        $accepted = $request->getLanguages();

        foreach ($accepted as $lang) {
            $short = strtolower(substr($lang, 0, 2));

            if (in_array($short, $supported, true)) {
                return $short;
            }
        }

        return null;
    }
}
