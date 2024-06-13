<div>
    <div class="row mb-3">
        <div class="col-12 col-md-3 mb-2">
            <div class="col-auto d-none d-sm-block">
                <h5 class="text-muted">Informações Básicas <i class="far fa-long-arrow-alt-right"></i></h5>
            </div>
        </div>
        <div class="col-12 col-md-9 mb-2">
            <div class="card">
                <div class="card-body pb-2">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <div class="form-group">
                                <label wire:target="form.logo">
                                    <input type="file" hidden wire:model="form.photo" accept="image/*">
                                    @if ($form->photo)
                                        <img class="rounded pb-0 avatar avatar-xl border" src="{{ $form->photo->temporaryUrl() }}">
                                    @else
                                        <img class="rounded pb-0 avatar avatar-xl border" src="{{ orImage($form->logo, 'thumb.jpg') }}">
                                    @endif
                                </label>
                                @error('form.logo')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" placeholder="Nome"
                                wire:model="form.name" />
                            @error('form.name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" 
                wire:click.prevent="save"
                wire:loading.attr="disabled" 
                wire:target="save"
                class="btn btn-primary float-end">
                <span wire:loading.remove wire:target="save">Salvar</span>
                <span wire:loading wire:target="save">Salvando...</span>
            </button>

        </div>
    </div>


    @if (session()->has('message'))
        <livewire:components.alert color="success" message="{{ session('message') }}" />
    @endif
</div>
