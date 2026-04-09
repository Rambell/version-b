$(document).ready(function () {

    // Cerrar announcement bar
    $('#close-announcement').on('click', function () {
        $('#announcement-bar').slideUp(200);
    });

    // Quick searches hero
    $('.hero__quick-btn').on('click', function () {
        const term = $(this).data('term');
        $('#hero-search').val(term);
    });

    // ==================
    // FILTROS
    // ==================
    let activeCategories = [];
    let activeModalidades = [];
    let activeTipos = [];
    let activeTags = [];
    let activeQuickFilter = null;
    let priceRange = [0, 1200000];
    let hoursRange = [8, 348];
    let discountRange = [0, 100];

    function updateChips() {
        const $chips = $('#filter-chips');
        $chips.empty();

        const allActive = [
            ...activeCategories,
            ...activeModalidades,
            ...activeTipos,
            ...activeTags,
            ...(activeQuickFilter ? [activeQuickFilter] : [])
        ];

        allActive.forEach(function (filter) {
            const $chip = $(`
                <span class="filter-chip">
                    ${filter}
                    <button class="filter-chip__remove" data-filter="${filter}">✕</button>
                </span>
            `);
            $chips.append($chip);
        });

        if (allActive.length > 0) {
            $chips.append('<button class="sidebar__clear" id="clear-all-chips">Limpiar todo</button>');
        }
    }

    function filterCourses() {
        let visible = 0;

        $('.course-card').each(function () {
            const cardCategory = $(this).data('category');
            const cardModalidad = $(this).data('modalidad');
            const cardTipo = $(this).data('tipo');
            const cardTags = ($(this).data('tags') || '').split(',').map(t => t.trim());
            const cardPrice = parseInt($(this).data('price') || '0');
            const cardHours = parseInt($(this).data('horas') || '0');
            const cardDiscount = parseInt($(this).data('discount') || '0');
            const cardStatus = $(this).data('status') || '';
            const cardPopularity = parseInt($(this).data('popularity') || '0');
            const cardRating = parseFloat($(this).data('rating') || '0');

            let show = true;

            // Área temática
            if (activeCategories.length > 0 && !activeCategories.includes(cardCategory)) show = false;

            // Modalidad
            if (activeModalidades.length > 0 && !activeModalidades.includes(cardModalidad)) show = false;

            // Tipo programa
            if (activeTipos.length > 0 && !activeTipos.includes(cardTipo)) show = false;

            // Tags
            if (activeTags.length > 0 && !activeTags.some(t => cardTags.includes(t))) show = false;

            // Precio
            if (cardPrice < priceRange[0] || cardPrice > priceRange[1]) show = false;

            // Horas
            if (cardHours < hoursRange[0] || cardHours > hoursRange[1]) show = false;

            // Descuento
            if (cardDiscount < discountRange[0] || cardDiscount > discountRange[1]) show = false;

            // Quick filter
            if (activeQuickFilter === 'Nuevos Lanzamientos' && cardStatus !== 'Nuevo') show = false;
            if (activeQuickFilter === 'Pre Lanzamiento' && cardStatus !== 'Próximamente') show = false;
            if (activeQuickFilter === 'Ofertas Flash' && cardDiscount < 25) show = false;

            if (show) {
                $(this).fadeIn(200);
                visible++;
            } else {
                $(this).fadeOut(200);
            }
        });

        setTimeout(function() {
            if (visible === 0) {
                $('#empty-state').fadeIn(200);
            } else {
                $('#empty-state').fadeOut(200);
            }
        }, 200);
    }

    // Checkbox área temática
    $('.filter-checkbox').on('change', function () {
        const cat = $(this).data('category');
        if ($(this).is(':checked')) {
            activeCategories.push(cat);
        } else {
            activeCategories = activeCategories.filter(c => c !== cat);
        }
        updateChips();
        filterCourses();
    });

    // Checkbox modalidad
    $('.filter-modalidad').on('change', function () {
        const mod = $(this).data('modalidad');
        if ($(this).is(':checked')) {
            activeModalidades.push(mod);
        } else {
            activeModalidades = activeModalidades.filter(m => m !== mod);
        }
        updateChips();
        filterCourses();
    });

    // Checkbox tipo programa
    $('.filter-tipo').on('change', function () {
        const tipo = $(this).data('type');
        if ($(this).is(':checked')) {
            activeTipos.push(tipo);
        } else {
            activeTipos = activeTipos.filter(t => t !== tipo);
        }
        updateChips();
        filterCourses();
    });

    // Checkbox tags/categoría
    $('.filter-tag').on('change', function () {
        const tag = $(this).data('tag');
        if ($(this).is(':checked')) {
            activeTags.push(tag);
        } else {
            activeTags = activeTags.filter(t => t !== tag);
        }
        updateChips();
        filterCourses();
    });

    // Quick links
    $('.sidebar__quick-link').on('click', function (e) {
        e.preventDefault();
        const label = $(this).text().trim();
        activeQuickFilter = activeQuickFilter === label ? null : label;
        $('.sidebar__quick-link').removeClass('sidebar__quick-link--active');
        if (activeQuickFilter) $(this).addClass('sidebar__quick-link--active');
        updateChips();
        filterCourses();
    });

    // Remover chip individual
    $(document).on('click', '.filter-chip__remove', function () {
        const filter = $(this).data('filter');
        activeCategories = activeCategories.filter(c => c !== filter);
        activeModalidades = activeModalidades.filter(m => m !== filter);
        activeTipos = activeTipos.filter(t => t !== filter);
        activeTags = activeTags.filter(t => t !== filter);
        if (activeQuickFilter === filter) activeQuickFilter = null;
        $(`.filter-checkbox[data-category="${filter}"]`).prop('checked', false);
        $(`.filter-modalidad[data-modalidad="${filter}"]`).prop('checked', false);
        $(`.filter-tipo[data-type="${filter}"]`).prop('checked', false);
        $(`.filter-tag[data-tag="${filter}"]`).prop('checked', false);
        $('.sidebar__quick-link').removeClass('sidebar__quick-link--active');
        updateChips();
        filterCourses();
    });

    // Limpiar todos
    $(document).on('click', '#clear-filters, #clear-all-chips', function () {
        activeCategories = [];
        activeModalidades = [];
        activeTipos = [];
        activeTags = [];
        activeQuickFilter = null;
        priceRange = [0, 1200000];
        hoursRange = [8, 348];
        discountRange = [0, 100];
        $('.sidebar__checkbox').prop('checked', false);
        $('.sidebar__quick-link').removeClass('sidebar__quick-link--active');
        updateChips();
        filterCourses();
    });

    // Ordenar
    $('#sort-select').on('change', function () {
        const val = $(this).val();
        const $grid = $('#course-grid');
        let $cards = $grid.find('.course-card').toArray();

        $cards.sort(function (a, b) {
            if (val === 'price-asc') {
                return parseInt($(a).data('price')) - parseInt($(b).data('price'));
            }
            if (val === 'price-desc') {
                return parseInt($(b).data('price')) - parseInt($(a).data('price'));
            }
            if (val === 'popular') {
                return parseInt($(b).data('popularity')) - parseInt($(a).data('popularity'));
            }
            if (val === 'rating') {
                return parseFloat($(b).data('rating')) - parseFloat($(a).data('rating'));
            }
            if (val === 'nuevo') {
                return $(b).data('status') === 'Nuevo' ? 1 : -1;
            }
            return 0;
        });

        $cards.forEach(card => $grid.append(card));
    });

    // Acordeón sidebar CORREGIDO
    let slidersInitialized = {};

    $('.sidebar__group-header').off('click').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        const $header = $(this);
        const $group = $header.closest('.sidebar__group');
        const $options = $group.find('> .sidebar__options');
        const $chevron = $header.find('.sidebar__chevron');
        const groupName = $group.data('group');
        
        // Verificamos si está visible antes de empezar a cerrar otros
        const isVisible = $options.is(':visible');

        // 1. Cerramos todos los DEMÁS grupos (usamos .not() para excluir al actual)
        $('.sidebar__options').not($options).slideUp(200);
        $('.sidebar__chevron').not($chevron).css('transform', 'rotate(0deg)');

        // 2. Aplicamos Toggle solo al grupo actual
        if (isVisible) {
            $options.slideUp(200);
            $chevron.css('transform', 'rotate(0deg)');
        } else {
            // Al abrir, usamos el callback para inicializar sliders si existen
            $options.slideDown(200, function () {
                if (['precio', 'horas', 'descuento'].includes(groupName) && !slidersInitialized[groupName]) {
                    initSlider(groupName);
                    slidersInitialized[groupName] = true;
                }
            });
            $chevron.css('transform', 'rotate(180deg)');
        }
    });

    // Aseguramos el estado inicial del primero
    $('.sidebar__group:first > .sidebar__options').show();
    $('.sidebar__group:first .sidebar__chevron').css('transform', 'rotate(180deg)');
    // ==================
    // SLIDERS
    // ==================
    function initSlider(type) {
        if (type === 'precio') {
            const el = document.getElementById('slider-price');
            if (!el || el.noUiSlider) return;
            noUiSlider.create(el, { start: [0, 1200000], connect: true, range: { min: 0, max: 1200000 }, step: 10000 });
            el.noUiSlider.on('update', function (values) {
                const min = Math.round(values[0]);
                const max = Math.round(values[1]);
                $('#price-min-label').text('$' + min.toLocaleString('es-CL'));
                $('#price-max-label').text('$' + max.toLocaleString('es-CL'));
                priceRange = [min, max];
                filterCourses();
            });
        }
        if (type === 'horas') {
            const el = document.getElementById('slider-hours');
            if (!el || el.noUiSlider) return;
            noUiSlider.create(el, { start: [8, 348], connect: true, range: { min: 8, max: 348 }, step: 1 });
            el.noUiSlider.on('update', function (values) {
                const min = Math.round(values[0]);
                const max = Math.round(values[1]);
                $('#hours-min-label').text(min + ' hrs');
                $('#hours-max-label').text(max + ' hrs');
                hoursRange = [min, max];
                filterCourses();
            });
        }
        if (type === 'descuento') {
            const el = document.getElementById('slider-discount');
            if (!el || el.noUiSlider) return;
            noUiSlider.create(el, { start: [0, 100], connect: true, range: { min: 0, max: 100 }, step: 1 });
            el.noUiSlider.on('update', function (values) {
                const min = Math.round(values[0]);
                const max = Math.round(values[1]);
                $('#discount-min-label').text(min + '%');
                $('#discount-max-label').text(max + '%');
                discountRange = [min, max];
                filterCourses();
            });
        }
    }
    // ==================
    // FORMULARIO CONTACTO
    // ==================
    function validateForm() {
        let valid = true;

        const nombre = $('#field-nombre').val().trim();
        const email = $('#field-email').val().trim();
        const mensaje = $('#field-mensaje').val().trim();

        // Nombre
        if (!nombre) {
            showError('nombre', 'El nombre es obligatorio.');
            valid = false;
        } else if (nombre.length < 2) {
            showError('nombre', 'El nombre debe tener al menos 2 caracteres.');
            valid = false;
        } else {
            clearError('nombre');
        }

        // Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email) {
            showError('email', 'El email es obligatorio.');
            valid = false;
        } else if (!emailRegex.test(email)) {
            showError('email', 'Ingresa un email válido.');
            valid = false;
        } else {
            clearError('email');
        }

        // Mensaje
        if (!mensaje) {
            showError('mensaje', 'El mensaje es obligatorio.');
            valid = false;
        } else if (mensaje.length < 10) {
            showError('mensaje', 'El mensaje debe tener al menos 10 caracteres.');
            valid = false;
        } else {
            clearError('mensaje');
        }

        return valid;
    }

    function showError(field, msg) {
        $('#error-' + field).text(msg);
        $('#field-' + field).addClass('contact__input--error');
    }

    function clearError(field) {
        $('#error-' + field).text('');
        $('#field-' + field).removeClass('contact__input--error');
    }

    // Validación en blur
    $('#field-nombre, #field-email, #field-mensaje').on('blur', function () {
        validateForm();
    });

    // Contador mensaje
    $('#field-mensaje').on('input', function () {
        const len = $(this).val().length;
        const $counter = $('#mensaje-counter');
        $counter.text(len + '/300');
        if (len >= 300) {
            $counter.addClass('contact__counter--warning').removeClass('contact__counter--ok');
        } else if (len >= 10) {
            $counter.addClass('contact__counter--ok').removeClass('contact__counter--warning');
        } else {
            $counter.removeClass('contact__counter--ok contact__counter--warning');
        }
    });

    // Submit
    $('#contact-form').on('submit', function (e) {
        e.preventDefault();
        if (!validateForm()) return;

        $('#btn-text').hide();
        $('#btn-loading').show();
        $('#contact-submit').prop('disabled', true);

        setTimeout(function () {
            $('#contact-form').hide();
            $('#contact-success').show();
        }, 1200);
    });

    // Reset
    $('#contact-reset').on('click', function () {
        $('#contact-form')[0].reset();
        $('#contact-success').hide();
        $('#contact-form').show();
        $('#btn-text').show();
        $('#btn-loading').hide();
        $('#contact-submit').prop('disabled', false);
        $('#mensaje-counter').text('0/300');
        $('.contact__error').text('');
        $('.contact__input').removeClass('contact__input--error');
    });

    // ==================
    // NEWSLETTER FOOTER
    // ==================
    $('#newsletter-form').on('submit', function (e) {
        e.preventDefault();

        const nombre = $('#newsletter-nombre').val().trim();
        const email = $('#newsletter-email').val().trim();
        const nombreValido = /^[a-zA-ZÀ-ÿ\s]{3,40}$/.test(nombre);
        const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

        $('#newsletter-error-nombre').text(nombreValido ? '' : 'Nombre inválido');
        $('#newsletter-error-email').text(emailValido ? '' : 'Email inválido');
        $('#newsletter-nombre').toggleClass('footer__newsletter-input--error', !nombreValido);
        $('#newsletter-email').toggleClass('footer__newsletter-input--error', !emailValido);

        if (!nombreValido || !emailValido) return;

        $('#newsletter-btn-text').hide();
        $('#newsletter-btn-loading').show();
        $('#newsletter-btn').prop('disabled', true);

        setTimeout(function () {
            $('#newsletter-form').hide();
            $('#newsletter-success').show();
        }, 1200);
    });

    $('#newsletter-reset').on('click', function () {
        $('#newsletter-nombre, #newsletter-email').val('').removeClass('footer__newsletter-input--error');
        $('#newsletter-error-nombre, #newsletter-error-email').text('');
        $('#newsletter-btn-text').show();
        $('#newsletter-btn-loading').hide();
        $('#newsletter-btn').prop('disabled', false);
        $('#newsletter-success').hide();
        $('#newsletter-form').show();
    });


    const $html = $('html');

    // Cargar preferencia guardada
    if (localStorage.getItem('adipa-theme') === 'dark') {
        $html.addClass('dark');
    }

    $('#dark-mode-toggle').on('click', function () {
        $html.toggleClass('dark');
        const isDark = $html.hasClass('dark');
        localStorage.setItem('adipa-theme', isDark ? 'dark' : 'light');
    });

    $('#dark-mode-toggle').length


    // ==================
    // MOBILE MENU
    // ==================
    $('#mobile-menu-toggle').on('click', function () {
        const $menu = $('#mobile-menu');
        const $iconMenu = $('#icon-menu');
        const $iconClose = $('#icon-close');
        const isOpen = $menu.is(':visible');

        if (isOpen) {
            $menu.slideUp(200);
            $iconMenu.show();
            $iconClose.hide();
        } else {
            $menu.slideDown(200);
            $iconMenu.hide();
            $iconClose.show();
        }
    });

    // Cierra el menú al hacer click en un link
    $('.navbar__mobile-link').on('click', function () {
        $('#mobile-menu').slideUp(200);
        $('#icon-menu').show();
        $('#icon-close').hide();
    });

 
    $('#filters-mobile-btn').on('click', function () {
        $('#sidebar-drawer').addClass('sidebar-drawer--open');
        $('#sidebar-overlay').addClass('sidebar-overlay--open');
        $('body').css('overflow', 'hidden');
    });

    function closeSidebar() {
        $('#sidebar-drawer').removeClass('sidebar-drawer--open');
        $('#sidebar-overlay').removeClass('sidebar-overlay--open');
        $('body').css('overflow', '');
    }

    $('#sidebar-close, #sidebar-apply').on('click', closeSidebar);
    $('#sidebar-overlay').on('click', closeSidebar);



