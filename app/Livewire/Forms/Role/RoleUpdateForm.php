<?php

namespace App\Livewire\Forms\Role;

use App\Models\Role;
use App\Traits\HasUniqueField;
use Livewire\Form;

class RoleUpdateForm extends Form
{
    use HasUniqueField;

    public ?Role $role;

    public $uuid;
    public $name;
    public $active;
    public $permission = [];
    public $rolePermissions = [];

    public function rules()
    {
        return [
            'name'     => [
                'nullable',
                'string',
                'max:50',
                $this->unique('roles', $this->uuid),
            ],
            'active'  => [
                'nullable', 
                'boolean'
            ],
            'permission'    => [
                'nullable', 
                'array',
            ],
        ];
    }


    public function setRole(Role $role)
    {
        $this->role            = $role->load('permissions');
        $this->uuid            = $role->id;
        $this->name            = $role->name;
        $this->active          = $role->active;
        $this->rolePermissions = $this->role->permissions->pluck('id')->toArray();
        $this->permission      = array_fill_keys($this->rolePermissions, true);
    }

    public function update()
    {
        $this->validate();
        
        foreach($this->permission as $k => $v) {

            if ($v == false ) {
                unset($this->permission[$k]);
            }
        }
        
        $this->role->update($this->all());
        $this->role->permissions()->sync(array_keys($this->permission));
    }
}
