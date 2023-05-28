<div class="card card-default">
    <div class="card-header text-white text-center bg-primary">
        <h4 class="card-title">{{ $title }}</h4>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>

    @if(!empty($footer ?? ''))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
