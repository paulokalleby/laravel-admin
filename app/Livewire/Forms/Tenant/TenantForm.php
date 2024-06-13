<?php

namespace App\Livewire\Forms\Tenant;

use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Form;

class TenantForm extends Form
{
    use WithFileUploads;
    
    public ?Tenant $tenant;

    public $uuid;
    public $logo;
    public $photo;
    public $name;

    public function rules()
    {
        return [
            'photo' => [
                'nullable', 
                'image', 
                'mimes:png,jpg,jpeg,webp', 
                'max:2048'
            ],
            'name' => [
                'required',
                'string',
                'max:50'
            ],
        ];
    }

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;
        $this->uuid   = $tenant->id;
        $this->name   = $tenant->name;
        $this->logo   = $tenant->logo;
    }

    public function update()
    {
        $this->validate();

        if ($this->photo) {

            if ($this->logo != null && Storage::disk('public')->exists($this->logo)) {

                Storage::disk('public')->delete($this->logo);
            }

            $this->logo = $this->photo->store(Auth::user()->tenant_id, 'public');
        }

        $this->tenant->update($this->all());

    }
}

