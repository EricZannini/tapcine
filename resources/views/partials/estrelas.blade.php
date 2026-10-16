{{-- Rating de estrelas — From Uiverse.io by amikambs (adaptado para exibir a nota do filme) --}}
@php $cheias = round(($nota ?? 0) / 2); @endphp
<span title="Nota {{ $nota }}" style="white-space: nowrap;">
    @for ($e = 1; $e <= 5; $e++)
        <svg viewBox="0 0 576 512" width="15" height="15"
            style="fill: {{ $e <= $cheias ? '#ffa723' : '#d5d9e8' }}; vertical-align: middle;">
            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
            </path>
        </svg>
    @endfor
    <small class="text-muted">{{ number_format($nota, 1, ',', '.') }}</small>
</span>
