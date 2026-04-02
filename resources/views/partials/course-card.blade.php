@php
    $discount = round((($course['originalPrice'] - $course['discountPrice']) / $course['originalPrice']) * 100);
    $formattedDate = \Carbon\Carbon::parse($course['startDate'])->format('d/m/Y');
    $dotColor = match($course['modalidad']) {
        'En Vivo' => '#22c55e',
        'Online' => '#60a5fa',
        default => '#f97316'
    };
@endphp

<div class="course-card"
     data-category="{{ $course['categoria'] }}"
     data-modalidad="{{ $course['modalidad'] }}">

    <div class="course-card__image-wrapper">
        <img src="{{ $course['image'] }}" alt="{{ $course['title'] }}" class="course-card__image">

        <div class="course-card__badge-modalidad">
            <span class="course-card__dot" style="background: {{ $dotColor }}"></span>
            {{ $course['modalidad'] }}
        </div>

        <div class="course-card__rating">
            ★ 5.0
        </div>
    </div>

    <div class="course-card__body">
        <h3 class="course-card__title">{{ $course['title'] }}</h3>

        <p class="course-card__instructor">
            <svg width="12" height="12" fill="none" stroke="#6b46ff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            {{ $course['instructor'] }}
        </p>

        <div class="course-card__meta">
            <span class="course-card__date">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Inicio: {{ $formattedDate }}
            </span>
            <span class="course-card__status">• {{ $course['status'] }}</span>
        </div>

        <div class="course-card__footer">
            <div class="course-card__prices">
                <span class="course-card__price">
                    ${{ number_format($course['discountPrice'], 0, ',', '.') }} CLP
                </span>
                <span class="course-card__discount-badge">{{ $discount }}%</span>
                <span class="course-card__original-price">
                    ${{ number_format($course['originalPrice'], 0, ',', '.') }} CLP
                </span>
            </div>
            <button class="course-card__btn">Ver curso</button>
        </div>
    </div>
</div>