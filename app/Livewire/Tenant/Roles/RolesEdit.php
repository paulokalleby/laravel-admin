<?php

namespace App\Livewire\Tenant\Roles;

use App\Livewire\Forms\Role\RoleUpdateForm;
use App\Models\Permission;
use App\Models\Resource;
use App\Models\Role;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class RolesEdit extends Component
{
    public RoleUpdateForm $form; 

    public $permissions;

    public function render()
    {
        return view('tenant.roles.roles-edit')->with([
            'resources' => Resource::with('permissions')->get()
        ]);
    }

    public function mount(Role $role)
    {
        $this->permissions = Permission::get();
        
        $this->form->setRole($role);
    }

    public function update() : void
    {
        $this->form->update();

        Toaster::success('Papel atualizado com sucesso!');
    }

    
    public function selectAll()
    {
        foreach($this->permissions as $permission) {
            $this->form->permission[$permission->id] = true;
        }     
    }

    public function clearSelection()
    {
        $this->form->permission = [];
    }

}
