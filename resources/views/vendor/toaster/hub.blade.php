<div role="status" id="toaster" x-data="toasterHub(@js($toasts), @js($config))" @class([''])>
    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="toast.isVisible" x-init="$nextTick(() => toast.show($el))" @class([
            'alert alert-dismissible animate__animated animate__fadeIn alert-toast',
        ])
            :class="toast.select({ error: 'bg-red-500', info: 'bg-sky-400', success: 'bg-green-500', warning: 'bg-orange-500' })"
            x-transition:leave="animate__fadeOut">
            <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
            </div>
            <div x-text="toast.message" class="alert-message"></div>
        </div>
    </template>
</div>
