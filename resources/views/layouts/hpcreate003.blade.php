<html>
    <head>
        @yield('head')
        @livewireStyles
    </head>
    <body>
        <header>
            <a href="http://localhost/hpcreate003/public">Home</a>
        </header>
        <main>
            @yield('main')
        </main>
        <footer>
            ©Wing
        </footer>
        @livewireScripts
    </body>
</html>