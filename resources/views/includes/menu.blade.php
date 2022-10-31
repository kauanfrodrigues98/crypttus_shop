@php

const MENUS = [
    [
        'name' => 'Funcionários',
        'route' => 'user.index',
        'icon' => 'fas fa-fw fa-user',
        'submenu' => false,
        'modelAccess' => 'App\Models\User',
    ],
    [
        'name' => 'Clientes',
        'route' => 'clientes.index',
        'icon' => 'fas fa-fw fa-users',
        'submenu' => false,
        'modelAccess' => 'App\Models\Clientes',
    ],
    [
        'name' => 'Fornecedores',
        'route' => 'fornecedores.index',
        'icon' => 'fas fa-fw fa-truck',
        'submenu' => false,
        'modelAccess' => 'App\Models\Fornecedores',
    ],
    [
        'name' => 'Produtos',
        'route' => '',
        'icon' => 'fas fa-fw fa-briefcase',
        'submenu' => 'true',
        'sub' => [
            [
                'name' => 'Produtos',
                'route' => 'produtos.index',
                'modelAccess' => 'App\Models\Produtos',
            ],
            [
                'name' => 'Tamanhos',
                'route' => 'tamanhos.index',
                'modelAccess' => 'App\Models\Tamanhos',
            ],
            [
                'name' => 'Cores',
                'route' => 'cores.index',
                'modelAccess' => 'App\Models\Cores',
            ],
            [
                'name' => 'Código Grade',
                'route' => 'codigo_grade.index',
                'modelAccess' => 'App\Models\CodigoGrades',
            ],
            [
                'name' => 'Coleções',
                'route' => 'colecoes.index',
                'modelAccess' => 'App\Models\Colecoes',
            ],
        ],
    ],
    [
        'name' => 'Recebimentos',
        'route' => 'recebimentos.index',
        'icon' => 'fas fa-fw fa-truck',
        'submenu' => false,
        'modelAccess' => 'App\Models\Recebimentos',
    ],
    [
        'name' => 'Estoque',
        'route' => 'estoque.index',
        'icon' => 'fas fa-fw fa-box',
        'submenu' => false,
        'modelAccess' => 'App\Models\Estoque',
    ],
    [
        'name' => 'Financeiro',
        'route' => '',
        'icon' => 'fas fa-fw fa-money-bill-wave',
        'submenu' => 'true',
        'sub' => [
            [
                'name' => 'Sangrias',
                'route' => 'sangrias.index',
                'modelAccess' => 'App\Models\Sangrias',
            ],
            [
                'name' => 'Despesas Avulsas',
                'route' => 'despesas_avulsas.index',
                'modelAccess' => 'App\Models\DespesasAvulsas',
            ],
            [
                'name' => 'Suprimento Caixa',
                'route' => 'suprimento_caixa.index',
                'modelAccess' => 'App\Models\SuprimentoCaixas',
            ],
            [
                'name' => 'Movimentação Caixa',
                'route' => 'movimentacao_caixa.index',
                'modelAccess' => 'App\Models\MovimentacaoCaixa'
            ],
        ],
    ],
    [
        'name' => 'Vendas',
        'route' => 'vendas.index',
        'icon' => 'fas fa-solid fa-box-open',
        'submenu' => false,
        'modelAccess' => 'App\Models\Vendas',
    ],
];

@endphp

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled toggled" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Shop <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menus
        </div>

        @foreach(MENUS as $menu)
            @if($menu['submenu'])
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse"
                       data-target="#collapse-{{ $menu['name'] }}"
                       aria-expanded="true" aria-controls="collapse-{{ $menu['name'] }}">
                        <i class="{{ $menu['icon'] }}"></i>
                        <span>{{ $menu['name'] }}</span>
                    </a>
                    <div id="collapse-{{ $menu['name'] }}" class="collapse" aria-labelledby="headingTwo"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Submenu</h6>
                            @for($index = 0; $index < count($menu['sub']); $index++)
                                @can('view', $menu['sub'][$index]['modelAccess'])
                                    <a class="collapse-item"
                                       href="{{ route($menu['sub'][$index]['route']) }}">{{ $menu['sub'][$index]['name'] }}</a>
                                @endcan
                            @endfor
                        </div>
                    </div>
                </li>
            @else
                @can('view', $menu['modelAccess'])
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($menu['route']) }}">
                            <i class="{{ $menu['icon'] }}"></i>
                            <span>{{ $menu['name'] }}</span>
                        </a>
                    </li>
                @endcan
            @endif
        @endforeach

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                    method="post" action="{{ route('localizar_produto') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" name="localizar_produto"
                               placeholder="Localizar Produto..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Localizar Produto..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <x-database-notifications/>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Mensagens
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="{{ asset('img/undraw_profile_1.svg') }}"
                                         alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.
                                    </div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="{{ asset('img/undraw_profile_2.svg') }}"
                                         alt="...">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how
                                        would you like them sent to you?
                                    </div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="{{ asset('img/undraw_profile_3.svg') }}"
                                         alt="...">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with
                                        the progress so far, keep up the good work!
                                    </div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                         alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                        told me that people say this to all dogs, even if they aren't good...</div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nome }}</span>
                            <img class="img-profile rounded-circle"
                                 src="{{ asset('img/undraw_profile.svg') }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <a class="dropdown-item" href="{{ route('configuracoes') }}">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Configurações
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Log de Atividades
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Sair
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Crypttus Sistemas @php echo date('Y') @endphp</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
</div>
