<?php

namespace App\Http\Livewire\Owner\Shops;

use App\Models\Product;
use App\Models\Shop;
use Livewire\Component;

class ShopProducts extends Component
{
    public $shop, $product;

    protected $rules = [
        'product.name' => 'required',
        'product.price' => 'required',
        'product.slug' => 'required',
        'product.description' => '',
        'product.image' => ''
    ];

    //Listeners para JS
    public $listeners = ['getSlugJS'];

    //Variables Modales
    public $editProduct, $newProduct;

    public function mount(Shop $shop)
    {
        $this->shop = $shop;
        $this->product = new Product();
        $this->editProduct = false;
    }

    public function edit(Product $product)
    {
        $this->product = $product;
        $this->editProduct = true;
    }

    public function update()
    {
        $this->validate();
        $this->product->save();

        //Resetear variables
        $this->product = new Product();
        $this->shop = Shop::find($this->shop->id);
        $this->editProduct = false;
    }

    public function closeEdit()
    {
        $this->editProduct = false;
    }

    public function getSlugJS($slug)
    {
        $this->product->slug = $slug;
    }

    public function render()
    {
        return view('livewire.owner.shops.shop-products');
    }
}
