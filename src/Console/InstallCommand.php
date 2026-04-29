<?php

namespace Local\StarterKit\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    protected $signature = 'starter-kit:install';
    protected $description = 'Install the professional starter kit with Livewire 4, Tailwind 4, and custom components.';

    public function handle(): void
    {
        $this->info('Initializing Starter Kit installation...');

        $this->installComposerDependencies();
        $this->installNodeDependencies();
        $this->publishStubs();

        $this->compileAssets();
        $this->runMigrations();

        $this->info('Starter Kit installed successfully.');
    }

    protected function installComposerDependencies(): void
    {
        $this->components->task('Installing Composer Dependencies (Livewire, Sluggable, etc.)', function () {
            $packages = [
                'livewire/livewire',
                'cviebrock/eloquent-sluggable',
                'gehrisandro/tailwind-merge-laravel',
                'intervention/image',
                'laravel/socialite',
            ];

            $process = new Process(array_merge(['composer', 'require'], $packages), base_path());
            $process->setTimeout(null)->mustRun();
        });
    }

    protected function installNodeDependencies(): void
    {
        $this->components->task('Updating package.json dependencies (TailwindCSS 4)', function () {
            if (! file_exists(base_path('package.json'))) {
                return;
            }

            $packages = json_decode(file_get_contents(base_path('package.json')), true);

            $packages['devDependencies'] = array_merge(
                $packages['devDependencies'] ?? [],
                [
                    'tailwindcss' => '^4.0',
                    '@tailwindcss/vite' => '^4.0',
                    '@fontsource-variable/inter' => '^5.0.0',
                ]
            );

            ksort($packages['devDependencies']);

            file_put_contents(
                base_path('package.json'),
                json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
            );
        });
    }

    protected function publishStubs(): void
    {
        $this->components->task('Publishing Stubs & Scaffolding', function () {
            File::ensureDirectoryExists(resource_path('css'));
            File::ensureDirectoryExists(resource_path('js'));
            File::ensureDirectoryExists(resource_path('views/components'));
            File::ensureDirectoryExists(resource_path('views/auth'));
            File::ensureDirectoryExists(resource_path('views/admin'));
            File::ensureDirectoryExists(resource_path('views/layouts'));
            File::ensureDirectoryExists(app_path('Livewire/Auth'));

            if (File::exists(__DIR__.'/../../stubs/css/app.css')) {
                File::copy(__DIR__.'/../../stubs/css/app.css', resource_path('css/app.css'));
            }
            if (File::exists(__DIR__.'/../../stubs/js/app.js')) {
                File::copy(__DIR__.'/../../stubs/js/app.js', resource_path('js/app.js'));
            }

            if (File::exists(__DIR__.'/../../stubs/components')) {
                File::copyDirectory(__DIR__.'/../../stubs/components', resource_path('views/components'));
            }
            if (File::exists(__DIR__.'/../../stubs/views/auth')) {
                File::copyDirectory(__DIR__.'/../../stubs/views/auth', resource_path('views/auth'));
            }
            if (File::exists(__DIR__.'/../../stubs/views/admin')) {
                File::copyDirectory(__DIR__.'/../../stubs/views/admin', resource_path('views/admin'));
            }
            if (File::exists(__DIR__.'/../../stubs/views/layouts')) {
                File::copyDirectory(__DIR__.'/../../stubs/views/layouts', resource_path('views/layouts'));
            }
            if (File::exists(__DIR__.'/../../stubs/views/home')) {
                File::copyDirectory(__DIR__.'/../../stubs/views/home', resource_path('views/home'));
            }
            if (File::exists(__DIR__.'/../../stubs/Livewire/Auth')) {
                File::copyDirectory(__DIR__.'/../../stubs/Livewire/Auth', app_path('Livewire/Auth'));
            }
            if (File::exists(__DIR__.'/../../stubs/Livewire/Home')) {
                File::copyDirectory(__DIR__.'/../../stubs/Livewire/Home', app_path('Livewire/Home'));
            }
            if (File::exists(__DIR__.'/../../stubs/Livewire/Admin')) {
                File::ensureDirectoryExists(app_path('Livewire/Admin'));
                File::copyDirectory(__DIR__.'/../../stubs/Livewire/Admin', app_path('Livewire/Admin'));
            }
            if (File::exists(__DIR__.'/../../stubs/Controllers/Auth')) {
                File::ensureDirectoryExists(app_path('Http/Controllers/Auth'));
                File::copyDirectory(__DIR__.'/../../stubs/Controllers/Auth', app_path('Http/Controllers/Auth'));
            }
            if (File::exists(__DIR__.'/../../stubs/Models')) {
                File::copyDirectory(__DIR__.'/../../stubs/Models', app_path('Models'));
            }
            if (File::exists(__DIR__.'/../../stubs/database/migrations')) {
                File::copyDirectory(__DIR__.'/../../stubs/database/migrations', database_path('migrations'));
            }
            if (File::exists(__DIR__.'/../../stubs/public/static')) {
                File::ensureDirectoryExists(public_path('static'));
                File::copyDirectory(__DIR__.'/../../stubs/public/static', public_path('static'));
            }
            if (File::exists(__DIR__.'/../../stubs/config')) {
                File::copyDirectory(__DIR__.'/../../stubs/config', base_path('config'));
            }
            if (File::exists(__DIR__.'/../../stubs/tests')) {
                File::copyDirectory(__DIR__.'/../../stubs/tests', base_path('tests'));
            }
            if (File::exists(__DIR__.'/../../stubs/github')) {
                File::copyDirectory(__DIR__.'/../../stubs/github', base_path('.github'));
            }
            if (File::exists(__DIR__.'/../../stubs/pint.json')) {
                File::copy(__DIR__.'/../../stubs/pint.json', base_path('pint.json'));
            }
            if (File::exists(__DIR__.'/../../stubs/vite.config.js')) {
                File::copy(__DIR__.'/../../stubs/vite.config.js', base_path('vite.config.js'));
            }
            
            // Append routes
            if (File::exists(__DIR__.'/../../stubs/routes.php')) {
                $routes = File::get(__DIR__.'/../../stubs/routes.php');
                $routes = str_replace('<?php', '', $routes);
                
                $currentRoutes = File::get(base_path('routes/web.php'));
                if (!str_contains($currentRoutes, 'App\Livewire\Auth\Login')) {
                    File::append(base_path('routes/web.php'), $routes);
                }

                // Replace default root route with our Livewire homepage
                $currentRoutes = File::get(base_path('routes/web.php'));
                $currentRoutes = preg_replace(
                    '/Route::get\(\s*\'\/\'\s*,\s*function\s*\(\)\s*\{[^}]*\}\);/s',
                    "Route::get('/', \App\Livewire\Home\Index::class)->name('home');",
                    $currentRoutes
                );
                File::put(base_path('routes/web.php'), $currentRoutes);
            }
        });
    }

    protected function compileAssets(): void
    {
        $this->components->task('Compiling frontend assets (npm install && npm run build)', function () {
            // Depending on OS, the command might need to be run via shell
            $process = Process::fromShellCommandline('npm install && npm run build', base_path());
            $process->setTimeout(null)->mustRun();
        });
    }

    protected function runMigrations(): void
    {
        $this->components->task('Running database migrations', function () {
            $this->callSilent('migrate', ['--force' => true]);
        });
    }
}
