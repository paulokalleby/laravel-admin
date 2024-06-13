@section('title', 'Registrar-se')

<div>
    <div class="text-center mt-4">
        <h1 class="h2">Registrar-se</h1>
        <p class="lead">
            Se inscreva para obter acesso
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-3">
                <form>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Negócio</label>
                        <input class="form-control form-control-lg" 
                            type="text" 
                            name="business"
                            wire:model="business"
                            placeholder="Nome do seu negócio"/>
                            @error('business')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input class="form-control form-control-lg" 
                            type="text" 
                            name="name"
                            wire:model="name"
                            placeholder="Seu nome"/>
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control form-control-lg" 
                            type="text" 
                            name="email"
                            wire:model="email"
                            placeholder="Seu email"/>
                            @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input class="form-control form-control-lg"
                            @if($show) type="text" 
                            @else type="password" 
                            @endif 
                            name="password" 
                            wire:model="password"
                            placeholder="Sua senha"/>
                        @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" 
                                type="checkbox" 
                                role="switch" 
                                wire:model.live="show" 
                                type="checkbox" 
                                id="show-password">
                            <label class="form-check-label" for="show-password">Mostrar senha</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" 
                            class="btn btn-primary"
                            wire:click.prevent="store"
                            wire:loading.attr="disabled">
                            <span wire:loading wire:target="store" class="spinner-border spinner-border-sm" role="status"></span>
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mb-3">
        Já tem uma conta? <a href="{{ route('auth.login') }}" wire:navigate>Entrar</a>
    </div>

</div>
