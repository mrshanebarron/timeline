<div @class(['relative', 'flex' => $orientation === 'horizontal'])>
    @if($orientation === 'vertical')
        <div class="absolute {{ $linePosition === 'left' ? 'left-4' : 'right-4' }} top-0 bottom-0 w-0.5 bg-gray-200"></div>
    @endif

    @foreach($items as $index => $item)
        <div @class(['relative pb-8 last:pb-0' => $orientation === 'vertical', 'flex-1 text-center' => $orientation === 'horizontal'])>
            <div @class([
                'absolute w-8 h-8 rounded-full flex items-center justify-center ring-4 ring-white',
                $linePosition === 'left' ? 'left-0' : 'right-0' => $orientation === 'vertical',
                'mx-auto' => $orientation === 'horizontal',
                $item['color'] ?? 'bg-blue-500',
            ])>
                @if(isset($item['icon']))
                    {!! $item['icon'] !!}
                @else
                    <span class="text-white text-xs font-bold">{{ $index + 1 }}</span>
                @endif
            </div>
            <div @class([
                $linePosition === 'left' ? 'ml-12' : 'mr-12' => $orientation === 'vertical',
                'mt-12' => $orientation === 'horizontal',
            ])>
                @if(isset($item['date']))
                    <time class="text-xs text-gray-500">{{ $item['date'] }}</time>
                @endif
                <h3 class="text-sm font-semibold text-gray-900">{{ $item['title'] }}</h3>
                @if(isset($item['description']))
                    <p class="mt-1 text-sm text-gray-600">{{ $item['description'] }}</p>
                @endif
            </div>
        </div>
    @endforeach
</div>
