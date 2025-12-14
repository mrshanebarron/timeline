<?php

namespace MrShaneBarron\Timeline\Livewire;

use Livewire\Component;

class Timeline extends Component
{
    public array $items = [];
    public string $orientation = 'vertical';
    public string $linePosition = 'left';

    public function mount(
        array $items = [],
        string $orientation = 'vertical',
        string $linePosition = 'left'
    ): void {
        $this->items = $items;
        $this->orientation = $orientation;
        $this->linePosition = $linePosition;
    }

    public function render()
    {
        return view('ld-timeline::livewire.timeline');
    }
}
