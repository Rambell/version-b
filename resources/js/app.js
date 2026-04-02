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

    function updateChips() {
        const $chips = $('#filter-chips');
        $chips.empty();

        const allActive = [...activeCategories, ...activeModalidades];

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

            const categoryMatch = activeCategories.length === 0 || activeCategories.includes(cardCategory);
            const modalidadMatch = activeModalidades.length === 0 || activeModalidades.includes(cardModalidad);

            if (categoryMatch && modalidadMatch) {
                $(this).show();
                visible++;
            } else {
                $(this).hide();
            }
        });

        if (visible === 0) {
            $('#empty-state').show();
            $('#course-grid').css('min-height', '0');
        } else {
            $('#empty-state').hide();
            $('#course-grid').css('min-height', '400px');
        }
    }

    // Checkbox categoria
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

    // Remover chip individual
    $(document).on('click', '.filter-chip__remove', function () {
        const filter = $(this).data('filter');
        activeCategories = activeCategories.filter(c => c !== filter);
        activeModalidades = activeModalidades.filter(m => m !== filter);
        $(`.filter-checkbox[data-category="${filter}"]`).prop('checked', false);
        $(`.filter-modalidad[data-modalidad="${filter}"]`).prop('checked', false);
        updateChips();
        filterCourses();
    });

    // Limpiar todos los filtros
    $(document).on('click', '#clear-filters, #clear-all-chips', function () {
        activeCategories = [];
        activeModalidades = [];
        $('.sidebar__checkbox').prop('checked', false);
        updateChips();
        filterCourses();
    });

    // Ordenar
    $('#sort-select').on('change', function () {
        const val = $(this).val();
        const $grid = $('#course-grid');
        const $cards = $grid.find('.course-card').toArray();

        $cards.sort(function (a, b) {
            const priceA = parseInt($(a).find('.course-card__price').text().replace(/\D/g, ''));
            const priceB = parseInt($(b).find('.course-card__price').text().replace(/\D/g, ''));
            if (val === 'price-asc') return priceA - priceB;
            if (val === 'price-desc') return priceB - priceA;
            return 0;
        });

        $cards.forEach(card => $grid.append(card));
    });

    // Acordeón sidebar
    $('.sidebar__group-header').on('click', function () {
        const $group = $(this).closest('.sidebar__group');
        const $options = $group.find('.sidebar__options');
        const $chevron = $(this).find('.sidebar__chevron');
        const isOpen = $options.is(':visible');

        // Cierra todos
        $('.sidebar__options').slideUp(200);
        $('.sidebar__chevron').css('transform', 'rotate(0deg)');

        // Abre el clickeado si estaba cerrado
        if (!isOpen) {
            $options.slideDown(200);
            $chevron.css('transform', 'rotate(180deg)');
        }
    });

    // Abre el primero por defecto
    $('.sidebar__group:first .sidebar__options').show();
    $('.sidebar__group:first .sidebar__chevron').css('transform', 'rotate(180deg)');

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

});