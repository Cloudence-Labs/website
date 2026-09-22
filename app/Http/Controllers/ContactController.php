<?php

namespace App\Http\Controllers;

use App\Mail\ContactEnquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('pages.contact');
    }

    public function send(Request $request): RedirectResponse
    {
        // Honeypot: real visitors never fill this hidden field.
        if ($request->filled('website')) {
            return redirect()->route('contact')->with('sent', true);
        }

        $data = $request->validate([
            'name'         => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email', 'max:190'],
            'phone'        => ['nullable', 'string', 'max:40'],
            'organisation' => ['nullable', 'string', 'max:160'],
            'service'      => ['nullable', 'string', 'max:120'],
            'message'      => ['required', 'string', 'min:10', 'max:4000'],
        ]);

        Mail::to(config('site.mail'))->send(new ContactEnquiry($data));

        return redirect()->route('contact')->with('sent', true);
    }
}
