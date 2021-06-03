<?php

namespace Bastinald\LaravelBootstrapComponents\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    protected $signature = 'install:bs';
    protected $filesystem, $fontAwesomeVersion, $fontAwesomeStyle;

    public function handle()
    {
        $this->filesystem = new Filesystem;

        $this->determineFontAwesomeVersion();
        $this->ensureResourceFilesExist();
        $this->appendResourceFileContents();
        $this->addNpmPackages();
        $this->appendWebpackFileMethods();
        $this->publishConfigFile();

        exec('npm install');
        exec('npm run dev');

        $this->info('Bootstrap installed!');
    }

    protected function determineFontAwesomeVersion()
    {
        $fontAwesomeVersion = $this->choice('Which version of Font Awesome?', [
            'Free',
            'Pro (requires global NPM token to be configured)',
        ]);

        if ($fontAwesomeVersion == 'Free') {
            $this->fontAwesomeVersion = 'free';
            $this->fontAwesomeStyle = 'solid';
        } else {
            $this->fontAwesomeVersion = 'pro';
            $this->fontAwesomeStyle = 'light';
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
            "window.bootstrap = require('bootstrap');",
        ]);

        $this->appendFileContent(resource_path('scss/app.scss'), [
            "@import 'variables';",
            "@import '~bootstrap/scss/bootstrap';",
            "@import '~@fortawesome/fontawesome-" . $this->fontAwesomeVersion . "/css/all.css';",
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
        $packages = [
            '@fortawesome/fontawesome-' . $this->fontAwesomeVersion => '^5.15.3',
            '@popperjs/core' => '^2.9.2',
            'bootstrap' => '^5.0.0-beta3',
            'resolve-url-loader' => '^3.1.3',
            'sass' => '1.32.13',
            'sass-loader' => '^11.1.1',
        ];

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
        $fontAwesomeStyle = config('laravel-bootstrap-components.font_awesome_style');

        if ($fontAwesomeStyle != $this->fontAwesomeStyle) {
            $file = __DIR__ . '/../../config/laravel-bootstrap-components.php';
            $contents = Str::replace(
                "'font_awesome_style' => '$fontAwesomeStyle'",
                "'font_awesome_style' => '$this->fontAwesomeStyle'",
                $this->filesystem->get($file)
            );

            $this->filesystem->put(config_path('laravel-bootstrap-components.php'), $contents);
        }
    }
}
