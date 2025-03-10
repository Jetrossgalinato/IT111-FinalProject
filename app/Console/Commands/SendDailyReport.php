<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ReportService;

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
     * The ReportService instance.
     *
     * @var \App\Services\ReportService
     */
    protected $reportService;

    /**
     * Create a new command instance.
     *
     * @param \App\Services\ReportService $reportService
     * @return void
     */
    public function __construct(ReportService $reportService)
    {
        parent::__construct();
        $this->reportService = $reportService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->reportService->sendDailyReport();
        $this->info('Daily report sent successfully!');
        return 0;
    }
}
