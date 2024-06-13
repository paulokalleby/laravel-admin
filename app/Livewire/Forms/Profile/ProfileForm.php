<?php

namespace App\Livewire\Forms\Profile;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Form;

class ProfileForm extends Form
{
    
    public ?User $user;

    public $uuid;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

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
                Rule::unique('users')->ignore($this->user)
            ],
            'password' => [
                'nullable',
                'same:password_confirmation',
                'min:8',
                'max:16'
            ],
            'password_confirmation'  => [
                'nullable', 
                'same:password'
            ],
        ];
    }


    public function setUser(User $user)
    {
        $this->user      = $user;
        $this->uuid      = $user->id;
        $this->name      = $user->name;
        $this->email     = $user->email;
        $this->password  = '';
    }

    public function update()
    {        
        if ($this->password == '') {

            $this->user->update($this->only(['name', 'email']));

        } else {
            
            $this->user->update($this->only(['name', 'email', 'password']));
       
        }
    }
}
