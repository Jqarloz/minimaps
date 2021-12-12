<x-owner-layout>

    <x-slot name="shop">
        {{$shop->slug}}
    </x-slot>

    <div>
        @livewire('owner.shops.shop-products', ['shop' => $shop], key('shop-products' . $shop->id))
    </div>

</x-owner-layout>