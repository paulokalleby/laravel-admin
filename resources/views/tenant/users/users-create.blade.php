@section('title', 'Cadastrar Usuário')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body pt-4">

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label text-md-end">Nome<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name" placeholder="Nome" wire:model="form.name" />
                            @error('form.name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label text-md-end">Email<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" placeholder="Email" wire:model="form.email" />
                            @error('form.email')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label text-md-end">Senha<span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="password" placeholder="Senha" wire:model="form.password" />
                            @error('form.password')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    @can('users.roles')
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label text-md-end">Papéis</label>
                            <div class="col-sm-9">
                                @foreach ($roles as $index => $item)
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input" type="checkbox"
                                            wire:model="form.role.{{ $item->id }}" id="role-{{ $item->id }}" />
                                        <label class="custom-control-label" for="role-{{ $item->id }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endcan

                    <div class="row mb-3">
                        <div class="col-sm-5 offset-sm-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="active"
                                    wire:model="form.active" />
                                <label class="form-check-label" for="active">Ativo</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10 offset-sm-2">
                            <button type="button" 
                                title="Salvar"
                                wire:click.prevent="store"
                                ire:loading.attr="disabled" 
                                class="btn btn-primary">
                                <span wire:loading.remove wire:target="store">Salvar</span>
                                <span wire:loading wire:target="store">Salvando...</span>
                            </button>
                            <a href="{{ route('users.index') }}" 
                                class="btn btn-link text-muted" 
                                title="Voltar"
                                wire:navigate>
                                Voltar
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
