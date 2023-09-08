<?php

namespace App\Livewire\Page;

use App\Models\Page\Membership;
use Livewire\Component;
use App\Models\Page\Company;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class CompanyIndex extends Component
{
    use WithPagination;
    
    public $active = true, $search, $sortBy = 'id', $sortAsc = false;

    public $showActionModal = false;
    public $showDeleteModal = false;

    #[Rule('required|string|min:4')]
    public $name;
    #[Rule('required|email|min:4')]
    public $email;
    #[Rule('nullable|numeric|min:4')]
    public $phone;
    #[Rule('nullable|string|min:4')]
    public $adress;
    #[Rule('nullable|string|min:4')]
    public $city;
    #[Rule('nullable|string|min:4')]
    public $social;
    #[Rule('nullable|string|min:4')]
    public $description;
    #[Rule('numeric')]
    public $status;
    #[Rule('required|numeric')]
    public $membership_id;

    public $company, $companyId;

    public function updatingActive() {$this->resetPage();}
    public function updatingSearch() {$this->resetPage();}

    // renombrar variables a castellano
    protected $validationAttributes = [
        'name' => 'nombre',
        'email' => 'email',
        'phone' => 'telefono',
        'adress' => 'direccion',
        'city' => 'ciudad',
        'social' => 'redes sociales',
        'description' => 'descripcion',
        'status' => 'estado',
        'membership_id' => 'membresia',
    ];


    // abrir modal y recibir id
    public function openDeleteModal($id){
        $this->showDeleteModal = true;
        $this->companyId = $id;
    }
    
    // eliminar desde el modal de confirmacion
    public function deleteCompany() {
        $company = Company::findOrFail($this->companyId);

        $company->delete();
        session()->flash('messageSuccess', 'Registro eliminado');
        $this->reset();
        
        $this->showDeleteModal = false;
    }

    // mostrar modal para confirmar crear
    public function createActionModal() {
        $this->reset(['company', 'companyId']);
        $this->reset(['name', 'email', 'phone', 'adress', 'city', 'social', 'description', 'status', 'membership_id']);
        $this->status = true;
        $this->showActionModal = true;
    }

    // // mostrar modal para confirmar editar
    public function editActionModal(Company $company) {
        $this->company = $company;
        $this->name = $company['name'];
        $this->email = $company['email'];
        $this->phone = $company['phone'];
        $this->adress = $company['adress'];
        $this->city = $company['city'];
        $this->social = $company['social'];
        $this->description = $company['description'];
        $this->status = $company['status'] == '1' ? true : false;
        $this->membership_id = $company['membership_id'];
        $this->showActionModal = true;
    }

    // boton de guardar o editar
    public function save() {
    
        $this->status = $this->status ? '1' : '0';

        $this->validate();
        
        if( isset( $this->company['id'])) {

            $this->company->update(
                $this->only(['name', 'email', 'phone', 'adress', 'city', 'social', 'description', 'status', 'membership_id'])
            );
            session()->flash('messageSuccess', 'Actualizado');

        } else {

            Company::create(
                $this->only(['name', 'email', 'phone', 'adress', 'city', 'social', 'description', 'status', 'membership_id'])
            );
            session()->flash('messageSuccess', 'Guardado');
        }

        $this->showActionModal = false;
    }

    public function render()
    {
        $memberships = Membership::get();
        $companies = Company::when( $this->search, function($query) {
                            return $query->where(function( $query) {
                                $query->where('name', 'like', '%'.$this->search . '%');
                            });
                        })
                        ->when($this->active, function( $query) {
                            return $query->where('status', 1);
                        })
                        ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                        ->paginate(10);
        return view('livewire.page.company-index', compact('companies', 'memberships'));
    }
}
