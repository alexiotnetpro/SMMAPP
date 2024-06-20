<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

// Definirea clasei Kernel care extinde ConsoleKernel din Laravel
class Kernel extends ConsoleKernel
{
    /**
     * Definirea programului de execuție al comenzilor aplicației.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Programarea comenzii 'store:devicedata' pentru a se executa în fiecare minut,
        // fără a permite suprapunerea execuțiilor
        $schedule->command('store:devicedata')->everyMinute()->withoutOverlapping();
    }

    /**
     * Înregistrarea comenzilor pentru aplicație.
     *
     * @return void
     */
    protected function commands()
    {
        // Încarcă toate comenzile definite în directorul 'Commands'
        $this->load(__DIR__.'/Commands');

        // Include fișierul 'console.php' din directorul 'routes' pentru a înregistra rutele consolei
        require base_path('routes/console.php');
    }
}
