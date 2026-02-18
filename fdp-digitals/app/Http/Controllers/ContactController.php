<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Added this to fix the error
use App\Mail\WelcomeLead;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // 1. Validate the form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'nullable|string',
            'message' => 'required|string',
        ]);

        // 2. Save lead to DB
        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'service' => $validated['service'] ?? 'General Inquiry',
            'message' => $validated['message'],
            'status' => 'New',
        ]);

        // 3. Trigger Emails to Mailtrap
        try {
            // Send branded email to client
            Mail::to($contact->email)->send(new WelcomeLead($contact->name, $contact->service));

            // Send raw notification to your admin email
            // Replace 'admin@fdpdigitals.com' with your actual email address
            Mail::raw("New Lead Alert!\n\nName: {$contact->name}\nService: {$contact->service}\nMessage: {$contact->message}", function ($message) {
                $message->to('admin@fdpdigitals.com') 
                        ->subject('🔥 New FDP Lead: ' . date('Y-m-d'));
            });
            
        } catch (\Exception $e) {
            // This now works because Log is imported above
            Log::error("Email Error: " . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Thank you! We have received your inquiry.');
    }
}