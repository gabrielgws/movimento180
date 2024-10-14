<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array<string, mixed> // Definindo o tipo do array
     */
    public array $invitation;

    /**
     * Create a new message instance.
     *
     * @param array<string, mixed> $invitation // Definindo o tipo do parâmetro
     */
    public function __construct(array $invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     *
     * @return static
     */
    public function build(): static
    {
        return $this->view('emails.team_invitation')
            ->with(['invitation' => $this->invitation]);
    }
}
