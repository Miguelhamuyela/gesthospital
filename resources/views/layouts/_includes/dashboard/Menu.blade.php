<nav class="topnav navbar navbar-light bg-white">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>

        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fe fe-user fe-16"></span>

            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('admin.user.show', Auth::User()->id) }}">Perfil</a>
                <a class="dropdown-item" href="{{ route('admin.user.edit', Auth::user()->id) }}">Configurações</a>
                <a class="nav-link text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Terminar a Sessão
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </ul>
</nav>

@if (null !== Auth::user())
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100  d-flex">
                <a class="navbar-brand mx-auto  flex-fill text-center" href="{{ route('admin.home') }}">
                    <img rel="icon" src="/images/logotipo/logo.png" style="width:120px; margin:auto" />

                </a>
            </div>

            <ul class="navbar-nav flex-fill w-100 mb-2">
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Painel</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('admin.home') }}">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Painel</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('site.home') }}" target="_blank">
                            <i class="fe fe-globe fe-16"></i>
                            <span class="ml-3 item-text">Site</span>
                        </a>
                    </li>
                </ul>
                @if ('Recrutador' == Auth::user()->level || 'Administrador' == Auth::user()->level)
                    <p class="text-muted nav-heading mt-5 mb-1">
                        <span>Candidaturas</span>
                    </p>

                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item w-100">
                            <a class="nav-link" href="{{ route('admin.candidacy.received.index') }}">
                                <i class="fe fe-users fe-16"></i>
                                <span class="ml-3 item-text">Recebidas</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item w-100">
                            <a class="nav-link" href="{{ route('admin.candidacy.failed.index') }}">
                                <i class="fe fe-users fe-16"></i>
                                <span class="ml-3 item-text">Reprovadas</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item w-100">
                            <a class="nav-link" href="{{ route('admin.candidacy.approved.index') }}">
                                <i class="fe fe-users fe-16"></i>
                                <span class="ml-3 item-text">Aprovadas</span>
                            </a>
                        </li>
                    </ul>
                @endif

                @if ('Administrador' == Auth::user()->level)
                    <p class="text-muted nav-heading mt-2 mb-1">
                        <span> Estatística</span>
                    </p>
                    <li class="nav-item dropdown">
                        <a href="#estatistic" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text">Estatística </span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="estatistic">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.estatistic.status') }}">
                                    <span class="ml-1 item-text"> Estado das Candidaturas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.estatistic.academiclevel') }}">
                                    <span class="ml-1 item-text"> Candidaturas por Nivel Acadêmico</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.estatistic.province') }}">
                                    <span class="ml-1 item-text">Candidaturas por Províncias</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.estatistic.provinceapto') }}">
                                    <span class="ml-1 item-text">Candidaturas por Províncias Aprovadas</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.estatistic.byCounty') }}">
                                    <span class="ml-1 item-text"> Candidaturas por Municípios</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif

                @if ('Examinador' == Auth::user()->level)
                    <p class="text-muted nav-heading mt-2 mb-1">
                        <span> Questões</span>
                    </p>
                    {{-- categoria de Questões --}}
                    <li class="nav-item dropdown">
                        <a href="#question" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-rss fe-16"></i>
                            <span class="ml-3 item-text">Questões</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="question">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.question.create') }}">
                                    <span class="ml-1 item-text">Cadastrar Questão</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.question.index') }}">
                                    <span class="ml-1 item-text">Listar Questões</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if ('Editor' == Auth::user()->level || 'Administrador' == Auth::user()->level)
                    {{-- Menu do CENSO 2024 --}}
                    <p class="text-muted nav-heading mt-2 mb-1">
                        <span> O CENSO</span>
                    </p>

                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item w-100">
                            <a class="nav-link" href="{{ route('admin.definition.show') }}">
                                <i class="fe fe-file-text fe-16"></i>
                                <span class="ml-3 item-text">Definição</span>
                            </a>
                        </li>
                    </ul>

                    <li class="nav-item dropdown">
                        <a href="#regulations" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-file-text fe-16"></i>
                            <span class="ml-3 item-text">Regulamentos</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="regulations">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.regulation.create') }}">
                                    <span class="ml-1 item-text">Cadastrar Regulamento</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.regulation.index') }}">
                                    <span class="ml-1 item-text">Listar Regulamentos</span>
                                </a>
                            </li>

                        </ul>
                    </li>


                    {{-- Menu de Notícias --}}
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span> Notícias </span>
                    </p>
                    {{-- categoria de Notícias --}}
                    <li class="nav-item dropdown">
                        <a href="#news" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-rss fe-16"></i>
                            <span class="ml-3 item-text">Notícias</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="news">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.news.create') }}">
                                    <span class="ml-1 item-text">Cadastrar Notícia</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.news.index') }}">
                                    <span class="ml-1 item-text">Listar Notícias</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span> Anúncios </span>
                    </p>

                    <li class="nav-item dropdown">
                        <a href="#annonce" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class=" fe fe-cast  fe-16"></i>
                            <span class="ml-3 item-text"> Anúncios</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="annonce">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.annonce.create') }}">
                                    <span class="ml-1 item-text">Cadastrar Anúncio</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.annonce.index') }}">
                                    <span class="ml-1 item-text">Listar Anúncios</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Menu de Multimédia --}}
                    <p class="text-muted nav-heading mt-2 mb-1">
                        <span> Multimédia </span>
                    </p>
                    <li class="nav-item dropdown">
                        <a href="#slideshow" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-image fe-16"></i>
                            <span class="ml-3 item-text"> Slideshows</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="slideshow">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.slideshow.create') }}">
                                    <span class="ml-1 item-text">Cadastrar Slideshow</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.slideshow.index') }}">
                                    <span class="ml-1 item-text">Listar Slideshows</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if ('Administrador' == Auth::user()->level)
                    {{-- Menu de Utilizadores --}}
                    <p class="text-muted nav-heading mt-2 mb-1">
                        <span> Utilizadores</span>
                    </p>
                    <li class="nav-item dropdown">
                        <a href="#user" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-user-plus fe-16"></i>
                            <span class="ml-3 item-text"> Utilizadores</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="user">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('register') }}">
                                    <span class="ml-1 item-text">Cadastrar Utilizador</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.user.index') }}">
                                    <span class="ml-1 item-text">Listar Utilizadores</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


                @if ('Editor' == Auth::user()->level || 'Administrador' == Auth::user()->level)
                    {{-- Menu de Configurações --}}
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>Configurações</span>
                    </p>
                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item w-100">
                            <a class="nav-link" href="{{ route('admin.configuration.show') }}">

                                <i class="fe fe-settings fe-16"></i>
                                <span class="ml-3 item-text">Configurações</span>
                            </a>
                        </li>
                    </ul>
                @endif

            </ul>

        </nav>
    </aside>

@endif
