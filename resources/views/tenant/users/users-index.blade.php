@section('title', 'Usuários')

<div>
    <div class="row mb-2">
        <div class="col-md-3">
            <input class="form-control mb-3" placeholder="Pesquisar" type="text" wire:model.live="name" />
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
            @can('users.store')
                <a href="{{ route('users.store') }}" 
                    class="btn btn-primary float-end mb-3" 
                    title="Cadastrar Usuário"
                    wire:navigate>
                    <i class="fal fa-plus"></i> Cadastrar Usuário
                </a>
            @endcan
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            @if ($users->isEmpty())
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
                                <th>Email</th>
                                <th>Atualizado</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($user->active)
                                            <span class="badge rounded-pill badge-success-light">Ativo</span>
                                        @else
                                            <span class="badge rounded-pill badge-danger-light">Inativo</span>
                                        @endif
                                    </td>
                                    <td class="text-end">

                                        @can('users.show')
                                            <a href="{{ route('users.show', $user->id) }}" 
                                                class="btn btn-sm btn-light" 
                                                title="Detalhes"
                                                wire:navigate>
                                                <i class="align-middle fas fa-eye"></i>
                                            </a>
                                        @endcan

                                        @can('users.update')
                                            <a href="{{ route('users.update', $user->id) }}" 
                                                class="btn btn-sm btn-light" 
                                                title="Editar"
                                                wire:navigate>
                                                <i class="align-middle fas fa-pen"></i>
                                            </a>
                                        @endcan

                                        @can('users.destroy')
                                            <button class="btn btn-sm btn-light" 
                                                @disabled($user->owner)
                                                title="Excluir"
                                                wire:confirm="Deseja excluir o rigistro?"
                                                wire:click.prevent="delete('{{ $user->id }}')">
                                                <i class=" fas fa-trash"></i>
                                            </button>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                {{ $users->links() }}

            @endif
        </div>
    </div>

</div>
