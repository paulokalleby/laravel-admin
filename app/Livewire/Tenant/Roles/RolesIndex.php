<?php

namespace App\Livewire\Tenant\Roles;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class RolesIndex extends Component
{
    use WithPagination;

    public $name   = '';
    public $status = '';
    public $pages  = 8;

    public function resetFilters()
    {
        $this->reset();
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('tenant.roles.roles-index')->with([
            'roles' => Role::with('users')
                ->where('name', 'like', '%' . $this->name . '%')
                ->where('active', 'like', '%' . $this->status . '%')
                ->orderBy('name', 'ASC')
                ->paginate($this->pages),
        ]);
    }

    public function delete(Role $role) : void
    {
        Toaster::success('Papel excluido com sucesso!');

        $role->permissions()->detach();
        $role->delete();
    }
}
