<?php

namespace App\Livewire\Page;

use Livewire\Attributes\Rule;
use App\Models\Page\Company;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConfigIndex extends Component
{
        use WithFileUploads;


        // reglas de validacion
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
        #[Rule('nullable|string|max:2048')]
        public $image;
        #[Rule('nullable|image|max:2048')]
        public $image_nueva;
    
        // variables principales
        public $company, $companyId;
    
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
            'email' => 'email',
            'phone' => 'telefono',
            'adress' => 'direccion',
            'city' => 'ciudad',
            'social' => 'redes sociales',
            'description' => 'descripcion',
            'image' => 'imagen de portada',
        ];

        // mostrar modal para confirmar editar
        public function mount(Company $company) {
            $this->company = $company;
            $this->name = $company['name'];
            $this->email = $company['email'];
            $this->phone = $company['phone'];
            $this->adress = $company['adress'];
            $this->city = $company['city'];
            $this->social = $company['social'];
            $this->description = $company['description'];
            $this->image = $company['image'];
        }
    
        // boton de guardar o editar
        public function save() {
            if($this->wihtoutCompany()){return;}
    
            $this->validate();
            
            if($this->image_nueva){
                Storage::delete('public/image/'.$this->image);
                $name = time().'_'.auth()->user()->company_id.'.jpg';
                $this->image_nueva->storeAs('public/image/', $name);
                $this->image = $name;
            }

            $this->company->update(
                $this->only(['name', 'email', 'phone', 'adress', 'city', 'social', 'description', 'image'])
            );
            return redirect()->route('dashboard.index');
            session()->flash('messageSuccess', 'Actualizado');
        }

    public function render()
    {
        return view('livewire.page.config-index');
    }
}
