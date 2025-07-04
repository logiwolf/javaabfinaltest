<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Mail\OtpMail;





class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_request_password_reset_otp()
    {
        // Fake the mail system
        Mail::fake();

        // Create a test user
        $user = User::factory()->create([
            'email' => 'test@example.com',
        ]);

        // Send POST request to forgot-password route
        $response = $this->post(route('password.otp.send'), [
            'email' => 'test@example.com',
        ]);

        // Check redirection to OTP verify page
        $response->assertRedirect(route('password.otp.verify'));

        // Check OTP mail was sent
        Mail::assertSent(OtpMail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });

        // Check if OTP was stored in the custom table
        $this->assertDatabaseHas('password_resets_custom', [
            'email' => 'test@example.com',
        ]);
    }
}
