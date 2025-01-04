<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        </div><a class="navbar-brand" href="/">
            <div class="d-flex align-items-center py-3"><span class="font-sans-serif">Veterinaria</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages--><a class="nav-link {{ (Request::is('/'))?'active': ''}}" href="/" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Clínica
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('espera-list'))?'active': ''}}" href="{{ route('espera-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-calendar-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">Citas</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Ventas
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link {{ (Route::is('vistaCaja'))?'active': ''}}" href="{{ route('vistaCaja') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-shopping-cart"></span>
                            </span>
                            <span class="nav-link-text ps-1">Punto de venta</span>
                        </div>
                    </a>
                    <a class="nav-link dropdown-indicator" href="#caja-operations" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-file-alt"></span></span><span class="nav-link-text ps-1">Operaciones de caja</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="caja-operations">
                        <li class="nav-item"><a class="nav-link" href="../modules/forms/floating-labels.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Apertura</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="../modules/forms/floating-labels.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Corte</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="../modules/forms/floating-labels.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Lista de cortes</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Listados
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link {{ (Route::is('productos-list'))?'active': ''}}" href="{{ route('productos-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-bone"></span>
                            </span>
                            <span class="nav-link-text ps-1">Productos</span>
                        </div>
                    </a>
                    <a class="nav-link {{ (Route::is('client-list'))?'active': ''}}" href="{{ route('client-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-users"></span>
                            </span>
                            <span class="nav-link-text ps-1">Clientes</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Veterinario
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ route('client-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-capsules"></span>
                            </span>
                            <span class="nav-link-text ps-1">Recetas</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Inventario
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ route('client-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-box"></span>
                            </span>
                            <span class="nav-link-text ps-1">Stock</span>
                        </div>
                    </a>
                    <a class="nav-link" href="{{ route('client-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-truck-loading"></span>
                            </span>
                            <span class="nav-link-text ps-1">Ingreso de mercancia</span>
                        </div>
                    </a>
                    <a class="nav-link" href="{{ route('client-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-box-open"></span>
                            </span>
                            <span class="nav-link-text ps-1">Salida de mercancia</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Administración
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ route('productos-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-chart-bar"></span>
                            </span>
                            <span class="nav-link-text ps-1">Informes</span>
                        </div>
                    </a>
                    <a class="nav-link" href="{{ route('empresa') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-building"></span>
                            </span>
                            <span class="nav-link-text ps-1">Empresa</span>
                        </div>
                    </a>
                    <a class="nav-link" href="{{ route('sucursal-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-store-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">Sucursales</span>
                        </div>
                    </a>
                    <a class="nav-link" href="{{ route('client-list') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-users"></span>
                            </span>
                            <span class="nav-link-text ps-1">Personal</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>