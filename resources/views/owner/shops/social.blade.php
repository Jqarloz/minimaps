<x-owner-layout>

    <x-slot name="shop">
        {{$shop->slug}}
    </x-slot>

    <div>
        @livewire('owner.shops.shop-social', ['shop' => $shop], key('shop-social' . $shop->id))
    </div>

</x-owner-layout>