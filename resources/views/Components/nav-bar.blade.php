<div>
    <header class="header">
        <nav class="Navbar">
            <a href="/dashboard"><img class="logo"  src="/Image/XentBlanco-1.png" alt=""></a>
            <p class="Title">Bienvenido {{Auth::user()->name}}</p>
            <div class="closeSession">
                <a href="{{url('users/singOut')}}">Cerrar Sesión</a>
            </div>
        </nav>
    </header>
</div>
