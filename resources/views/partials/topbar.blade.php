<div class="topbar">
    <div class="topbar__container">

        {{-- Izquierda: hamburguesa + logo --}}
        <div class="topbar__left">
            <button class="topbar__hamburger" id="mobile-menu-toggle" aria-label="Abrir menú">
                <svg id="icon-menu" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="topbar__logo">
                <img src="https://storage.googleapis.com/statics-files-adipa-cl/dist_compress/dist/img/icons/logo-adipa.svg"
                     alt="ADIPA" class="topbar__logo-img">
            </div>
        </div>

        {{-- Centro: buscador desktop --}}
        <div class="topbar__search">
            <input type="text" placeholder="¿Qué quieres aprender?" class="topbar__search-input">
            <button type="submit" class="topbar__search-btn">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                </svg>
            </button>
        </div>

        {{-- Derecha: acciones --}}
        <div class="topbar__actions">
            {{-- Solo mobile --}}
            <button class="topbar__search-mobile" aria-label="Buscar">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                </svg>
            </button>

            {{-- Solo desktop --}}
            <button class="topbar__btn topbar__btn--login topbar__btn--desktop">Iniciar Sesión</button>
            <button class="topbar__btn topbar__btn--register topbar__btn--desktop">Regístrate</button>

            <button id="dark-mode-toggle" class="dark-toggle" aria-label="Cambiar tema">
                <span class="dark-toggle__sun">☀️</span>
                <span class="dark-toggle__moon">🌙</span>
            </button>

            <div class="topbar__cart" id="cart-icon">
    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
    </svg>
    <span class="topbar__cart-count" id="cart-count" style="display:none">0</span>
</div>
        </div>
    </div>
</div>