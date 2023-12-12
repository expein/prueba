<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class Api extends Controller
{

    public function getFlights(Request $request){

        //Request
        $departureCity = $request->input('departureCity');
        $arrivalCity = $request->input('arrivalCity');
        $date = $request->input('hour');
        
        $hour = Carbon::parse($date)->format('Y-m-d\TH:i:sO');

        $iataDepartureCity = $this->getIataDepartureCity($departureCity);
        $iataArrivalCity = $this->getIataArrivalCity($arrivalCity);
        
        //Data
        $data = [
            'searchs' => 250,
            'qtyPassengers' => 1,
            'adult' => 1,
            'itinerary' => [
                [
                    'departureCity' => $iataDepartureCity,
                    'arrivalCity' => $iataArrivalCity,
                    'hour' => $hour
                ]
            ]
        ];
        
        //GuzzlesHttp
        $client = new Client();

          $allFlightDetails = [];

        try{
            
            $response = $client->post("https://travelflight.pdtcomunicaciones.com/api/flights", [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);

            if($response->getStatusCode() == 200){

                $body = $response->getBody()->getContents();
                $responseData = json_decode($body, true);

                if (isset($responseData['data']['Seg1'])) {
                    foreach ($responseData['data']['Seg1'] as $seg) {
                        if (isset($seg['segments'])) {
                            foreach ($seg['segments'] as $flight) {
                                $flightDetails = [
                                    'dateOfDeparture' => $flight['productDateTime']['dateOfDeparture'],
                                    'timeOfDeparture' => $flight['productDateTime']['timeOfDeparture'],
                                    'dateOfArrival' => $flight['productDateTime']['dateOfArrival'],
                                    'timeOfArrival' => $flight['productDateTime']['timeOfArrival'],
                                    'departureCity' => $flight['location'][0]['locationId'],
                                    'arrivalCity' => $flight['location'][1]['locationId'],
                                    'marketingCarrier' => $flight['companyId']['marketingCarrier'],
                                    'flightOrtrainNumber' => $flight['flightOrtrainNumber'],
                                    // Agregar más propiedades según sea necesario
                                ];

                                $allFlightDetails[] = $flightDetails;
                            }
                        }
                    }
                }

                return view('flights')->with(compact('allFlightDetails'));
            }else {

                return response()->json(['success' => false, 'error' => 'Error en la solicitud'], $response->getStatusCode());
            }

        }catch(\Exception $e){

            return view('flights')->with(compact('allFlightDetails'));

        }
    }

    //Get departure city
    public function getIataDepartureCity($city)
    {
        ($city == "medellin")? $value = 1: $value = 0;

        $data = [
            'code' => $city
        ];

        $client = new Client();

        $iata = "";

        try {

            $response = $client->post("https://travelflight.pdtcomunicaciones.com/api/airports", [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);

            if ($response->getStatusCode() == 200) {

                $body = $response->getBody()->getContents();
                $responseData = json_decode($body, true);

                $iata = $responseData[$value]['iata'];

                return $iata;
            } else {

                return $iata;
            }
        } catch (\Exception $e) {
            return  $iata;
        }
    }

    //Get arrival city
    public function getIataArrivalCity($city)
    {
        ($city == "medellin") ? $value = 1 : $value = 0;

        $data = [
            'code' => $city
        ];

        $client = new Client();

        $iata = "";

        try {

            $response = $client->post("https://travelflight.pdtcomunicaciones.com/api/airports", [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);

            if ($response->getStatusCode() == 200) {

                $body = $response->getBody()->getContents();
                $responseData = json_decode($body, true);

                $iata = $responseData[$value]['iata'];

                return $iata;
            } else {

                return $iata;
            }
        } catch (\Exception $e) {
            return  $iata;
        }
    }
}