// ==================
// CARRITO
// ==================
let cart = JSON.parse(localStorage.getItem('adipa-cart') || '[]');

function saveCart() {
    localStorage.setItem('adipa-cart', JSON.stringify(cart));
}

function formatPrice(price) {
    return '$' + parseInt(price).toLocaleString('es-CL') + ' CLP';
}

function openCart() {
    $('#cart-drawer').addClass('cart-drawer--open');
    $('#cart-overlay').addClass('cart-overlay--open');
    $('body').css('overflow', 'hidden');
}

function closeCart() {
    $('#cart-drawer').removeClass('cart-drawer--open');
    $('#cart-overlay').removeClass('cart-overlay--open');
    $('body').css('overflow', '');
}

function renderCart() {
    const $body = $('#cart-body');
    const $footer = $('#cart-footer');
    const count = cart.length;

    // Actualiza contadores
    $('#cart-drawer-count').text(count);
    $('#cart-count').text(count);
    if (count > 0) {
        $('#cart-count').show();
    } else {
        $('#cart-count').hide();
    }

    // Renderiza items
    $body.empty();

    if (count === 0) {
        $footer.hide();
        $body.append(`
            <div class="cart-drawer__empty">
                <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <p>Tu carrito está vacío</p>
                <button id="cart-explore">Explorar cursos</button>
            </div>
        `);
    } else {
        $footer.show();

        cart.forEach(function(item) {
            $body.append(`
                <div class="cart-drawer__item" data-id="${item.id}">
                    <img src="${item.image}" alt="${item.title}" class="cart-drawer__item-img">
                    <div class="cart-drawer__item-info">
                        <p class="cart-drawer__item-title">${item.title}</p>
                        <p class="cart-drawer__item-instructor">${item.instructor}</p>
                        <div class="cart-drawer__item-prices">
                            <span class="cart-drawer__item-price">${formatPrice(item.price)}</span>
                            <span class="cart-drawer__item-original">${formatPrice(item.originalPrice)}</span>
                        </div>
                    </div>
                    <button class="cart-drawer__item-remove" data-id="${item.id}">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            `);
        });

        // Total
        const total = cart.reduce((acc, item) => acc + parseInt(item.price), 0);
        $('#cart-total').text(formatPrice(total));
    }

    // Actualiza estado botones en cards
    $('.btn-add-to-cart').each(function() {
        const cardId = $(this).closest('.course-card').data('id');
        const inCart = cart.some(i => i.id == cardId);
        if (inCart) {
            $(this).html('✓ Agregado').addClass('course-card__btn--added').prop('disabled', true);
        } else {
            $(this).html(`
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Carrito
            `).removeClass('course-card__btn--added').prop('disabled', false);
        }
    });
}

// Agregar al carrito
$(document).on('click', '.btn-add-to-cart', function() {
    const $card = $(this).closest('.course-card');
    const id = $card.data('id');

    if (cart.some(i => i.id == id)) return;

    const item = {
        id: id,
        title: $card.data('title'),
        instructor: $card.data('instructor'),
        image: $card.data('image'),
        price: $card.data('price'),
        originalPrice: $card.data('original-price'),
    };

    cart.push(item);
    saveCart();
    renderCart();
    openCart();
});

// Quitar item
$(document).on('click', '.cart-drawer__item-remove', function() {
    const id = $(this).data('id');
    cart = cart.filter(i => i.id != id);
    saveCart();
    renderCart();
});

// Vaciar carrito
$('#cart-clear').on('click', function() {
    cart = [];
    saveCart();
    renderCart();
});

// Abrir carrito desde el header
$('#cart-icon').on('click', function() {
    openCart();
});

// Cerrar
$('#cart-close, #cart-overlay').on('click', closeCart);
$(document).on('click', '#cart-explore', closeCart);

// Renderiza al cargar
renderCart();


});

