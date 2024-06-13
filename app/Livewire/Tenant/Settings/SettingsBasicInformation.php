<?php

namespace App\Livewire\Tenant\Settings;

use App\Livewire\Forms\Tenant\TenantForm;
use App\Traits\HasAuthenticatedUser;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class SettingsBasicInformation extends Component
{

    use HasAuthenticatedUser, WithFileUploads;
    
    public TenantForm $form; 

    public function render()
    {
        return view('tenant.settings.settings-basic-information');
    }
    
    public function mount()
    {   
        $this->form->setTenant($this->getTenant());
    }

    public function save() : void
    {

        $this->validate();

        $this->form->update();
        
        Toaster::success('Informações atualizadas com sucesso!');

    }
}
