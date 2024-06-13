<?php

namespace App\Livewire\Tenant\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class UsersIndex extends Component
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
        return view('tenant.users.users-index')->with([
            'users' => User::where('name', 'like', '%' . $this->name . '%')
                ->where('active', 'like', '%' . $this->status . '%')
                ->orderBy('name', 'ASC')
                ->paginate($this->pages),
        ]);
    }

    public function delete(User $user) : void
    {
        Toaster::success('Usuária excluido com sucesso!');
        
        $user->roles()->detach();
        $user->delete();
    }
}
