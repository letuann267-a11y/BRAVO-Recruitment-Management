<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeleteMail extends Mailable{
    use Queueable,SerializesModels;
    
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function build ()
    {
        $user = User::where("id", $this->user->id)->first(); 
        return $this
            ->subject('Delete User')
            ->markdown('mail.delete-mail', [
                'name' => $user->name,
                'surname' => $user->surname, 
            ]);
    }
}