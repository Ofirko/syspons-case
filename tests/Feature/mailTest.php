<?php

namespace Tests\Feature;
use Mail;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class mailTest extends TestCase
{
    /**
     * Checks if a mail was sent.
     */
    public function test_mailsent(): void
    {
        Mail::fake();

        Mail::assertSent(UserInvite::class);
    }

}
