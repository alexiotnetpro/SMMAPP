<?php

namespace App\Console\Commands;

use App\Models\DeviceData;
use Illuminate\Console\Command;

class StoreLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:devicedata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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

        foreach ($devices as $dev) {
            $device = $this->getDeviceAdress($dev['name']);
            $client = new \ShellyClient\HTTP\Client('http://' . $device);
            foreach ($dev['relay'] as $relay) {
                try {
                    if ($device === env('SHELLYEM')) {
                        $meter = $client->getMeter($relay);

                        $data =  [
                            'power' => abs($meter->getPower()),
                            'voltage' => $meter->getVoltage(),
                            'reactive' => $meter->getReactive(),
                            'energy' =>  abs($meter->getTotal()) / 60
                        ];
                    } else {
                        $meter = $client->getStatus($relay);

                        $data =  [
                            'output' => $meter->getOutput(),
                            'voltage' => $meter->getVoltage(),
                            'current' => $meter->getCurrent(),
                            'temperature' => $meter->getTemperature()['tC'],
                            'power' => abs($meter->getApower())
                        ];
                    }

                    $logData = new DeviceData();
                    $logData->device = $dev['name'];
                    $logData->relay = $relay;
                    $logData->data = json_encode($data);
                    $logData->save();
                } catch (\Exception $e) {
                    print_r($e->getMessage());
                }
            }
        }

        return Command::SUCCESS;
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
}
