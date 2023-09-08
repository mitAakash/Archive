<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    //
    public function incoming_verify()
    {
        $challenge = $_REQUEST['hub_challenge'];
        $verify_token = $_REQUEST['hub_verify_token'];
        if ($verify_token === 'sahej$13579#sahej') {
            
            return response($challenge, 200)
                ->header('Content-Type', 'text/plain');
        }
    }
    public function incoming_message()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $data = $input['entry'];
    
    }
}
