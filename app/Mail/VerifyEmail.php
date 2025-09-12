<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\PendingUser;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public PendingUser $pendingUser;

    /**
     * Create a new message instance.
     */
    public function __construct(PendingUser $pendingUser)
    {
        $this->pendingUser = $pendingUser;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Verify your email')
                    ->view('emails.verify-email') // Твій Blade шаблон
                    ->with([
                        'token' => $this->pendingUser->email_verification_token,
                        'email' => $this->pendingUser->email,
                    ]);
    }

    

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
