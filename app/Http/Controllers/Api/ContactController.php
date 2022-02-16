<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $success = true;

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required'
        ],
        [
            'name.required' => "Il nome è un campo obbligatorio",
            'name.max' => "Il nome non può avere più di :max caratteri",
            'email.required' => "L'email è un campo obbligatorio",
            'email.max' => "L'email non può avere più di :max caratteri",
            'message.required' => "Il messaggio è un campo obbligatorio",
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        return response()->json(compact('success'));
    }
}
