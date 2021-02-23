<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        @php
            $color = 'red';
            $alert = 'alert';
        @endphp

        <div class="container mx-auto">
            <x-alert :color="$color" class="mb-4">
                <x-slot name="title">
                    Titulo Alert
                </x-slot>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis tempora porro est ea suscipit in reiciendis ullam odit consequatur deleniti voluptas numquam veritatis quibusdam corrupti temporibus dicta, aliquam quia magnam!
            </x-alert>

            <x-alert2 color="green" class="mb-4">
                <x-slot name="title">Titulo Alert2</x-slot>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur praesentium delectus eius voluptatum. Temporibus harum doloremque id hic at. Beatae enim incidunt, eius quam iste amet tempora voluptatibus placeat eum?
            </x-alert2>

            <x-dynamic-component :component="$alert">
                <x-slot name="title">Titulo Alert3</x-slot>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur praesentium delectus
            </x-dynamic-component>
        </div>
    </body>
</html>
