   <!-- ====== Header Start ====== -->
   <header class="ud-header bg-white">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <nav class="navbar navbar-expand-lg">
                       <a class="navbar-brand" href="{{ route('site.home') }}">
                           <img src="/images/logotipo/logo.png" alt="Logo" width="200px" />
                       </a>
                       <button class="navbar-toggler">
                           <span class="toggler-icon bg-dark"> </span>
                           <span class="toggler-icon bg-dark"> </span>
                           <span class="toggler-icon bg-dark"> </span>
                       </button>

                       <div class="navbar-collapse">
                           <ul id="nav" class="navbar-nav mx-auto">

                               <li class="nav-item">
                                   <a class="ud-menu-link text-dark" href="{{ route('site.definition') }}">Definição</a>
                               </li>
                               <li class="nav-item">
                                   <a class="ud-menu-link text-dark"
                                       href="{{ route('site.regulation') }}">Regulamentos</a>
                               </li>
                               <li class="nav-item nav-item-has-children">
                                   <a href="javascript:void(0)" class="text-dark">Publicações</a>
                                   <ul class="ud-submenu">
                                       <li class="ud-submenu-item">
                                           <a href="{{ route('site.news') }}" class="ud-submenu-link text-dark">
                                               Notícias
                                           </a>
                                       </li>

                                       <li class="ud-submenu-item">
                                           <a href="{{ route('site.announcent') }}" class="ud-submenu-link text-dark">
                                               Anúncios
                                           </a>
                                       </li>



                                   </ul>
                               </li>
                               <li class="nav-item">
                                   <a class="ud-menu-link text-dark" href="{{ route('site.profile') }}">Perfil
                                       Requisitado</a>
                               </li>


                          
                               <li class="nav-item">
                                   <a class=" text-dark" href="{{ route('site.search') }}">
                                       <i class="lni lni-search"></i>
                                   </a>
                               </li>

                               <li class="nav-item mt-3">
                                   <a class="ud-main-btn ud-link-btn mybutton"
                                   href="{{ route('site.candidacy.verify') }}">
                                   Status da Prova
                                       <i class="lni lni-arrow-right"></i>

                                   </a>
                               </li>

                           </ul>
                       </div>


                   </nav>
               </div>
           </div>
       </div>
   </header>
   <!-- ====== Header End ====== -->
