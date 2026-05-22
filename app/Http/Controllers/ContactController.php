<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact.show');
    }

    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        // TODO: wire to a real mailable that delivers to office@spaid.be.
        Log::info('Contact form submission', $data);

        return redirect()
            ->route('contact.show')
            ->with('status', __('Thanks — we will get back to you within two working days.'));
    }
}
