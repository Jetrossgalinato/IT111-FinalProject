<?php


namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use App\Services\PaymentService;
use App\Console\Commands\SendDailyReport;

class SendDailyReportTest extends TestCase
{
    public function testSendDailyReport()
    {
        // Mock the PaymentService
        $paymentService = $this->createMock(PaymentService::class);
        $paymentService->expects($this->once())
            ->method('sendDailyReport')
            ->willReturn(null);

        // Replace the PaymentService in the container
        $this->app->instance(PaymentService::class, $paymentService);

        // Run the command
        Artisan::call('report:send-daily');

        // Check the output
        $output = Artisan::output();
        $this->assertStringContainsString('Daily report sent successfully!', $output);
    }
}
