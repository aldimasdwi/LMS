<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($routeParameters as $param)
        @if ($loop->last)
        <li class="breadcrumb-item active">{{ $param }}</li>
        @else
        <li class="breadcrumb-item"><a href="#">{{ $param }}</a></li>
        @endif
        @endforeach
    </ol>
</nav>