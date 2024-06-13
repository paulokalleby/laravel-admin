<div>
    <div class="row">
        <div class="col-12 col-md-3 mb-3">
            <div class="col-auto d-none d-sm-block">
                <h5 class="text-muted">Meus dados <i class="far fa-long-arrow-alt-right"></i></h5>
            </div>
        </div>
        <div class="col-12 col-md-9 mb-3">
            <div class="card">
                <div class="card-body pb-2">
                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" placeholder="Nome"
                                wire:model="form.name" />
                            @error('form.name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email"
                                wire:model="form.email" />
                            @error('form.email')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" placeholder="Senha"
                                wire:model="form.password" />
                            @error('form.password')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="password_confirmation" class="form-label">Confirmação da senha</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                placeholder="Confirmação da senha" wire:model="form.password_confirmation" />
                            @error('form.password_confirmation')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <button type="button" 
                wire:click.prevent="save"
                wire:loading.attr="disabled" 
                class="btn btn-primary float-end">
                <span wire:loading.remove>Salvar</span>
                <span wire:loading wire:target="save">Salvando...</span>
            </button>
        </div>
    </div>


    @if (session()->has('message'))
        <livewire:components.alert color="success" message="{{ session('message') }}" />
    @endif
</div>
