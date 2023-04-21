<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\PeringatanDini;
use App\Models\LaporanBencana;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $client = new Client();

        $response = $client->get('https://cuaca-gempa-rest-api.vercel.app/weather/sumatera-utara/balige');

        $data = json_decode($response->getBody(), true);

        $weather = collect($data['data']['params'])->map(function($cuaca) {
            if($cuaca['id'] == 'weather') {
                return $cuaca;
            }
        })->whereNotNull()->values();

        $cuaca = $weather[0]['times'];
         $newestReport = LaporanBencana::where('confirmed', true)->orderBy('created_at', 'desc')->limit(4)->get();
        $newestArtikel = Artikel::latest()->limit(4)->get();
        $newestPeringatan = PeringatanDini::latest()->first();

        return view('public\index', compact('cuaca', 'newestReport', 'newestArtikel','newestPeringatan'));
    }
}
