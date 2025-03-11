<?php
//SendDailyReport is working properly
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\PaymentService;

class SendDailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:send-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily report email to users';

    /**
     * The PaymentService instance.
     *
     * @var \App\Services\PaymentService
     */
    protected $paymentService;

    /**
     * Create a new command instance.
     *
     * @param \App\Services\PaymentService $paymentService
     * @return void
     */
    public function __construct(PaymentService $paymentService)
    {
        parent::__construct();
        $this->paymentService = $paymentService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $this->paymentService->sendDailyReport();
            $this->info('Daily report sent successfully!');
        } catch (\Exception $e) {
            $this->error('Failed to send daily report: ' . $e->getMessage());
            return 1;
        }
        return 0;
    }
}
