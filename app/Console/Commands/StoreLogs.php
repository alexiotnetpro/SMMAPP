<?php

namespace App\Console\Commands;

use App\Models\DeviceData;
use Illuminate\Console\Command;

class StoreLogs extends Command
{
    /**
     * Numele și semnătura comenzii de consolă.
     *
     * @var string
     */
    protected $signature = 'store:devicedata';

    /**
     * Descrierea comenzii de consolă.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execută comanda de consolă.
     *
     * @return int
     */
    public function handle()
    {
        // Definirea dispozitivelor și releelor aferente acestora
        $devices = [
            [
                'name' => 'dev1',
                'relay' => [0, 1]
            ],
            [
                'name' => 'dev2',
                'relay' => [0, 1]
            ],
            [
                'name' => 'dev3',
                'relay' => [0, 1, 2, 3]
            ],
            [
                'name' => 'dev4',
                'relay' => [0, 1]
            ],
        ];

        // Parcurge fiecare dispozitiv din listă
        foreach ($devices as $dev) {
            // Obține adresa dispozitivului
            $device = $this->getDeviceAdress($dev['name']);
            // Creează un client HTTP pentru a comunica cu dispozitivul
            $client = new \ShellyClient\HTTP\Client('http://' . $device);

            // Parcurge fiecare releu al dispozitivului
            foreach ($dev['relay'] as $relay) {
                try {
                    if ($device === env('SHELLYEM')) {
                        $meter = $client->getMeter($relay);

                        // Colectează datele de la contor
                        $data =  [
                            'power' => abs($meter->getPower()),
                            'voltage' => $meter->getVoltage(),
                            'reactive' => $meter->getReactive(),
                            'energy' =>  abs($meter->getTotal()) / 60
                        ];
                    } else {
                        $meter = $client->getStatus($relay);

                        // Colectează datele de la contor
                        $data =  [
                            'output' => $meter->getOutput(),
                            'voltage' => $meter->getVoltage(),
                            'current' => $meter->getCurrent(),
                            'temperature' => $meter->getTemperature()['tC'],
                            'power' => abs($meter->getApower())
                        ];
                    }

                    // Creează un nou obiect DeviceData și salvează datele
                    $logData = new DeviceData();
                    $logData->device = $dev['name'];
                    $logData->relay = $relay;
                    $logData->data = json_encode($data);
                    $logData->save();
                } catch (\Exception $e) {
                    // Afișează mesajul de eroare în caz de excepție
                    print_r($e->getMessage());
                }
            }
        }

        // Returnează succesul comenzii
        return Command::SUCCESS;
    }

    // Funcție privată pentru a obține adresa unui dispozitiv pe baza numelui său
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
}
