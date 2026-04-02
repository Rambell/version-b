# ADIPA Landing - Version B (Laravel)

## Descripción
Landing page de catálogo de cursos ADIPA desarrollada con Laravel y Blade, replicando la versión construida en Next.js utilizando un stack tradicional.

Incluye:
- Layout con Blade
- Componentes reutilizables (partials)
- Grilla de cursos con data estática
- Filtro por categoría (client-side con jQuery)
- Formulario de contacto con validación
- Diseño responsive

---

## Repositorios
- Versión A (Next.js): https://github.com/Rambell/version-a.git
- Versión B (Laravel): https://github.com/Rambell/version-b.git

---

## Tecnologías
- Laravel 9+
- Blade (templating)
- Stylus (preprocesador CSS)
- jQuery (interactividad)
- Laravel Mix (build tool)

---

## Versiones utilizadas
- PHP: 8.2
- Composer: 2.x
- Node.js: v22.x

---

## Instalación
```bash
composer install
npm install
```

## Desarrollo
```bash
php artisan serve
npm run dev
```

## Build producción
```bash
npm run build

```


## Deploy



# Notas técnicas
- No se utiliza base de datos (data estática)
- Blade se utiliza para estructurar vistas y componentes reutilizables
- La interactividad (filtros y formulario) se implementa con jQuery
- Se mantuvo la cercania visual con la versión en Next.js

