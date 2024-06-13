<nav x-data="{}" id="sidebar" class="sidebar" :class="{ 'collapsed': $store.collapsed.status }">
    <div class="sidebar-content js-simplebar bg-main_">
        <a class="sidebar-brand" href="{{ route('home') }}">
            <span class="align-middle">{{ config('app.name') }}</span>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <img src="{{ orImage( auth()->user()->load('tenant')->tenant->logo,'thumb.jpg') }}" class="avatar avatar-sm img-fluid rounded me-1" alt="Charles Hall" />
                </div>
                <div class="flex-grow-1 ps-2 pt-1">
                    <a class="sidebar-user-title" href="#">
                        {{ auth()->user()->load('tenant')->tenant->name }}
                    </a>
                    {{-- <div class="sidebar-user-subtitle">Designer</div> --}}
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Menu</li>

            <li class="sidebar-item @if (request()->routeIs('home')) active @endif">
                <a class="sidebar-link" href="{{ route('home') }}" wire:navigate>
                    <i class="align-middle far fa-sliders-h"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @canany(['roles.index', 'users.index'])
                <li class="sidebar-header">
                    Controle de Acesso
                </li>
            @endcanany

            @can('roles.index')
                <li class="sidebar-item @if (request()->routeIs('roles.index')) active @endif">
                    <a class="sidebar-link" href="{{ route('roles.index') }}" wire:navigate>
                        <i class="align-middle far fa-user-lock"></i> <span class="align-middle">Papeis</span>
                    </a>
                </li>
            @endcan

            @can('users.index')
                <li class="sidebar-item @if (request()->routeIs('users.index')) active @endif">
                    <a class="sidebar-link" href="{{ route('users.index') }}" wire:navigate>
                        <i class="align-middle far fa-users"></i> <span class="align-middle">Usuários</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </nav>