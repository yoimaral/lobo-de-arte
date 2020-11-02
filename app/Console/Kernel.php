<?php

namespace App\Console;

use App\Http\Controllers\OrderController;
use App\Order;
use App\Services\PaymentService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $orders = Order::estatus()->get();
            foreach ($orders as $order) {
                $paymentService = new PaymentService();
                $consul = $paymentService->getRequestInformation($order->requestId);
                $currentStatus = OrderController::currentStatus($consul['status']['status']);
                logger("$currentStatus");
                $order->status = $currentStatus;
                $order->save();
            }
        })->everyMinute();
        
        // $schedule->command('inspire')->hourly();
    }
    
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /* public function currentStatus($paymentStatus)
    {
        switch ($paymentStatus) {
            case PaymentService::P2P_APROBADO:
                return Order::APROBADO;
            case PaymentService::P2P_RECHAZADO:
                return Order::RECHAZADO;
            case PaymentService::P2P_PENDIENTE:
                return Order::PENDIENTE;
            default:
                return Order::PROCESANDO;
        }
    } */
}
