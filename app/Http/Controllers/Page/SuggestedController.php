<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuggestedController extends Controller
{
public function index()
{
    
    return view('page.admin.suggesteds.index');
}
}
