<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Models\Page\Category;
use App\Http\Controllers\Controller;
use App\Models\Page\Company;
use App\Models\Page\Product;
use App\Models\Page\Subcategory;
use App\Models\Page\Suggested;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    { 
        $categories = Category::where('company_id', auth()->user()->company_id)->count();   
        $subcategories = Subcategory::where('company_id', auth()->user()->company_id)->count();   
        $products = Product::where('company_id', auth()->user()->company_id)->count();   
        $suggested = Suggested::where('company_id', auth()->user()->company_id)->count();   


        $companies = Company::count();
        $users = User::count();   
        return view('page.admin.dashboard',
            compact('categories', 'subcategories', 'products', 'companies', 'users', 'suggested')
        );
    }
    public function unrole()
    {
        
        return view('page.admin.unrole.index');
    }
    public function puerto_tabla()
    {
        
        return view('site.puerto_tabla.index');
    }
}
