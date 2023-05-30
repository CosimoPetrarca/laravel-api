<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'string|max:70',
            'email' => 'required|string|max:70|email',
            'message' => 'required|string'
        ]);

        $newContact = new Contact();

        $newContact->name = $data['name'];
        $newContact->email = $data['email'];
        $newContact->message = $data['message'];

        $newContact->save();

        Mail::to('info@p4nix.com')->send(new NewContact($newContact));

        return $newContact;
    }
}
