<?php

namespace App\Http\Controllers;

use App\Models\Conslutation;
use Illuminate\Http\Request;
use Validator;

class ConslutationController extends Controller
{
    //
    public function getConsultant(Request $request)
    {
        $attrValide = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'min:3'],
            'company_name' => ['required', 'string', 'min:3'],
            'email' => ['nullable', 'string',],
            'phone' => ['required', 'string', 'min:3',],
        ]);

        if ($attrValide->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Type failure",
                "error" => $attrValide->errors()->all(),
            ], 401);

        } else {
            $user = Conslutation::create([
                'full_name' => $request->full_name,
                'company_name' => $request->company_name,
                'email' => $request->email,
                'phone' => $request->phone,
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
