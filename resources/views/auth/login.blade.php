@section('title', 'Entrar')

<div>
    <div class="text-center mt-4">
        <h1 class="h2">Entrar</h1>
        <p class="lead">
            Informe suas credencias para acessar
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-3">
                <form>
                    @csrf
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
                        <small class="float-end mt-1">
                            <a href="{{ route('password.forgot') }}" wire:navigate>Esqueceu sua senha?</a>
                        </small>
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
                            wire:click.prevent="login"
                            wire:loading.attr="disabled">
                            <span wire:loading wire:target="login" class="spinner-border spinner-border-sm" role="status"></span>
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mb-3">
        Não tem uma conta? <a href="{{ route('auth.register') }}" wire:navigate>Inscrever-se</a>
    </div>

</div>
