<?php

namespace App\Http\Controllers\Page;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        
        return view('page.master.users.index');
    }
}
