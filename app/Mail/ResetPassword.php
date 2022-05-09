<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,$token)
    {
        $this->user=$user;
        $this->token=$token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Réinitialiser votre mot de passe')->view('Emails.forgot_password') ->with([
            'user' => $this->user,
            'token' => $this->token,
        ]);
    }
}
