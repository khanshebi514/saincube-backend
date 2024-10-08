<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $attrValide = Validator::make($request->all(), [
            'firstName' => ['required', 'string', 'min:3'],
            'lastName' => ['required', 'string', 'min:3'],
            'company' => ['nullable', 'string',],
            'country' => ['required', 'string', 'min:3',],
            'email' => ['required', 'email',],
            'whatsapp' => ['nullable', 'string'],
            'message_body' => ['required', 'string'],
        ]);

        if ($attrValide->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Type failure",
                "error" => $attrValide->errors()->all(),
            ], 401);

        } else {
            $user = Contact::create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'company' => $request->company ?? '',
                'country' => $request->country,
                'email' => $request->email,
                'whatsapp' => $request->whatsapp ?? '',
                'message_body' => $request->message_body,
            ]);

            return response()->json([
                "status" => true,
                "message" => "Successfully sent your message...!",
                "user" => $user
            ], 200);

        }
        ;
    }
}
