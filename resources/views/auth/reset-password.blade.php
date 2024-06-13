@section('title', 'Redefinir Senha')

<div>
    <div class="text-center mt-4">
        <h1 class="h2">Redefinir Senha</h1>
        <p class="lead">
            Informe o email da conta e a nova senha desejada
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
                        <label class="form-label">Nova Senha</label>
                        <input class="form-control form-control-lg"
                            type="password"
                            name="password" 
                            wire:model="password"
                            placeholder="Nova senha"/>
                        @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmação de Senha</label>
                        <input class="form-control form-control-lg"
                            type="password"
                            name="password_confirmation" 
                            wire:model="password_confirmation"
                            placeholder="Confirmar senha"/>
                        @error('password_confirmation')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" 
                            class="btn btn-primary"
                            wire:click.prevent="resetPassword"
                            wire:loading.attr="disabled">
                            <span wire:loading wire:target="resetPassword" class="spinner-border spinner-border-sm" role="status"></span>
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mb-3">
        <a href="{{ route('auth.login') }}" wire:navigate>Entrar</a>
    </div>
</div>
