<?php

namespace Tests\Feature;
use Mail;
use Log;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Mail\MailExample;
use Tests\TestCase;

class logTest extends TestCase
{
    /**
     * Checks if a log was written.
     */
    public function test_log_written(): void
    {
        Mail::fake();
        Mail::send(new MailExample());
        // keeping my different attempts commented out:
            
        // file_put_contents(storage_path('logs/laravel.log'), "");
        // Log::info('this is a test');
        // $this->app->setLaravel(app());
        // command('log');
        Log::shouldReceive('info')->once()->with(\Mockery::pattern('/this is a test/'));
        }

}
