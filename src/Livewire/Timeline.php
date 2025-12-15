<?php

namespace MrShaneBarron\Timeline\Livewire;

use Livewire\Component;

class Timeline extends Component
{
    public array $items = [];
    public string $variant = 'default';
    public bool $alternating = false;
    public bool $animated = true;
    public string $lineColor = 'gray';
    public string $dotColor = 'blue';

    public function mount(
        array $items = [],
        string $variant = 'default',
        bool $alternating = false,
        bool $animated = true,
        string $lineColor = 'gray',
        string $dotColor = 'blue'
    ): void {
        $this->items = $items;
        $this->variant = $variant;
        $this->alternating = $alternating;
        $this->animated = $animated;
        $this->lineColor = $lineColor;
        $this->dotColor = $dotColor;
    }

    public function render()
    {
        return view('sb-timeline::livewire.timeline');
    }
}
