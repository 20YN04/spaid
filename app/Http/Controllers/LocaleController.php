<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LocaleController extends Controller
{
    public function switch(Request $request, string $locale): RedirectResponse
    {
        $supported = config('app.supported_locales', ['nl', 'fr']);

        if (! in_array($locale, $supported, true)) {
            throw new NotFoundHttpException("Unsupported locale: {$locale}");
        }

        $request->session()->put('locale', $locale);

        return redirect()->back('/');
    }
}
