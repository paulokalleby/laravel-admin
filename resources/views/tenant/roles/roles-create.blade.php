@section('title', 'Cadastrar Papel')

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

                    @can('roles.permissions')
                    <div class="row">
                        <label for="permissions" class="col-sm-2 col-form-label text-md-end">Permissões</label>
                        <div class="col-sm-9">
                            <div class="row mt-2">
                                <div class="col-12 mb-3">
                                    <button wire:click.prevent="selectAll" type="button" class="btn btn-sm btn-light btn-pill">
                                        Selecionar Tudo
                                    </button>
                                    <button wire:click.prevent="clearSelection" type="button" class="btn btn-sm btn-light btn-pill">
                                        Limpar Seleção
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($resources as $resource)
                                    <div class="col-md-2 mb-3">
                                        <h6 class="mb-2">{{ $resource->name }}</h6>
                                        @foreach ($resource->permissions as $index => $item)
                                            <div class="form-check form-switch_">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model="form.permission.{{ $item->id }}" id="permission-{{ $item->slug }}" />
                                                <label class="custom-control-label" for="permission-{{ $item->slug }}">
                                                    {{ $item->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
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
                                wire:loading.attr="disabled" 
                                class="btn btn-primary">
                                <span wire:loading.remove wire:target="store">Salvar</span>
                                <span wire:loading wire:target="store">Salvando...</span>
                            </button>
                            <a href="{{ route('roles.index') }}" 
                                title="Voltar"
                                class="btn btn-link text-muted" 
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
