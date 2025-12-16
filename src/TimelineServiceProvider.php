<?php

namespace MrShaneBarron\Timeline;

use Illuminate\Support\ServiceProvider;

class TimelineServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-timeline.php', 'sb-timeline');
    }

    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-timeline', Livewire\Timeline::class);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-timeline');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sb-timeline.php' => config_path('sb-timeline.php'),
            ], 'sb-timeline-config');
        }
    }
}
