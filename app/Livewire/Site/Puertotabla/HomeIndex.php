<?php

namespace App\Livewire\Site\Puertotabla;

use App\Models\User;
use Livewire\Component;
use App\Models\Page\Product;
use App\Models\Page\Category;
use App\Models\Page\Company;
use App\Models\Page\Subcategory;
use App\Models\Page\Suggested;

class HomeIndex extends Component
{

    public function render()
    {
        $categories = Category::where('company_id', '2')->get();
        $subcategories = Subcategory::where('company_id', '2')->get();
        $products = Product::where('company_id', '2')->get();
        $suggesteds = Suggested::where('company_id', '2')->get();
        $company = Company::where('id', '2')->first();
        
        return view('livewire.site.puertotabla.home-index',
            compact('categories', 'subcategories', 'products', 'company', 'suggesteds')
        );
    }
}
