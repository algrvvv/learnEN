@if (session('success'))
    <div class="div-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

{{-- @if (session('errors'))
    <div class="div-errors">
        <p>{{ session('errors') }}</p>
    </div>
@endif --}}