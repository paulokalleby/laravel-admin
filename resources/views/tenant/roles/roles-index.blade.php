@section('title', 'Papéis')

<div>
    <div class="row mb-2">
        <div class="col-md-3">
            <input class="form-control mb-3" placeholder="Papel" type="text" wire:model.live="name" />
        </div>
        <div class="col-md-2">
            <select class="form-control form-select mb-3" 
                wire:model.live="status">
                <option value="">Status</option>
                <option value="1">Ativos</option>
                <option value="0">Inativos</option>
            </select>
        </div>
        <div class="col-md-7">
            <button type="button" 
                class="btn btn-light bg-white float-start mb-3" 
                title="Recarregar"
                wire:loading.attr="disabled"
                wire:click="resetFilters">
                <i wire:target="resetFilters" wire:loading.class="fa-pulse" class="fal fa-sync-alt"></i>
            </button>
            @can('roles.store')
                <a href="{{ route('roles.store') }}" 
                    class="btn btn-primary float-end mb-3" 
                    title="Cadastrar Papel"
                    wire:navigate>
                    <i class="fal fa-plus"></i> Cadastrar Papel
                </a>
            @endcan

        </div>
    </div>

    <div class="row">
        <div class="col-12">

            @if ($roles->isEmpty())
                <div class="card ">
                    <div class="card-body pb-0">
                        <p class="text-center py-2">Nenhum registro encontrado!</p>
                    </div>
                </div>
            @else
                <div class="card ">
                    <table class="table pb-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Vinculos</th>
                                <th>Atualizado</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @if($role->users->count() <= 1)
                                            {{ $role->users->count() }} Usuário
                                        @else
                                            {{ $role->users->count() }} Usuários
                                        @endif
                                    </td>
                                    <td>{{ $role->updated_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($role->active)
                                            <span class="badge rounded-pill badge-success-light">Ativo</span>
                                        @else
                                            <span class="badge rounded-pill badge-danger-light">Inativo</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        
                                        @can('roles.show')
                                            <a href="{{ route('roles.show', $role->id) }}" 
                                                class="btn btn-sm btn-light"
                                                title="Detalhes"
                                                wire:navigate>
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endcan

                                        @can('roles.update')
                                            <a href="{{ route('roles.update', $role->id) }}" 
                                                class="btn btn-sm btn-light"
                                                title="Editar"
                                                wire:navigate>
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        @endcan

                                        @can('roles.destroy')
                                            <button class="btn btn-sm btn-light" 
                                                @disabled($role->users->count() > 0)
                                                title="Excluir"
                                                wire:confirm="Deseja excluir registro?"
                                                wire:click.prevent="delete('{{ $role->id }}')">
                                                <i class=" fas fa-trash"></i>
                                            </button>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="d-flex justify-content-center">
                    {{ $roles->onEachSide(1)->links() }}
                </div>

            @endif

        </div>
    </div>

</div>
