@section('title', 'Recuperar senha')

<div>
    <div class="text-center mt-4">
        <h1 class="h2">Recuperar senha</h1>
        <p class="lead">
            Informe seu email para enviar o link de redefinição senha
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
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" 
                            class="btn btn-primary"
                            wire:click.prevent="sendResetLink"
                            wire:loading.attr="disabled">
                            <span wire:loading wire:target="sendResetLink" class="spinner-border spinner-border-sm" role="status"></span>
                            Enviar
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
