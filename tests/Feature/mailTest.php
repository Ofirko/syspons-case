<?php

namespace Tests\Feature;
use Mail;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Mail\MailExample;
use Tests\TestCase;

class mailTest extends TestCase
{
    /**
     * Checks if a mail was sent.
     */
    public function test_mail_sent(): void
    {
        Mail::fake();
        Mail::send(new MailExample());

        Mail::assertSent(MailExample::class);
    }

}
