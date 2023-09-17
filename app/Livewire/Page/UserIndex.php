<?php

namespace App\Livewire\Page;

use App\Models\User;
use Livewire\Component;
use App\Models\Page\Role;
use App\Models\Page\Company;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class UserIndex extends Component
{
    use WithPagination;
    
    public $active = true, $search = '', $sortBy = 'id', $sortAsc = false;

    public $showActionModal = false;
    public $showDeleteModal = false;

    #[Rule('required|string|min:4')]
    public $name;
    #[Rule('nullable|string|min:4')]
    public $lastname;
    #[Rule('required|string|min:4')]
    public $email;
    #[Rule('nullable|string|min:4')]
    public $phone;
    #[Rule('nullable|string|min:4')]
    public $adress;
    #[Rule('nullable|string|min:4')]
    public $birthday;
    #[Rule('nullable|string|min:4')]
    public $city;
    #[Rule('nullable|string|min:4')]
    public $social;
    #[Rule('required|string|min:4')]
    public $description;
    #[Rule('numeric')]
    public $status;
    #[Rule('required|numeric')]
    public $company_id;
    #[Rule('required|numeric')]
    public $role_id;

    public $user, $userId;

    public function updatingActive() {$this->resetPage();}
    public function updatingSearch() {$this->resetPage();}

    // renombrar variables a castellano
    protected $validationAttributes = [
        'name' => 'nombre',
        'lastname' => 'apellido',
        'email' => 'email',
        'phone' => 'telefono',
        'adress' => 'direccion',
        'birthday' => 'fecha de nacimiento',
        'city' => 'ciudad',
        'social' => 'redes sociales',
        'description' => 'descripcion',
        'status' => 'estado',
        'company_id' => 'empresa',
        'role_id' => 'rol',
    ];


    // abrir modal y recibir id
    public function openDeleteModal($id){
        $this->showDeleteModal = true;
        $this->userId = $id;
    }
    
    // eliminar desde el modal de confirmacion
    public function deleteCompany() {
        $user = User::findOrFail($this->userId);

        $user->delete();
        session()->flash('messageSuccess', 'Registro eliminado');
        $this->reset();
        
        $this->showDeleteModal = false;
    }

    // mostrar modal para confirmar crear
    public function createActionModal() {
        $this->reset(['company', 'companyId']);
        $this->reset(['name', 'lastname', 'email', 'phone', 'adress', 'birthday', 'city', 'social', 'description', 'status', 'company_id', 'role_id']);
        $this->status = true;
        $this->showActionModal = true;
    }

    // // mostrar modal para confirmar editar
    public function editActionModal(User $user) {
        $this->user = $user;
        $this->name = $user['name'];
        $this->lastname = $user['lastname'];
        $this->email = $user['email'];
        $this->phone = $user['phone'];
        $this->birthday = $user['birthday'];
        $this->adress = $user['adress'];
        $this->city = $user['city'];
        $this->social = $user['social'];
        $this->description = $user['description'];
        $this->status = $user['status'] == '1' ? true : false;
        $this->company_id = $user['company_id'];
        $this->role_id = $user['role_id'];
        $this->showActionModal = true;
    }

    // boton de guardar o editar
    public function save() {
    
        $this->status = $this->status ? '1' : '0';

        $this->validate();
        
        if( isset( $this->user['id'])) {

            $this->user->update(
                $this->only(['name', 'lastname', 'email', 'phone', 'adress', 'birthday', 'city', 'social', 'description', 'status', 'company_id', 'role_id'])
            );
            session()->flash('messageSuccess', 'Actualizado');

        } else {

            User::create(
                $this->only(['name', 'lastname', 'email', 'phone', 'adress', 'birthday', 'city', 'social', 'description', 'status', 'company_id', 'role_id'])
            );
            session()->flash('messageSuccess', 'Guardado');
        }

        $this->showActionModal = false;
    }

    public function render()
    {
        $companies = Company::get();
        $roles = Role::get();
        $users = User::when( $this->search, function($query) {
                            return $query->where(function( $query) {
                                $query->where('name', 'like', '%'.$this->search . '%');
                            });
                        })
                        ->when($this->active, function( $query) {
                            return $query->where('status', 1);
                        })
                        ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                        ->paginate(10);
        return view('livewire.page.user-index', compact('companies', 'roles', 'users'));
    }
}
