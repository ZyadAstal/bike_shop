<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show contact page.
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Store contact message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    /**
     * Subscribe to newsletter.
     */
    public function newsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create($validated);

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
