<?php

namespace App\Livewire\Page;

use Livewire\Component;
use App\Models\Page\Product;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\Page\Subcategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class ProductIndex extends Component
{
    use WithPagination;
    use WithFileUploads;
    
    // variables de filtros
    public $active = true, $search = '', $sortBy = 'id', $sortAsc = false;

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
    public $price;
    #[Rule('required|numeric')]
    public $subcategory_id;

    #[Rule('required|numeric')]
    public $user_id;
    #[Rule('required|numeric')]
    public $company_id;

    #[Rule('nullable|string|max:3096')]
    public $image = '';
    #[Rule('nullable|image|max:3096')]
    public $image_nueva;

    // variables principales
    public $product, $productId;
    public $isSuggested;

    // resetear paginacion de filtros
    public function updatingActive() {$this->resetPage();}
    public function updatingSearch() {$this->resetPage();}

    // contar elementos de membresia
    public function countProducts() {
        $amount = count(Product::where('company_id', auth()->user()->company_id)->get());
        $membershipNumber = auth()->user()->company->membership->product;
        if($amount >= $membershipNumber){
            session()->flash('messageError', 'Excede la cantidad');
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
        'subcategory_id' => 'categoria',
        'price' => 'precio',
        'image' => 'imagen de producto',
    ];

    public function deleteImage(){
        if(Storage::exists('public/product/'.$this->image)){
            Storage::delete('public/product/'.$this->image);
        }
    }
    public function uploadImage(){
        if($this->image_nueva){
            $this->deleteImage();
            $name = time().'_'.auth()->user()->company_id.'.jpg';
            $image = Image::make($this->image_nueva);
            $image->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
        });
            $image->save(public_path('storage/product/'.$name));
            // $this->image_nueva->storeAs('public/image/', $name);
            $this->image = $name;
        }
    }

    // abrir modal y recibir id para borrar
    public function openDeleteModal($id){
        if($this->wihtoutCompany()){return;}
        $this->showDeleteModal = true;
        $this->productId = $id;
    }

    // eliminar desde el modal de confirmacion el producto
    public function deleteProduct() {
        $product = Product::findOrFail($this->productId);

        $this->image = $product['image'];
        $this->deleteImage();

        $product->delete();
        session()->flash('messageSuccess', 'Registro eliminado');
        $this->reset();

        $this->showDeleteModal = false;
    }

    // eliminar solo imagen del producto en editar
    public function deleteImageEdit() {
        $this->deleteImage();
        $this->image = '';
    }

    // mostrar modal para confirmar crear
    public function createActionModal() {
        if($this->wihtoutCompany()){return;}
        if($this->countProducts()){return;}
        $this->reset(['subcategory', 'subcategoryId']);
        $this->reset(['name', 'description', 'status', 'subcategory_id', 'price', 'image', 'image_nueva', 'user_id', 'company_id']);
        $this->status = true;
        $this->showActionModal = true;
    }

    // // mostrar modal para confirmar editar
    public function editActionModal(Product $product) {
        $this->reset(['subcategory', 'subcategoryId']);
        $this->reset(['name', 'description', 'status', 'subcategory_id', 'price', 'image', 'image_nueva', 'user_id', 'company_id']);
        if($this->wihtoutCompany()){return;}
        $this->product = $product;
        $this->name = $product['name'];
        $this->description = $product['description'];
        $this->subcategory_id = $product['subcategory_id'];
        $this->price = $product['price'];
        $this->status = $product['status'] == '1' ? true : false;
        $this->image = $product['image'];
        $this->showActionModal = true;
    }

    // boton de guardar o editar
    public function save() {
    
        if(!$this->product){
            if($this->countProducts()){return;}
        }
        

        $this->user_id = auth()->user()->id;
        $this->company_id = auth()->user()->company_id;
        $this->status = $this->status ? '1' : '0';

        $this->validate();

        $this->uploadImage();
        
        if( isset( $this->product['id'])) {

            $this->product->update(
                $this->only(['name', 'description', 'status', 'subcategory_id', 'price', 'image', 'user_id', 'company_id'])
            );
            $this->reset(['subcategory', 'subcategoryId']);
            $this->reset(['name', 'description', 'status', 'subcategory_id', 'price', 'image', 'image_nueva', 'user_id', 'company_id']);
            session()->flash('messageSuccess', 'Actualizado');

        } else {
            Product::create(
                $this->only(['name', 'description', 'status', 'subcategory_id', 'price', 'image', 'user_id', 'company_id'])
            );
            session()->flash('messageSuccess', 'Guardado');
        }

        $this->showActionModal = false;
    }



    public function render()
    {
        $subcategories = Subcategory::where('company_id', auth()->user()->company_id)->get();
        $products = Product::where('company_id', auth()->user()->company_id)
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
        return view('livewire.page.product-index', compact('subcategories', 'products'));
    }
}
