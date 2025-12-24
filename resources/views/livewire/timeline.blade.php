@php
$lineColors = [
    'gray' => '#e5e7eb',
    'blue' => '#3b82f6',
    'green' => '#22c55e',
    'red' => '#ef4444',
];
$dotColors = [
    'blue' => '#3b82f6',
    'green' => '#22c55e',
    'red' => '#ef4444',
    'gray' => '#9ca3af',
];
$lineCol = $lineColors[$this->lineColor] ?? $lineColors['gray'];
$dotCol = $dotColors[$this->dotColor] ?? $dotColors['blue'];
@endphp

<div style="position: relative;">
    @if($this->animated)
    <style scoped>
        .sb-timeline-animated { animation: sbTimelineFadeIn 0.5s ease-out forwards; opacity: 0; }
        @keyframes sbTimelineFadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    @endif

    <div style="position: absolute; left: 16px; top: 0; bottom: 0; width: 2px; background: {{ $lineCol }};"></div>

    <div style="display: flex; flex-direction: column; gap: 32px;">
        @foreach($this->items as $index => $item)
        <div style="position: relative; padding-left: 40px; {{ $this->animated ? 'animation: fadeIn 0.5s ease-out forwards; opacity: 0; animation-delay: ' . ($index * 100) . 'ms;' : '' }}">
            {{-- Dot --}}
            <div style="position: absolute; left: 10px; width: 12px; height: 12px; border-radius: 50%; background: {{ $dotCol }}; box-shadow: 0 0 0 4px white;"></div>

            {{-- Content --}}
            <div style="{{ $this->alternating && $index % 2 === 1 ? 'margin-left: auto; margin-right: 32px; text-align: right;' : '' }}">
                @if(isset($item['date']))
                <time style="font-size: 14px; color: #6b7280; font-weight: 500;">{{ $item['date'] }}</time>
                @endif

                @if(isset($item['title']))
                <h3 style="font-size: 18px; font-weight: 600; color: #111827; margin-top: 4px;">{{ $item['title'] }}</h3>
                @endif

                @if(isset($item['description']))
                <p style="color: #4b5563; margin-top: 8px;">{{ $item['description'] }}</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
