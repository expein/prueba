<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuelos</title>
    <link href="{{ asset('css/searchFlights.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b57527faac.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>

<body class=" roboto-mono">
    <div class="w-full bg-blue-700 flex text-white">
        <div class="w-full text-start p-5">
            <a href="{{ url('/') }}" class="text-white roboto-mono text-4xl font-bold">Travels</i></a>
        </div>
    </div>
    @if(count($allFlightDetails) > 0)
    <div class="w-full text-white">
        <div class="w-full text-center p-5">
            <h1 class="font-bold text-5xl text-gray-700">Vuelos disponibles</h1>
        </div>
        @foreach($allFlightDetails as $flightDetails)
        <div class="flex border border-gray-400 bg-white m-10 rounded-lg drop-shadow-lg hover:bg-gray-200">
            <div class="bg-blue-700 w-1/4 p-20 text-center justify-center text-white rounded-l-lg drop-shadow-lg">
                <div>
                    <i class="fa-solid fa-plane-departure text-5xl"></i>
                </div>
                <div class="rounded-lg p-10 w/2 flex justify-center">
                    <img src="https://pics.avs.io/60/60/{{ $flightDetails['marketingCarrier'] }}.png" class="bg-white p-5 rounded-lg" alt="">
                </div>
            </div>
            <div class="text-black rounded-lg p-10 m-10 w-1/2 text-center">
                <div class="flex justify-around">
                    <div>
                        <strong>Fecha y hora de salida</strong><br> {{ $flightDetails['dateOfDeparture'] }} {{ $flightDetails['timeOfDeparture'] }}<br>
                    </div>
                    <div>
                        <strong>Fecha y hora de llegada</strong><br> {{ $flightDetails['dateOfArrival'] }} {{ $flightDetails['timeOfArrival'] }}<br>
                    </div>
                </div>
                <div class="flex justify-around mt-5">
                    <div>
                        <strong>Aerolinea</strong><br> {{ $flightDetails['marketingCarrier'] }}<br>
                    </div>
                    <div>
                        <strong>Numero de vuelo</strong><br> {{ $flightDetails['flightOrtrainNumber'] }}<br>
                    </div>
                </div>
                <div class="flex justify-around mt-5">
                    <div>
                        <strong>Cidad de salida</strong><br> {{ $flightDetails['departureCity'] }}<br>
                    </div>
                    <div>
                        <strong>Ciudad de llegada</strong><br> {{ $flightDetails['arrivalCity'] }}<br>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <h1 class="text-center text-red-700 text-4xl mt-20">No se encontraron vuelos disponibles</h1>
    @endif
</body>

</html>