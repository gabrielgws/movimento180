<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\TeamInvitation; // Importe o modelo

class TeamInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;

    /**
     * Create a new message instance.
     */
    public function __construct(TeamInvitation $invitation) // Aceitando TeamInvitation
    {
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Team Invitation')
            ->view('emails.team-invitation')
            ->with([
                'invitation' => $this->invitation,
                'acceptUrl' => route('accept.team-invitation', ['invitation' => $this->invitation->id]),
            ]);

    }

}
