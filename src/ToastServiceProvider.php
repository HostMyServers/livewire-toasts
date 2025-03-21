<?php

namespace WindsonDias\Toasts;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use WindsonDias\Toasts\Enums\ToastTypeEnum;

class ToastServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'toasts');

        $this->configureLivewire();

        $this->configurePublishing();
    }

    public function configurePublishing(): void
    {
        if (!$this->app->runningInConsole())
            return;

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/toasts'),
        ], [
            'livewire-toasts'
        ]);
    }

    public function configureLivewire(): void
    {
        Component::macro('success', fn($message, $title = '', $delay = 5000) => $this->dispatch('toast', [
            'type' => ToastTypeEnum::SUCCESS,
            'message' => $message,
            'title' => $title,
            'delay' => $delay
        ]));

        Component::macro('error', fn($message, $title = '', $delay = 5000) => $this->dispatch('toast', [
            'type' => ToastTypeEnum::ERROR,
            'message' => $message,
            'title' => $title,
            'delay' => $delay
        ]));

        Component::macro('warning', fn($message, $title = '', $delay = 5000) => $this->dispatch('toast', [
            'type' => ToastTypeEnum::WARNING,
            'message' => $message,
            'title' => $title,
            'delay' => $delay
        ]));

        Component::macro('information', fn($message, $title = '', $delay = 5000) => $this->dispatch('toast', [
            'type' => ToastTypeEnum::INFORMATION,
            'message' => $message,
            'title' => $title,
            'delay' => $delay
        ]));
    }
}
