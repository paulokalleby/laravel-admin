<?php

namespace App\Livewire\Forms\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Form;

class UserStoreForm extends Form
{
    public $uuid;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $active = true;
    public $role = [];

    public function rules()
    {
        return [
            'name'     => [
                'required', 
                'string', 
                'max:50'
            ],
            'email'    => [
                'required', 
                'string', 
                'max:120', 
                'email', 
                Rule::unique('users')
            ],
            'password' => [
                'required', 
                'same:password_confirmation', 
                'min:8', 
                'max:16'
            ],
            'password_confirmation'  => [
                'required', 
                'same:password'
            ],
            'active'  => [
                'nullable', 
                'boolean'
            ],
            'role'    => [
                'nullable', 
            ],
        ];
    }

    public function store()
    {
        $this->validate();
 
        $user = User::create($this->all());
 
        $user->roles()->attach(array_keys($this->role));

        $this->reset();
    }
}
