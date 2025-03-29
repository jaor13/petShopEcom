@extends('layouts.app') {{-- Extends the app.blade.php layout --}}

@section('content')
<div class="mt-10">
    {{ $slot }}
</div>
@endsection