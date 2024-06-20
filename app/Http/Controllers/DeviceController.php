<?php

namespace App\Http\Controllers;

use App\Models\DeviceData;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // Funcția principală pentru a acționa asupra unui dispozitiv specific
    public function action(Request $request)
    {
        // Inițializare array pentru starea dispozitivului
        $status = [];
        // Preia numele dispozitivului din cererea HTTP
        $status['device'] = $request->input('device');
        // Preia acțiunea din cererea HTTP (on/off)
        $status['status'] = $request->input('action');
        // Determină acțiunea de trimis la dispozitiv (TURN_ON sau TURN_OFF)
        $act = $request->input('action') === 'on' ? \ShellyClient\Request\RelayRequest::TURN_ON : \ShellyClient\Request\RelayRequest::TURN_OFF;
        // Obține adresa dispozitivului pe baza numelui
        $device = $this->getDeviceAdress($request->input('device'));
        // Setează starea dispozitivului
        $this->setState($device, $act, $request->input('relay') ?? 0);
        // Returnează statusul dispozitivului
        return $status;
    }

    // Funcție privată pentru a seta starea unui dispozitiv specific
    private function setState($dev, $status, $relay = 0)
    {
        // Creează un client HTTP pentru a comunica cu dispozitivul
        $client = new \ShellyClient\HTTP\Client('http://' . $dev);
        // Trimite cererea pentru a schimba starea releului
        $client->getRelay($relay, $status);
    }

    // Funcție privată pentru a obține adresa unui dispozitiv pe baza numelui său
    private function getDeviceAdress($dev)
    {
        switch ($dev) {
            case 'dev1':
                // Adresa pentru dispozitivul dev1
                $device = env('SHELLYPRO2_1');
                break;
            case 'dev2':
                // Adresa pentru dispozitivul dev2
                $device = env('SHELLYPRO2_2');
                break;
            case 'dev3':
                // Adresa pentru dispozitivul dev3
                $device = env('SHELLYPRO4_1');
                break;
            case 'dev4':
                // Adresa pentru dispozitivul dev4
                $device = env('SHELLYEM');
                break;
        }
        // Returnează adresa dispozitivului
        return $device;
    }

    // Funcție pentru a obține informații despre un dispozitiv
    public function getInfo(Request $request)
    {
        // Obține adresa dispozitivului pe baza numelui său
        $device = $this->getDeviceAdress($request->input('device'));
        // Creează un client HTTP pentru a comunica cu dispozitivul
        $client = new \ShellyClient\HTTP\Client('http://' . $device);

        // Verifică dacă dispozitivul nu este de tip SHELLYEM
        if($device !== env('SHELLYEM')){
            // Obține statusul releului
            $meter = $client->getStatus($request->input('relay'));
            // Returnează informațiile despre dispozitiv
            return [
                'output' => $meter->getOutput(),
                'voltage' => $meter->getVoltage(),
                'current' => $meter->getCurrent(),
                'temperature' => $meter->getTemperature()['tC'],
                'power' => $meter->getApower()
            ];
        } else {
            // Dacă dispozitivul este de tip SHELLYEM, obține informațiile specifice acestuia
            $meter = $client->getMeter($request->input('relay'));
            // Returnează informațiile despre dispozitiv
            return [
                'power' => $meter->getPower(),
                'voltage' => $meter->getVoltage(),
                'reactive' => $meter->getReactive(),
                'energy' => $meter->getTotal()/60
            ];
        }
    }

    // Funcție pentru a obține istoricul datelor unui dispozitiv
    public function getHistory(Request $request)
    {
        // Returnează ultimele 1000 de înregistrări ale dispozitivului specificat, ordonate descrescător după data creării
        return DeviceData::where('device', $request->input('device'))->orderBy('created_at', 'desc')->limit(1000)->get();
    }
}
