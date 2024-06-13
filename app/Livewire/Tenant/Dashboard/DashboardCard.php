<?php

namespace App\Livewire\Tenant\Dashboard;

use Livewire\Component;

class DashboardCard extends Component
{
    public $title = '';
    public $icon  = '';
    public $info  = '';
    
    public function render()
    {
        return view('tenant.dashboard.dashboard-card');
    }
}
