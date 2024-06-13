<?php

namespace App\Livewire\Forms\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Form;

use function Ramsey\Uuid\v1;

class UserUpdateForm extends Form
{
    public ?User $user;

    public $uuid;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $active;
    public $role = [];
    public $userRoles = [];

    public function rules()
    {
        return [
            'name'     => [
                'nullable',
                'string',
                'max:50'
            ],
            'email'    => [
                'nullable',
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
            'active'  => [
                'nullable', 
                'boolean'
            ],
            'role'    => [
                'nullable', 
            ],
        ];
    }


    public function setUser(User $user)
    {
        $this->user      = $user->load('roles');
        $this->uuid      = $user->id;
        $this->name      = $user->name;
        $this->email     = $user->email;
        $this->password  = '';
        $this->active    = $user->active;
        $this->userRoles = $this->user->roles->pluck('id')->toArray();
        $this->role      = array_fill_keys($this->userRoles, true);
    }

    public function update()
    {        

        $this->validate();
        
        foreach($this->role as $k => $v) {

            if ($v == false ) {
                unset($this->role[$k]);
            }
        }

        if ($this->password == '') {

            $this->user->update($this->only(['name', 'email', 'active']));

        } else {

            $this->user->update($this->only(['name', 'email','password', 'active']));
       
        }


        $this->user->roles()->sync(array_keys($this->role));
    }
}
