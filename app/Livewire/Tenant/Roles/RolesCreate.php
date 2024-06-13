<?php

namespace App\Livewire\Tenant\Roles;

use App\Livewire\Forms\Role\RoleStoreForm;
use App\Models\Permission;
use App\Models\Resource;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class RolesCreate extends Component
{
    public RoleStoreForm $form; 

    public $permissions;

    public function render()
    {
        return view('tenant.roles.roles-create')->with([
            'resources' => Resource::with('permissions')->get()
        ]);
    }

    public function mount()
    {
        $this->permissions = Permission::get();
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

    public function store()
    {
        $this->form->store();

        Toaster::success('Papel cadastrado com sucesso!');
    }
}
