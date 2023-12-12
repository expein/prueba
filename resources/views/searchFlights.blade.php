<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Busca tu vuelo</title>
    <link href="{{ asset('css/searchFlights.css') }}" rel="stylesheet">
    <script src="{{ asset('js/searchFlights.js') }}"></script>
    <script src="https://kit.fontawesome.com/b57527faac.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body onload="comprobation()" class="items-center" style="background-image: url('https://www.wallpaperflare.com/static/921/630/384/airplane-airport-chair-passenger-aircraft-wallpaper.jpg');">
    <div class="w-full">
        <div class="columns-auto text-center bg-blue-700 p-5">
            <h1 class="text-white roboto-mono text-5xl font-bold">Busca tu vuelo</h1>
        </div>
    </div>
    <div class="container w-1/2 text-center roboto-mono bg-white rounded-lg mx-auto p-5 mt-10 drop-shadow-lg">
        <form action="{{ url('/getFlights') }}" method="post" id="flightForm" onchange="comprobation()" onsubmit="showLoadingMessage()">
            @csrf
            <div class="flex justify-around mt-20">
                <div class="w-1/2 mr-5">
                    <label for="ciudad-origen" class="block text-gray-700 text-sm font-bold mb-2 text-3x2">Ciudad origen</label>
                    <input type="text" name="departureCity" id="departureCity" class="border border-black p-2 rounded-full text-center w-full">
                </div>
                <div class="w-1/2 ml-5">
                    <label for="ciudad-destino" class="block text-gray-700 text-sm font-bold mb-2 text-3x2">Ciudad destino</label>
                    <input type="text" name="arrivalCity" id="arrivalCity" class="border border-black p-2 rounded-full text-center w-full">
                </div>
            </div>
            <div class="row justify-content-around mt-10">
                <div class="w-full">
                    <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2 text-3x2">Fecha</label>
                    <input type="date" name="hour" id="hour" class="border border-black p-2 rounded-full text-center w-1/2">
                </div>
            </div>
            <div class="row justify-content-around mt-20">
                <div class="w-full">
                    <button type="submit" id="btnSearch" class="drop-shadow-lg bg-blue-700 hover:bg-blue-900 text-white py-2 px-4 rounded-full w-1/4 cursor-pointer">
                        <span><i class="fa-solid fa-magnifying-glass"></i></span> Buscar
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div id="loadingMessage" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center text-white">
        Cargando...
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>