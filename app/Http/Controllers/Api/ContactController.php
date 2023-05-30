<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

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

        return $newContact;
    }
}
