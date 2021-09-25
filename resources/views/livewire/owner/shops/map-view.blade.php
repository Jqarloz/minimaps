<div class="card">
    <div class="card-body bg-gray-200 w-full">
        @php
            $varLocation = $location->latitude . "," . $location->longitude;
            $url = "https://www.google.com/maps/dir/?api=1&destination=".$varLocation."&map_action=map&center=".$varLocation;
            $url2 = "https://maps.googleapis.com/maps/api/staticmap?center=".$varLocation."&zoom=15&size=640x300&maptype=roadmap&markers=color:red%7Clabel:".substr($location->address,0,1)."%7C".$varLocation."&key=AIzaSyCt2VU9zcFfJojsNYjrYhC15kmZNQJRmks&map_id=19190b11ce75aea2"
        @endphp

        <div class="my-4 w-full">
            <center><img class="object-center" src="{{$url2}}" alt=""></center>
        </div>
        <div class="grid justify-items-center">
            <a class="btn btn-primary" target="blank" href="{{$url}}">Ver en Maps</a>
        </div>
    </div>
</div>
