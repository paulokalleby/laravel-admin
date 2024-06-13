<?php

namespace App\Livewire\Auth;

use App\Models\Tenant;
//use Illuminate\Auth\Events\Registered;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Register extends Component
{
    #[Rule('required|string|min:3|max:50|unique:tenants,name')] 
    public $business = '';

    #[Rule('required|string|min:3|max:50')] 
    public $name = '';

    #[Rule('required|string|max:120|email')] 
    public $email = '';
 
    #[Rule('required|string|min:8|max:16')] 
    public $password = '';

    public $show = false;

    protected $messages = [
        'business.required'  => 'Informe o nome do seu negócio',
        'business.unique'    => 'Nome do negócio não disponível',
        'name.required'      => 'Informe o seu nome',
        'email.required'     => 'Email é obrigatório.',
        'email.unique'       => 'Email já cadastrado.',
        'email.email'        => 'Informe um e-mail válido.',
        'password.required'  => 'Senha é obrigatório.',
    ];
    
    public function render()
    {
        return view('auth.register');
    }

    public function store() : void
    {  
        $this->validate();
        
        $tenant = Tenant::create([
            'name' => $this->business,
        ]);
        
        $tenant->users()->create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => $this->password,
            'owner'    => true,
        ]);

        //event(new Registered($user));
        Toaster::success('Registro realizado com sucesso! para proseguir, basta realizar o login');
        
        $this->reset();

        //Auth::login($user);

        //return redirect()->route('subscribe');
    }
}
