# Timeline

Vertical timeline component for displaying chronological events in Laravel applications. Supports alternating layouts, custom colors, and animations. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/timeline
```

## Livewire Usage

### Basic Usage

```blade
@php
$items = [
    [
        'date' => '2 hours ago',
        'title' => 'Order Delivered',
        'description' => 'Package was delivered to the front door.'
    ],
    [
        'date' => 'Yesterday',
        'title' => 'Out for Delivery',
        'description' => 'Package is on the delivery truck.'
    ],
    [
        'date' => 'Dec 10',
        'title' => 'In Transit',
        'description' => 'Package has left the facility.'
    ],
];
@endphp

<livewire:sb-timeline :items="$items" />
```

### Custom Colors

```blade
<livewire:sb-timeline
    :items="$items"
    dot-color="green"
    line-color="gray"
/>
```

### Alternating Layout

```blade
<livewire:sb-timeline :items="$items" :alternating="true" />
```

### Without Animation

```blade
<livewire:sb-timeline :items="$items" :animated="false" />
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `items` | array | `[]` | Array of timeline items |
| `variant` | string | `'default'` | Visual variant style |
| `alternating` | boolean | `false` | Alternate items left/right |
| `animated` | boolean | `true` | Enable scroll animations |
| `lineColor` | string | `'gray'` | Timeline line color |
| `dotColor` | string | `'blue'` | Timeline dot color |

### Item Structure

```php
$items = [
    [
        'date' => 'Dec 15, 2024',      // Date/time string
        'title' => 'Event Title',       // Required
        'description' => 'Details...',  // Optional
        'icon' => 'check',              // Optional icon name
    ],
];
```

## Vue 3 Usage

### Setup

```javascript
import { SbTimeline } from './vendor/sb-timeline';
app.component('SbTimeline', SbTimeline);
```

### Basic Usage

```vue
<template>
  <SbTimeline :items="items" />
</template>

<script setup>
const items = [
  { date: 'Today', title: 'Project Started', description: 'Kicked off the new project.' },
  { date: 'Last week', title: 'Planning Complete', description: 'Finalized the roadmap.' },
];
</script>
```

### With Options

```vue
<template>
  <SbTimeline
    :items="items"
    :alternating="true"
    dot-color="indigo"
    line-color="slate"
  />
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `items` | Array | `[]` | Timeline items |
| `variant` | String | `'default'` | Visual variant |
| `alternating` | Boolean | `false` | Alternate layout |
| `animated` | Boolean | `true` | Enable animations |
| `lineColor` | String | `'gray'` | Line color |
| `dotColor` | String | `'blue'` | Dot color |

## Use Cases

### Order Tracking

```php
$items = [
    ['date' => now()->diffForHumans(), 'title' => 'Delivered', 'icon' => 'check'],
    ['date' => '2 days ago', 'title' => 'Shipped', 'icon' => 'truck'],
    ['date' => '3 days ago', 'title' => 'Processing', 'icon' => 'cog'],
    ['date' => '4 days ago', 'title' => 'Order Placed', 'icon' => 'cart'],
];
```

### Activity Feed

```php
$items = User::latest()
    ->take(10)
    ->get()
    ->map(fn($user) => [
        'date' => $user->created_at->diffForHumans(),
        'title' => $user->name . ' joined',
        'description' => $user->email,
    ])
    ->toArray();
```

### Project Milestones

```php
$items = [
    ['date' => 'Q4 2024', 'title' => 'Launch', 'description' => 'Public release'],
    ['date' => 'Q3 2024', 'title' => 'Beta', 'description' => 'Beta testing phase'],
    ['date' => 'Q2 2024', 'title' => 'Alpha', 'description' => 'Internal testing'],
    ['date' => 'Q1 2024', 'title' => 'Development', 'description' => 'Building features'],
];
```

## Styling

The timeline includes:
- Vertical connecting line
- Colored dots for each event
- Optional fade-in animations on scroll
- Responsive design

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
