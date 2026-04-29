<?php

namespace Local\StarterKit;

use Illuminate\Support\ServiceProvider;
use Local\StarterKit\Console\InstallCommand;

class StarterKitServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
