<?php

namespace App\Livewire\Tenant\Users;

use App\Livewire\Forms\User\UserUpdateForm;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UsersEdit extends Component
{
    public UserUpdateForm $form; 

    public $roles;

    public function render()
    {
        return view('tenant.users.users-edit');
    }

    public function mount(User $user)
    {
        $this->roles = Role::whereActive(true)->orderBy('name')->get();

        $this->form->setUser($user);
    }

    public function update() : void
    {
        $this->form->update();

        Toaster::success('Usuário atualizado com sucesso!');
    }
}
