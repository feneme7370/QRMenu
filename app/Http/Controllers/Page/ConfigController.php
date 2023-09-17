<?php

namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Models\Page\Company;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Company $company)
    {
        
        return view('page.admin.config.index', compact('company'));
    }
}
