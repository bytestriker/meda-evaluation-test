
@if (strtolower(auth()->user()->type) === 'admin')

<li class="nav-item">
    <a href="{{ route('administrators.index') }}" class="nav-link {{ Request::is('administrators*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Administradores</p>
    </a>
</li>
    
<li class="nav-item">
    <a href="{{ route('employees.index') }}" class="nav-link {{ Request::is('employees*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Empleados</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('read_banxico') }}" class="nav-link {{ Request::is('read_banxico*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>BMX - Series</p>
    </a>
</li>


@endif



@if (strtolower(auth()->user()->type) === 'employee')
    
<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Inicio</p>
    </a>
</li>

@endif


<li class="nav-item">
    <a href="#" class="nav-link">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link text-white">

                <i class="fas fa-sign-out-alt"></i>&nbsp;Salir
            </button>
        </form>
    </a>
</li>
