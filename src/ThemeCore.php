<?php

namespace Filafly\Themes\Core;

use Filament\Contracts\Plugin;
use Filament\Panel;

abstract class ThemeCore implements Plugin
{
    public bool $withSuggestedColors = true;

    public bool $withSuggestedFont = true;

    public bool $withSuggestedIcons = true;

    public string $identifier = 'core-theme';

    public function getId(): string
    {
        return $this->identifier;
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        if ($this->withSuggestedColors) {
            $this->colorConfiguration($panel);
        }

        if ($this->withSuggestedFont) {
            $this->fontConfiguration($panel);
        }

        if ($this->withSuggestedIcons) {
            $this->iconConfiguration($panel);
        }

        $this->registerTheme($panel);
    }

    protected function registerTheme(Panel $panel): void
    {
        // Child themes can override this method to add their own configuration
    }

    public function boot(Panel $panel): void
    {
        // This is called when the panel is in use
    }

    public function colorConfiguration(Panel $panel): void
    {
        // Color configuration
    }

    public function withoutSuggestedColors(): static
    {
        $this->withSuggestedColors = false;

        return $this;
    }

    public function fontConfiguration(Panel $panel): void
    {
        // Font configuration
    }

    public function withoutSuggestedFont(): static
    {
        $this->withSuggestedFont = false;

        return $this;
    }

    public function iconConfiguration(Panel $panel): void
    {
        // Icon configuration
    }

    public function withoutSuggestedIcons(): static
    {
        $this->withSuggestedIcons = false;

        return $this;
    }
}
