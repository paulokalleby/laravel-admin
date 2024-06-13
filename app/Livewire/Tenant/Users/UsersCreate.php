<?php

namespace App\Livewire\Tenant\Users;

use App\Livewire\Forms\User\UserStoreForm;
use App\Models\Role;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UsersCreate extends Component
{
    public UserStoreForm $form; 

    public $roles;

    public function render()
    {
        return view('tenant.users.users-create');
    }

    public function store() : void
    {
        $this->form->store();

        Toaster::success('Usuário cadastrado com sucesso!');
    }

    public function mount()
    {
        $this->roles = Role::whereActive(true)->orderBy('name')->get();
    }
}
