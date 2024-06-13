<?php

namespace App\Livewire\Tenant\Dashboard;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class DashboardIndex extends Component
{
    public $search = '';
    
    public function render()
    {
        return view('tenant.dashboard.dashboard-index')->with([
            'roles' => Role::count(),
            'users' => User::count(),
        ]);
    }
}
