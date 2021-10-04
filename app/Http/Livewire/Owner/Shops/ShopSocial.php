<?php

namespace App\Http\Livewire\Owner\Shops;

use App\Models\Contact;
use App\Models\Shop;
use Livewire\Component;

class ShopSocial extends Component
{

    public $shop, $contact, $network;

    protected $rules = [
        'contact.name' => 'required',
        'contact.type' => 'required'
    ];

    //Variables para Form Crear
    public $nameNew, $typeNew;
    public $newSocial = false;

    public function mount(Shop $shop)
    {
        $this->shop = $shop;
        $this->contact = new Contact();
    }

    public function edit(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function update()
    {
        $this->validate();
        $this->contact->save();

        //Resetear variables
        $this->contact = new Contact();
        $this->shop = Shop::find($this->shop->id);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        //Resetear variables
        $this->shop = Shop::find($this->shop->id);
    }

    public function create()
    {
        $this->newSocial = true;
    }

    public function store()
    {
        $this->validate([
            'nameNew' => 'required',
            'typeNew' => 'required'
        ]);

        $this->shop->contacts()->create([
            'name' => $this->nameNew,
            'type' => $this->typeNew
        ]);

        //update variables nuevamente
        $this->contact = new Contact();
        $this->shop = Shop::find($this->shop->id);
        unset($this->nameNew, $this->typeNew);
        $this->newSocial = false;
    }

    public function render()
    {
        return view('livewire.owner.shops.shop-social');
    }
}
