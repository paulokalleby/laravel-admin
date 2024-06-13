<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Masmerise\Toaster\Toaster;

class ResetPassword extends Component
{
    #[Rule('required')] 
    public $token;

    #[Rule('required|string|max:120|email')] 
    public $email = '';
 
    #[Rule('required|string|min:8|max:16')] 
    public $password = '';

    #[Rule('required|same:password')] 
    public $password_confirmation;

    protected $queryString = ['token'];

    protected $messages = [
        'email.required'    => 'Informe o email da conta.',
        'email.email'       => 'Informe um e-mail válido.',
        'password.required' => 'Informe sua nova senha.',
        'password_confirmation.required' => 'Informe a confirmação de senha.',
    ];

    public function render()
    {
        return view('auth.reset-password');
    }
    
    public function resetPassword()
    {

        $this->validate();

        $status = Password::reset($this->only(['token', 'email', 'password', 'password_confirmation']), 
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));    
            }
        );

        if( $status == Password::PASSWORD_RESET ) {

            Toaster::success('Senha redefinida com sucesso!');
          
        } else {

            Toaster::error(__($status));

        }

    }
}
