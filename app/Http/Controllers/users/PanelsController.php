<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelsController extends Controller
{
    public function index(){
        return view('users.painel');
    }
}
