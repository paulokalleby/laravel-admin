<?php

namespace App\Livewire\Tenant\Roles;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class RolesShow extends Component
{
    public ?Role $role;

    public function render()
    {
        return view('tenant.roles.roles-show');
    }

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function detach(User $user)
    {
        Toaster::success('Usuário desvinculado com sucesso!');

        return  $this->role->users()->detach($user->id);
    }
}
