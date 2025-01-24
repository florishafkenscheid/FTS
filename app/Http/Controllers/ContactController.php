<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:3000',
        ]);

        // For now, we'll just redirect with success message
        // You can add email sending functionality later if needed
        return redirect()->route('contact')->with('success', 'Message sent successfully!');
    }
}
