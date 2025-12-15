<div class="relative">
    <div class="absolute left-4 top-0 bottom-0 w-0.5 {{ config('sb-timeline.colors.line.' . $lineColor, 'border-gray-200') }} bg-current"></div>
    
    <div class="space-y-8">
        @foreach($items as $index => $item)
        <div class="relative {{ config('sb-timeline.variants.' . $variant, 'pl-8') }} @if($animated) animate-fade-in @endif" 
             @if($animated) style="animation-delay: {{ $index * 100 }}ms" @endif>
            {{-- Dot --}}
            <div class="absolute left-2.5 w-3 h-3 rounded-full {{ config('sb-timeline.colors.dot.' . $dotColor, 'bg-blue-500') }} ring-4 ring-white"></div>
            
            {{-- Content --}}
            <div class="@if($alternating && $index % 2 === 1) ml-auto mr-8 text-right @endif">
                @if(isset($item['date']))
                <time class="text-sm text-gray-500 font-medium">{{ $item['date'] }}</time>
                @endif
                
                @if(isset($item['title']))
                <h3 class="text-lg font-semibold text-gray-900 mt-1">{{ $item['title'] }}</h3>
                @endif
                
                @if(isset($item['description']))
                <p class="text-gray-600 mt-2">{{ $item['description'] }}</p>
                @endif
                
                @if(isset($item['icon']))
                <div class="absolute left-1.5 w-5 h-5 text-white flex items-center justify-center">
                    {!! $item['icon'] !!}
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

@if($animated)
<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.5s ease-out forwards;
        opacity: 0;
    }
</style>
@endif
