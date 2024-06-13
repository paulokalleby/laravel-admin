<nav x-data="{}" class="navbar navbar-expand navbar-light navbar-bg_ shadow-none px-md-5 py-md-4">
    <a href="#" class="sidebar-toggle" x-on:click.prevent="toggle()">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align"x-data="{ dropdown: false }">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-sm-inline-block" :class="{ 'show': dropdown }" href="#"
                    x-on:click.prevent="dropdown = !dropdown">
                    <img src="{{ Vite::asset('resources/img/thumb.jpg') }}" class="avatar avatar-sm img-fluid rounded-circle me-1" />
                    <span class="text-dark">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" :class="{ 'show': dropdown }">
                    <a class="dropdown-item" href="{{ route('profile.index') }}" wire:navigate>
                        <i class="align-middle me-1 far fa-user"></i> Meu Perfil
                    </a>
                    @can('settings')
                        <a class="dropdown-item" href="{{ route('settings.index') }}" wire:navigate>
                            <i class="align-middle me-1 far fa-cog"></i> Configurações
                        </a>
                    @endcan
                    <div class="dropdown-divider"></div>
                    <livewire:auth.logout/>
                </div>
            </li>
        </ul>
    </div>
</nav>
