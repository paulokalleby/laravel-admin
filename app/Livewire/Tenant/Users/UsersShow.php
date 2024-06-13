<?php

namespace App\Livewire\Tenant\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UsersShow extends Component
{
    public ?Role $role;
    public ?User $user;
    
    public function render()
    {
        return view('tenant.users.users-show')->with([
            'roles' => $this->user->roles,
        ]);
    }
    
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function detach(Role $role) 
    {
        Toaster::success('Papel desvinculado com sucesso!');

       return  $this->user->roles()->detach($role->id);
    }
}
