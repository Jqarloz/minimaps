<div class="card">
    <div class="card-body bg-gray-200">
        <header class="text-lg">Mapa:</header>
        {{$location->latitude}}

        @php
            $varLocation = $location->latitude . "," . $location->longitude;
            $url = "https://www.google.com/maps/dir/?api=1&destination=".$varLocation."&map_action=map&center=".$varLocation;
            $url2 = "https://maps.googleapis.com/maps/api/staticmap?center=".$varLocation."&zoom=15&size=600x300&maptype=roadmap&markers=color:red%7Clabel:".substr($location->address,0,1)."%7C".$varLocation."&key=AIzaSyBokaTHMOxzrIvuLG9rMUCJuY9bF0JwEjE"
        @endphp

        <div class="my-4">
            <center><img class="object-center" src="{{$url2}}" alt=""></center>
        </div>
        <div class="grid justify-items-center">
            <a class="btn btn-primary" target="blank" href="{{$url}}">Ver en Maps</a>
        </div>
    </div>
</div>
