<!DOCTYPE html>
<html lang="ja">
@include('components.head')
<body class="antialiased overflow-x-hidden">
    @include('components.header')

    {{ $slot }}

    @livewireScripts
    <script src="{{ asset('js/script.js') }}"></script>
</body>