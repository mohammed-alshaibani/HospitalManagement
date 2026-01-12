<div class="mt-2 w-100 d-flex align-items-center justify-content-end">
    {{-- prev --}}
    @if ($currentPage > 1)
        <a href="{{ $url }}&&page={{ $currentPage - 1 }}" class="btn-sm btn-info text-decoration-none ">
            {{ __('main.previousPage') }}
        </a>
    @else
        <div class="btn-sm btn-secondary">
            {{ __('main.previousPage') }}
        </div>
    @endif

    {{-- pages --}}
    <p style="display: inline-block; margin: 0 10px;">{{ $currentPage }}</p>

    {{-- next --}}
    @if ($currentPage < $lastPage)
        <a href="{{ $url }}&&page={{ $currentPage + 1 }}" class="btn-sm btn-info">
            {{ __('main.nextPage') }}
        </a>
    @else
        <div class="btn-sm btn-secondary">
            {{ __('main.nextPage') }}
        </div>
    @endif
</div>
