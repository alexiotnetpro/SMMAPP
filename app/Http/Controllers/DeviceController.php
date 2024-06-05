<?php

namespace App\Http\Controllers;

use App\Models\DeviceData;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    //
    public function action(Request $request)
    {

        $status = [];
        $status['device'] = $request->input('device');
        $status['status'] = $request->input('action');
        $act = $request->input('action') === 'on' ? \ShellyClient\Request\RelayRequest::TURN_ON : \ShellyClient\Request\RelayRequest::TURN_OFF;
        $device = $this->getDeviceAdress($request->input('device'));
        $this->setState($device, $act, $request->input('relay') ?? 0);
        return $status;
    }

    private function setState($dev, $status, $relay = 0)
    {
        $client = new \ShellyClient\HTTP\Client('http://' . $dev);
        $client->getRelay($relay, $status);
    }

    private function getDeviceAdress($dev)
    {
        switch ($dev) {
            case 'dev1':
                $device = env('SHELLYPRO2_1');

                break;
            case 'dev2':
                $device = env('SHELLYPRO2_2');

                break;
            case 'dev3':
                $device = env('SHELLYPRO4_1');

                break;
            case 'dev4':
                $device = env('SHELLYEM');

                break;
        }
        return $device;
    }

    public function getInfo(Request $request)
    {
        $device = $this->getDeviceAdress($request->input('device'));
        $client = new \ShellyClient\HTTP\Client('http://' . $device);
        if($device !== env('SHELLYEM')){
            $meter = $client->getStatus($request->input('relay'));
            return [
                'output' => $meter->getOutput(),
                'voltage' => $meter->getVoltage(),
                'current' => $meter->getCurrent(),
                'temperature' => $meter->getTemperature()['tC'],
                'power' => $meter->getApower()
            ];
        } else {
            $meter = $client->getMeter($request->input('relay'));
            return [
                'power' => $meter->getPower(),
                'voltage' => $meter->getVoltage(),
                'reactive' => $meter->getReactive(),
                'energy' => $meter->getTotal()/60
            ];
        }



    }

    public function getHistory(Request $request)
    {
        return DeviceData::where('device', $request->input('device'))->orderBy('created_at', 'desc')->limit(1000)->get();
    }
}
