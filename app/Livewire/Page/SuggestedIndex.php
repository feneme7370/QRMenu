<?php

namespace App\Livewire\Page;

use Livewire\Component;
use App\Models\Page\Product;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use App\Models\Page\Suggested;

class SuggestedIndex extends Component
{
    use WithPagination;
    
    // reglas de validacion
    #[Rule('required|numeric')]
    public $product_id;
    #[Rule('required|numeric')]
    public $user_id;
    #[Rule('required|numeric')]
    public $company_id;

    // variables principales
    public $suggested, $suggestedId, $suggested_id;

    // contar elementos de membresia
    public function countSuggesteds() {
        $amount = count(Suggested::where('company_id', auth()->user()->company_id)->get());
        $membershipNumber = auth()->user()->company->membership->suggested;
        if($amount >= $membershipNumber){
            session()->flash('messageError', 'Excede la cantidad permitida');
            return true;
        }
    }

    // comprobar que ya exista
    public function existSuggested() {
        $suggestedCreated = Suggested::where('company_id', auth()->user()->company_id)
                                ->where('product_id', $this->product_id)->get();
        if(count($suggestedCreated) != 0){
            session()->flash('messageError', 'Ya existe como destacado');
            return true;
        }
    }

    // abrir modal y recibir id para borrar
    public function deleteSuggested($id) {
        $suggested = Suggested::findOrFail($id);
        $suggested->delete();
        session()->flash('messageSuccess', 'Registro eliminado');
        $this->reset();
    }

    // boton de guardar
    public function save() {
    
        if($this->countSuggesteds()){return;}
        if($this->existSuggested()){return;}

        $this->user_id = auth()->user()->id;
        $this->company_id = auth()->user()->company_id;

        $this->validate();
        
        Suggested::create(
            $this->only(['product_id', 'user_id', 'company_id'])
        );
        $this->reset();
        session()->flash('messageSuccess', 'Creado');

    }

    
    public function render()
    {
        $products = Product::where('company_id', auth()->user()->company_id)
                        ->orderBy('name', 'ASC')->get();

        $suggesteds = Suggested::where('company_id', auth()->user()->company_id)
                        ->paginate(10);
        return view('livewire.page.suggested-index', compact('suggesteds', 'products'));
    }
}
