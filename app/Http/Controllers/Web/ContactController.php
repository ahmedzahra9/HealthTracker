<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //================================================================
    public function post_contact_us(Request $request){
        $valedator = Validator::make($request->all(), [
            'email' => 'required',
            'name' => 'required',
            'message' => 'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors(), 'success' => 'false']);
        $data = $request->all();
        Contact::create($data);
        return response()->json(['message' =>'message sent successfully','success'=>'true']);
    }
}
