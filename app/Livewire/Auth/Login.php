<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Masmerise\Toaster\Toaster;

class Login extends Component
{
    #[Rule('required|string|max:120|email')] 
    public $email = '';
 
    #[Rule('required|string|min:8|max:16')] 
    public $password = '';

    public $show = false;

    protected $messages = [
        'email.required'    => 'Informe seu email.',
        'email.email'       => 'Informe um e-mail válido.',
        'password.required' => 'Informe sua senha.',
    ];
    
    public function render()
    {
        return view('auth.login');
    }
    
    public function login()
    {
        $this->validate();

        if( Auth::attempt($this->only(['email', 'password'])) ) {;

            if( !Auth::user()->active ) {

                Auth::logout();

                Toaster::warning('A conta do usuário informado está inativa!');
            
            }

            $this->reset();

            Toaster::info('Seja bem vido(a) '.Auth::user()->name);
            
            return $this->redirect( route('home'), navigate: true);

        }

        Toaster::error('As credenciais fornecidas não correspondem a nenhum registro.');
    
    }
}
