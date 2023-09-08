<?php

namespace App\Livewire\Page;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Page\Category;
use Livewire\Attributes\Rule;
use App\Models\Page\Subcategory;

class SubcategoryIndex extends Component
{
    use WithPagination;
    
    // variables de filtros
    public $active = true, $search, $sortBy = 'id', $sortAsc = false;

    // variables para modales
    public $showActionModal = false;
    public $showDeleteModal = false;

    // reglas de validacion
    #[Rule('required|string|min:4')]
    public $name;
    #[Rule('required|string|min:4')]
    public $description;
    #[Rule('required|numeric')]
    public $status;
    #[Rule('required|numeric')]
    public $category_id;

    #[Rule('required|numeric')]
    public $user_id;
    #[Rule('required|numeric')]
    public $company_id;

    // variables principales
    public $subcategory, $subcategoryId;

    // resetear paginacion de filtros
    public function updatingActive() {$this->resetPage();}
    public function updatingSearch() {$this->resetPage();}

    // contar elementos de membresia
    public function countSubcategories() {
        $amount = count(Subcategory::where('company_id', auth()->user()->company_id)->get());
        $membershipNumber = auth()->user()->company->membership->subcategory;
        if($amount >= $membershipNumber){
            session()->flash('messageError', 'Excede la cantidad permitida');
            return true;
        }
    }

    // verificar != wihtoutCompany
    public function wihtoutCompany () {
        if(auth()->user()->company_id == 1){
            session()->flash('messageError', 'No tiene una empresa asignada');
            return true;
        }
    }
    
    // renombrar variables a castellano
    protected $validationAttributes = [
        'name' => 'nombre',
        'description' => 'descripcion',
        'status' => 'estado',
        'category_id' => 'categoria',
    ];

    // abrir modal y recibir id para borrar
    public function openDeleteModal($id){
        if($this->wihtoutCompany()){return;}
        $this->showDeleteModal = true;
        $this->subcategoryId = $id;
    }
    
    // eliminar desde el modal de confirmacion
    public function deleteSubcategory() {
        $subcategory = Subcategory::findOrFail($this->subcategoryId);
        if($subcategory->products->count() > 0){
            session()->flash('messageError', 'No se puede eliminar, tiene productos asignados');
            $this->reset();
        }else{
            $subcategory->delete();
            session()->flash('messageSuccess', 'Registro eliminado');
            $this->reset();
        }
        $this->showDeleteModal = false;
    }

    // mostrar modal para confirmar crear
    public function createActionModal() {
        if($this->wihtoutCompany()){return;}
        if($this->countSubcategories()){return;}
        $this->reset(['subcategory', 'subcategoryId']);
        $this->reset(['name', 'description', 'status', 'category_id', 'user_id', 'company_id']);
        $this->status = true;
        $this->showActionModal = true;
    }

    // // mostrar modal para confirmar editar
    public function editActionModal(Subcategory $subcategory) {
        if($this->wihtoutCompany()){return;}
        $this->subcategory = $subcategory;
        $this->name = $subcategory['name'];
        $this->description = $subcategory['description'];
        $this->category_id = $subcategory['category_id'];
        $this->status = $subcategory['status'] == '1' ? true : false;
        $this->showActionModal = true;
    }

    // boton de guardar o editar
    public function save() {

        if($this->countSubcategories()){return;}
    
        $this->user_id = auth()->user()->id;
        $this->company_id = auth()->user()->company_id;
        $this->status = $this->status ? '1' : '0';

        $this->validate();
        
        if( isset( $this->subcategory['id'])) {

            $this->subcategory->update(
                $this->only(['name', 'description', 'status', 'category_id', 'user_id', 'company_id'])
            );
            session()->flash('messageSuccess', 'Actualizado');

        } else {

                Subcategory::create(
                    $this->only(['name', 'description', 'status', 'category_id', 'user_id', 'company_id'])
                );
                session()->flash('messageSuccess', 'Guardado');

        }

        $this->showActionModal = false;
    }

    public function render()
    {
        $categories = Category::where('company_id', auth()->user()->company_id)->get();
        $subcategories = Subcategory::where('company_id', auth()->user()->company_id)
                        ->when( $this->search, function($query) {
                            return $query->where(function( $query) {
                                $query->where('name', 'like', '%'.$this->search . '%');
                            });
                        })
                        ->when($this->active, function( $query) {
                            return $query->where('status', 1);
                        })
                        ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                        ->paginate(10);
        return view('livewire.page.subcategory-index', compact('subcategories', 'categories'));
    }
}
