<?php

namespace WindsonDias\Toasts;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;

class ToastServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'notifications');

        $this->configureLivewire();
    }

    public function configureLivewire(): void
    {
        Component::macro('success', function ($message){
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => $message,
            ]);
        });

        Component::macro('error', function ($message){
            $this->dispatch('toast', [
                'type' => 'error',
                'message' => $message,
            ]);
        });

        Component::macro('information', function ($message){
            $this->dispatch('toast', [
                'type' => 'information',
                'message' => $message,
            ]);
        });

        Component::macro('warning', function ($message){
            $this->dispatch('toast', [
                'type' => 'warning',
                'message' => $message,
            ]);
        });
    }
}
