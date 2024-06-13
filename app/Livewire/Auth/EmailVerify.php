<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Masmerise\Toaster\Toaster;

class EmailVerify extends Component
{
    public function render()
    {
        return view('auth.email-verify');
    }
    
    public function sendEmailVerification(Request $request) 
    {

        $request->user()->sendEmailVerificationNotification();

        Toaster::success('Um novo link de verificação foi enviado para o endereço de e-mail que você forneceu nas configurações do seu perfil');

    }

    public function logout()
    {
         Auth::logout();

         return $this->redirect( route('auth.login'), navigate: true);
    }
}
