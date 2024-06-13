<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Rule;
use Masmerise\Toaster\Toaster;

class ForgotPassword extends Component
{
    #[Rule('required|string|max:120|email')] 
    public $email = '';
 
    protected $messages = [
        'email.required' => 'Informe o email da conta',
        'email.email'    => 'Informe um e-mail válido.',
    ];

    public function render()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink()
    {
        $this->validate();

        $status = Password::sendResetLink($this->only(['email']));

        if( $status === Password::RESET_LINK_SENT ) {

            Toaster::success('Link para redefinição de senha enviado para o email informado!');
          
        } else {

            Toaster::error(__($status));

        }
         
    }

}
