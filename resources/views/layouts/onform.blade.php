<!DOCTYPE html>
<html lang="ja">
<head>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="antialiased overflow-x-hidden">

    {{ $slot }}

    @livewireScripts
</body>