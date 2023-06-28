<nav aria-label="breadcrumb">
    @php($path = asset('admin'))
    <ol class="breadcrumb">
        @foreach ($routeParameters as $param)
        @if ($loop->last)
        <li class="breadcrumb-item active">{{ $param }}</li>
        @else
        <li class="breadcrumb-item"><a href="{{ $path = implode('/', [$path, $param]) }}">{{ $param
                }}</a></li>
        @endif
        @endforeach
    </ol>
</nav>