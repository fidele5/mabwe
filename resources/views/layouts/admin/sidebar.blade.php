<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-collapsed-open menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="/">
                    <div class="brand-logo">
                        <img src="/{{ get_option('app_logo') }}" class="logo" alt="" />
                    </div>
                    <h2 class="brand-text mb-0">{{ get_option('app_name') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
            <li class="nav-item @if (\Request::route()->getName() == 'home') active @endif">
                <a href="{{ route('home') }}">
                    <i class="bx bx-home-alt"></i>
                    <span class="menu-title">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/">
                    <i class="bx bx-left-arrow-circle"></i>
                    <span class="menu-title">Accueil client</span>
                </a>
            </li>

            <li class="navigation-header"><span>Publications</span></li>
            <li class="nav-item @if ($selected_item == 'post') active @endif">
                <a href="form-inputs.html">
                    <i class="bx bx-list-ul"></i>
                    <span class="menu-item">Post</span>
                </a>
                <ul class="menu-content">
                    <li @if ($selected_sub_item == 'all' and $selected_item == 'post') class="active" @endif>
                        <a href="{{ route('post.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Toutes</span>
                        </a>
                    </li>
                    <li @if ($selected_sub_item == 'new' and $selected_item == 'post') class="active" @endif>
                        <a href="{{ route('post.create') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Nouveau</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item @if ($selected_item == 'video-post') active @endif">
                <a href="form-inputs.html">
                    <i class="bx bxs-calendar-event"></i>
                    <span class="menu-item">Videos</span>
                </a>
                <ul class="menu-content">
                    <li @if ($selected_sub_item == 'all' and $selected_item == 'video-post') class="active" @endif>
                        <a href="{{ route('video-post.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Tous</span>
                        </a>
                    </li>
                    <li @if ($selected_sub_item == 'new' and $selected_item == 'video-post') class="active" @endif>
                        <a href="{{ route('video-post.create') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Nouvelle</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item @if ($selected_item == 'ads') active @endif">
                <a href="form-inputs.html">
                    <i class="bx bxs-calendar-check"></i>
                    <span class="menu-item">Publicités</span>
                </a>
                <ul class="menu-content">
                    <li @if ($selected_sub_item == 'all' and $selected_item == 'ads') class="active" @endif>
                        <a href="{{ route('ads.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Toutes</span>
                        </a>
                    </li>
                    <li @if ($selected_sub_item == 'new' and $selected_item == 'ads') class="active" @endif>
                        <a href="{{ route('ads.create') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Nouvelle</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header"><span>Catégories</span></li>
            <li class="nav-item @if ($selected_item == 'post-category') active @endif">
                <a href="">
                    <i class="bx bxs-categories"></i>
                    <span class="menu-title">Categorie d'actualité</span>
                </a>
                <ul class="menu-content">
                    <li @if ($selected_sub_item == 'all' and $selected_item == 'post-category') class="active" @endif>
                        <a href="{{ route('post-category.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Toutes</span>
                        </a>
                    </li>
                    <li @if ($selected_sub_item == 'new' and $selected_item == 'post-category') class="active" @endif>
                        <a href="{{ route('post-category.create') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Nouvelles</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item @if ($selected_item == 'company-type') active @endif">
                <a href="page-account-settings.html">
                    <i class="bx bxs-categories"></i>
                    <span class="menu-title">Types d'entreprises</span>
                </a>
                <ul class="menu-content">
                    <li @if ($selected_sub_item == 'all' and $selected_item == 'company-type') class="active" @endif>
                        <a href="{{ route('company-type.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Toutes</span>
                        </a>
                    </li>
                    <li @if ($selected_sub_item == 'new' and $selected_item == 'company-type') class="active" @endif>
                        <a href="{{ route('company-type.create') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Nouvelles</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header"><span>Compagnies</span></li>
            <li class="nav-item @if ($selected_item == 'company') active @endif">
                <a href="page-account-settings.html">
                    <i class="bx bx-wrench"></i>
                    <span class="menu-title">Compagnies</span>
                </a>
                <ul class="menu-content">
                    <li @if ($selected_sub_item == 'all' and $selected_item == 'company') class="active" @endif>
                        <a href="{{ route('company.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Toutes</span>
                        </a>
                    </li>

                    <li @if ($selected_sub_item == 'new' and $selected_item == 'company') class="active" @endif>
                        <a href="{{ route("company.create") }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">Nouvelle</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="navigation-header"><span>Paramètres</span></li>
            <li class="nav-item @if ($selected_item == 'settings') active @endif">
                <a href="page-account-settings.html">
                    <i class="bx bx-wrench"></i>
                    <span class="menu-title">Paramètres</span>
                </a>
                <ul class="menu-content">
                    <li @if ($selected_sub_item == 'general' and $selected_item == 'settings') class="active" @endif>
                        <a href="{{ route('settings.create') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">{{ __('pages.general') }}</span>
                        </a>
                    </li>

                    <li @if ($selected_sub_item == 'languages' and $selected_item == 'settings') class="active" @endif>
                        <a href="">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item">{{ __('pages.language') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
