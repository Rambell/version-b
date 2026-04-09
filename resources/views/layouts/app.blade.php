<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ADIPA - Educación en Psicología')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"></head>
<body>

    @include('partials.topbar')
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Cart Overlay --}}
<div class="cart-overlay" id="cart-overlay"></div>

{{-- Cart Drawer --}}
<div class="cart-drawer" id="cart-drawer">
    <div class="cart-drawer__header">
        <div class="cart-drawer__title">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            Mi carrito
            <span class="cart-drawer__count" id="cart-drawer-count">0</span>
        </div>
        <button class="cart-drawer__close" id="cart-close">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div class="cart-drawer__body" id="cart-body">
        {{-- Items se renderizan con jQuery --}}
    </div>

    <div class="cart-drawer__footer" id="cart-footer" style="display:none">
        <div class="cart-drawer__total">
            <span>Total</span>
            <span class="cart-drawer__total-amount" id="cart-total">$0</span>
        </div>
        <button class="cart-drawer__checkout">Ir al pago</button>
        <button class="cart-drawer__clear" id="cart-clear">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
            Vaciar carrito
        </button>
    </div>
</div>

</body>
</html>