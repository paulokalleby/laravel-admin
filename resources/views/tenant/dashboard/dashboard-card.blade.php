<div class="card animate__animated animate__headShake">
    <div class="card-body">
        <div class="row">
            <div class="col mt-0">
                <h5 class="card-title">{{ $title }}</h5>
            </div>

            <div class="col-auto">
                <div class="stat text-primary">
                    <i class="align-middle fal fa-{{ $icon }}"></i>
                </div>
            </div>
        </div>
        <h1 class="mt-1 mb-3">{{ $info }}</h1>
        {{--
        <div class="mb-0">
            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 3.65% </span>
            <span class="text-muted">Since last week</span>
        </div>
        --}}
    </div>
</div>
