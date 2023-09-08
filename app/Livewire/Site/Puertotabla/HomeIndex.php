<?php

namespace App\Livewire\Site\Puertotabla;

use App\Models\Page\Category;
use App\Models\Page\Product;
use App\Models\Page\Subcategory;
use Livewire\Component;

class HomeIndex extends Component
{

    public function render()
    {
        $categories = Category::where('company_id', auth()->user()->company_id)->get();
        $subcategories = Subcategory::where('company_id', auth()->user()->company_id)->get();
        $products = Product::where('company_id', auth()->user()->company_id)->get();
        return view('livewire.site.puertotabla.home-index',
            compact('categories', 'subcategories', 'products')
        );
    }
}
