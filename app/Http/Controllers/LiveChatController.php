<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveChatController extends Controller
{
    public function index(){
        return view('pages.live_chat.chat');
    }
}
