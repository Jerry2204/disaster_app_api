<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\PeringatanDini;
use App\Models\RawanBencana;
use App\Models\LaporanBencana;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getWeather()
    {
        try {
            $client = new Client();

            $response = $client->get('https://cuaca-gempa-rest-api.vercel.app/weather/sumatera-barat/Batusangkar');

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
            $rawanBencana = RawanBencana::all();

            return view('public.index', compact('cuaca', 'newestReport', 'newestArtikel', 'newestPeringatan', 'rawanBencana'));
        } catch (Exception $e) {
            // Handle the error gracefully
            $cuaca = [];
            $newestReport = LaporanBencana::where('confirmed', true)->orderBy('created_at', 'desc')->limit(4)->get();
            $newestArtikel = Artikel::latest()->limit(4)->get();
            $newestPeringatan = PeringatanDini::latest()->first();
            $rawanBencana = RawanBencana::all();
            return view('public.index',  compact('cuaca', 'newestReport', 'newestArtikel', 'newestPeringatan', 'rawanBencana'));
        }
    }
}
