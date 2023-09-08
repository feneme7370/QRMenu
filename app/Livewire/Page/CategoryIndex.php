<?php

namespace App\Livewire\Page;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Page\Category;

class CategoryIndex extends Component
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
    #[Rule('numeric')]
    public $status;
    #[Rule('required|numeric')]
    public $user_id;
    #[Rule('required|numeric')]
    public $company_id;

    // variables principales
    public $category, $categoryId;

    // resetear paginacion de filtros
    public function updatingActive() {$this->resetPage();}
    public function updatingSearch() {$this->resetPage();}

    // contar elementos de membresia
    public function countCategories() {
        $amount = count(Category::where('company_id', auth()->user()->company_id)->get());
        $membershipNumber = auth()->user()->company->membership->category;
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
    ];

    // abrir modal y recibir id para borrar
    public function openDeleteModal($id){
        if($this->wihtoutCompany()){return;}
        $this->showDeleteModal = true;
        $this->categoryId = $id;
    }
    
    // eliminar desde el modal de confirmacion
    public function deleteCategory() {
        $category = Category::findOrFail($this->categoryId);

        if($category->subcategories->count() > 0){
            session()->flash('messageError', 'No se puede eliminar, tiene productos asignados');
            $this->reset();
        }else{
            $category->delete();
            session()->flash('messageSuccess', 'Registro eliminado');
            $this->reset();
        }
        $this->showDeleteModal = false;
    }

    // mostrar modal para confirmar crear
    public function createActionModal() {
        if($this->wihtoutCompany()){return;}
        if($this->countCategories()){return;}
        $this->reset(['category', 'categoryId']);
        $this->reset(['name', 'description', 'status', 'user_id', 'company_id']);
        $this->status = true;
        $this->showActionModal = true;
    }

    // // mostrar modal para confirmar editar
    public function editActionModal(Category $category) {
        if($this->wihtoutCompany()){return;}
        $this->category = $category;
        $this->name = $category['name'];
        $this->description = $category['description'];
        $this->status = $category['status'] == '1' ? true : false;
        $this->showActionModal = true;
    }

    // boton de guardar o editar
    public function save() {

        if($this->countCategories()){return;}
    
        $this->user_id = auth()->user()->id;
        $this->company_id = auth()->user()->company_id;
        $this->status = $this->status ? '1' : '0';

        $this->validate();
        
        if( isset( $this->category['id'])) {

            $this->category->update(
                $this->only(['name', 'description', 'status', 'user_id', 'company_id'])
            );
            session()->flash('messageSuccess', 'Actualizado');

        } else {

            Category::create(
                $this->only(['name', 'description', 'status', 'user_id', 'company_id'])
            );
            session()->flash('messageSuccess', 'Guardado');

        }

        $this->showActionModal = false;
    }

    
    public function render()
    {
        $categories = Category::where('company_id', auth()->user()->company_id)
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
        return view('livewire.page.category-index', compact('categories'));
    }
}
