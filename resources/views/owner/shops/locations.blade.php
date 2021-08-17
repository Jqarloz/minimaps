<x-owner-layout>

    <x-slot name="shop">
        {{$shop->slug}}
    </x-slot>

    <div>
        @livewire('owner.shops.shop-locations', ['shop' => $shop], key('shop-locations' . $shop->id))
    </div>

</x-owner-layout>