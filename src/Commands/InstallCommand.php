<?php

namespace Bastinald\LaravelBootstrapComponents\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    protected $signature = 'install:bs';
    protected $filesystem;
    protected $iconScss = null;
    protected $iconJson = [];
    protected $iconConfig = null;

    public function handle()
    {
        $this->filesystem = new Filesystem;

        $this->determineIconLibrary();
        $this->ensureResourceFilesExist();
        $this->appendResourceFileContents();
        $this->addNpmPackages();
        $this->appendWebpackFileMethods();
        $this->publishConfigFile();

        exec('npm install');
        exec('npm run dev');

        $this->info('Bootstrap installed!');
    }

    protected function determineIconLibrary()
    {
        $iconLibrary = $this->choice('Which icon library do you use?', [
            'Bootstrap Icons',
            'Font Awesome Free',
            'Font Awesome Pro (requires global NPM token to be configured)',
            'None',
        ], 3);

        if ($iconLibrary == 'Bootstrap Icons') {
            $this->iconScss = "@import '~bootstrap-icons/font/bootstrap-icons.css';";
            $this->iconJson['bootstrap-icons'] = '^1.5.0';
            $this->iconConfig = 'bi bi-';
        } else if ($iconLibrary == 'Font Awesome Free') {
            $this->iconScss = "@import '~@fortawesome/fontawesome-free/css/all.css';";
            $this->iconJson['@fortawesome/fontawesome-free'] = '^5.15.3';
            $this->iconConfig = 'fas fa-fw fa-';
        } else if ($iconLibrary == 'Font Awesome Pro (requires global NPM token to be configured)') {
            $this->iconScss = "@import '~@fortawesome/fontawesome-pro/css/all.css';";
            $this->iconJson['@fortawesome/fontawesome-pro'] = '^5.15.3';
            $this->iconConfig = 'fal fa-fw fa-';
        }
    }

    protected function ensureResourceFilesExist()
    {
        foreach (['js/app.js', 'scss/_variables.scss', 'scss/app.scss'] as $fileName) {
            $filePath = resource_path($fileName);

            if (!$this->filesystem->exists($filePath)) {
                $this->filesystem->ensureDirectoryExists(dirname($filePath));
                $this->filesystem->put($filePath, '');
            }
        }
    }

    protected function appendResourceFileContents()
    {
        $this->appendFileContent(resource_path('js/app.js'), [
            "require('@popperjs/core');",
            "require('bootstrap');",
        ]);

        $this->appendFileContent(resource_path('scss/app.scss'), [
            "@import 'variables';",
            "@import '~bootstrap/scss/bootstrap';",
            $this->iconScss,
        ]);
    }

    protected function appendFileContent($file, $contents = [])
    {
        $contents = array_filter($contents);
        $fileContents = $this->filesystem->get($file);

        if ($fileContents && !Str::endsWith($fileContents, PHP_EOL)) {
            $fileContents .= PHP_EOL;
        }

        foreach ($contents as $content) {
            if (!Str::contains($fileContents, $content)) {
                $fileContents .= $content . PHP_EOL;
            }
        }

        $this->filesystem->put($file, $fileContents);
    }

    protected function addNpmPackages()
    {
        $packages = array_merge([
            '@popperjs/core' => '^2.9.2',
            'bootstrap' => '^5.0.0-beta3',
            'resolve-url-loader' => '^3.1.3',
            'sass' => '1.32.13',
            'sass-loader' => '^11.1.1',
        ], $this->iconJson);

        $file = base_path('package.json');
        $json = json_decode($this->filesystem->get($file), true);

        foreach ($packages as $package => $version) {
            if (!array_key_exists($package, $json['devDependencies'])) {
                $json['devDependencies'][$package] = $version;
            }
        }

        $this->filesystem->put($file, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    protected function appendWebpackFileMethods()
    {
        $file = base_path('webpack.mix.js');
        $contents = $this->filesystem->get($file);
        $methods = [
            ".sass('resources/scss/app.scss', 'public/css')",
            ".sourceMaps()",
        ];

        foreach ($methods as $method) {
            if (!Str::contains($contents, $method)) {
                $contents = Str::replaceLast(';', PHP_EOL . '    ' . $method . ';', $contents);
            }
        }

        $this->filesystem->put($file, $contents);
    }

    public function publishConfigFile()
    {
        $iconConfig = config('laravel-bootstrap-components.icon_class_prefix');

        if ($this->iconConfig && $this->iconConfig != $iconConfig) {
            $file = __DIR__ . '/../../config/laravel-bootstrap-components.php';
            $contents = Str::replace($iconConfig, $this->iconConfig, $this->filesystem->get($file));

            $this->filesystem->put(config_path('laravel-bootstrap-components.php'), $contents);
        }
    }
}
