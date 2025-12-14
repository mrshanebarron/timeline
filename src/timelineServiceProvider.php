<?php

namespace MrShaneBarron\timeline;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\timeline\Livewire\timeline;
use MrShaneBarron\timeline\View\Components\timeline as Bladetimeline;
use Livewire\Livewire;

class timelineServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-timeline.php', 'ld-timeline');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-timeline');

        Livewire::component('ld-timeline', timeline::class);

        $this->loadViewComponentsAs('ld', [
            Bladetimeline::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-timeline.php' => config_path('ld-timeline.php'),
            ], 'ld-timeline-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-timeline'),
            ], 'ld-timeline-views');
        }
    }
}
