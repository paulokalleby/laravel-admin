<?php

namespace App\Livewire\Forms\Role;

use App\Models\Role;
use App\Traits\HasUniqueField;
use Livewire\Form;

class RoleStoreForm extends Form
{
    use HasUniqueField;

    public $uuid;
    public $name;
    public $active = true;
    public $permission = [];

    public function rules()
    {
        return [
            'name'     => [
                'required', 
                'string', 
                'max:50',
                $this->unique('roles'),
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

    public function store()
    {
        $this->validate();
 
        $role = Role::create($this->all());

        $role->permissions()->attach(array_keys($this->permission));
 
        $this->reset(); 
    }
}
