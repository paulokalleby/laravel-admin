@section('title', 'Detalhes do Papel')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-0">
                    <dl class="row pb-0">
                        <dt class="col-sm-2 text-md-end">UUID</dt>
                        <dd class="col-sm-10">{{ $role->id }}</dd>
                        <dt class="col-sm-2 text-md-end">Nome</dt>
                        <dd class="col-sm-10">{{ $role->name }}</dd>
                        <dt class="col-sm-2 text-md-end">Atualizado</dt>
                        <dd class="col-sm-10">{{ $role->updated_at->diffForHumans() }}</dd>
                        <dt class="col-sm-2 text-md-end">Status</dt>
                        <dd class="col-sm-10">
                            @if ($role->active)
                                <span class="badge rounded-pill badge-success-light">Ativo</span>
                            @else
                                <span class="badge rounded-pill badge-danger-light">Inativo</span>
                            @endif
                        </dd>
                </div>
            </div>
        </div>
    </div>

    @if (!$role->users->isEmpty())
    
        <div class="row mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h5 class="text-muted">Usuários vinculados</h5>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <ul class="list-group mb-3">
                    @foreach ($role->users as $user)
                        <li class="list-group-item">
                            {{ $user->name }}
                            <button class="btn btn-sm btn-light float-end"
                                wire:confirm="Deseja desvincular usuário?"
                                wire:click.prevent="detach('{{ $user->id }}')">
                                <i class=" far fa-trash"></i>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    @endif

    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('roles.index') }}" 
                class="btn btn-link text-muted float-end" 
                title="Voltar"
                wire:navigate>
                Voltar
            </a>
        </div>
    </div>

</div>
