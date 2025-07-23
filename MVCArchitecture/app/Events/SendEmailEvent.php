<?php 

namespace MVCArchitecture\App\Events;

use MVCArchitecture\App\Models\User;

class SendEmailEvent{
    public function __construct(private User $user){        
    }
    public function toQueue(){    
        return json_encode([
            'email' => $this->user->email,
            'id' => $this->user->id,
            'job' => "sendEmail"
        ]);
    }
}