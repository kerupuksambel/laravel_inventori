<nav class="navbar is-fixed-top is-info" role="navigation" id="navbar" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <b>kasir!</b>
        </a>
    
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>
    
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-end">
            @guest
                
            @else
                <a class="navbar-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</nav>