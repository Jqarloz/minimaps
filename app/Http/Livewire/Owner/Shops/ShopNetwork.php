<?php

namespace App\Http\Livewire\Owner\Shops;

use App\Models\Network;
use App\Models\Shop;
use Livewire\Component;

class ShopNetwork extends Component
{

    public $shop, $network, $urltype, $urlHost;

    protected $rules = [
        'network.url' => 'required',
        'network.type' => 'required'
    ];

    //Variables para Form Crear
    public $urlNew, $typeNew;
    public $newNetwork = false;

    protected $listeners = ['changeSelect'];

    public function mount(Shop $shop)
    {
        $this->shop = $shop;
        $this->network = new Network();
    }

    public function edit(Network $network)
    {
        $this->network = $network;
        $this->urltype = $this->network->type;
        $this->getHost($this->urltype);
    }

    public function update()
    {
        $this->validate();
        $this->network->save();

        //Resetear variables
        $this->network = new Network();
        unset($this->urlHost);
        $this->shop = Shop::find($this->shop->id);
    }

    public function destroy(Network $network)
    {
        $network->delete();

        //Resetear variables
        $this->shop = Shop::find($this->shop->id);
    }

    public function changeSelect()
    {
        $this->emit('changeSelect'); 
        $this->urltype = $this->network->type;
        if ($this->newNetwork == true) {
            $this->urltype = $this->typeNew;
        }
        $this->getHost($this->urltype);
    }

    public function getHost($type)
    {
        switch ($type) {
            case 'facebook':
                $this->urlHost = 'facebook.com/';
                break;
            case 'instagram':
                $this->urlHost = 'instagram.com/';
                break;
            case 'twitter':
                $this->urlHost = 'twitter.com/';
                break;
            case 'tiktok':
                $this->urlHost = 'tiktok.com/';
                break;
            case 'linkedin':
                $this->urlHost = 'linkedin.com/in/';
                break;
            case 'youtube':
                $this->urlHost = 'youtube.com/channel/';
                break;
        };
    }

    public function create()
    {
        $this->newNetwork = true;
    }

    public function store()
    {
        $this->validate([
            'urlNew' => 'required',
            'typeNew' => 'required'
        ]);

        $this->shop->networks()->create([
            'url' => $this->urlNew,
            'type' => $this->typeNew
        ]);

        //update variables nuevamente
        $this->network = new Network();
        $this->shop = Shop::find($this->shop->id);
        unset($this->urlNew, $this->typeNew, $this->urlHost);
        $this->newNetwork = false;
    }

    public function render()
    {
        return view('livewire.owner.shops.shop-network');
    }
}
