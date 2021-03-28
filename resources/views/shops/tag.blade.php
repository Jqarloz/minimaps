<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold"> Etiqueta: {{$tag->name}}</h1>
        @foreach ($shops as $shop)
            <x-card-shops :shop="$shop" />
        @endforeach

        <div class="mt-4">
            {{$shops->links()}}
        </div>
    </div>
</x-app-layout>