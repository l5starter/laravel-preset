<?php

namespace WiwatSrt\LaravelPreset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;

class Preset extends LaravelPreset
{
    public static function install()
    {
        static::updatePackages();
        static::updateScripts();
        static::updateStyles();
    }

    public static function updatePackageArray($packages)
    {
        return array_merge([
            'bootstrap' => '^4.0.0',
            'popper.js' => '^1.12'
        ], Arr::except($packages, ['bootstrap-sass']));
    }

    public static function updateScripts()
    {
        copy(__DIR__.'/stubs/js/app.js', resource_path('assets/js/app.js'));
        copy(__DIR__.'/stubs/js/bootstrap.js', resource_path('assets/js/bootstrap.js'));
    }

    public static function updateStyles()
    {
        File::cleanDirectory(resource_path('assets/sass'));

        copy(__DIR__.'/stubs/sass/app.scss', resource_path('assets/sass/app.scss'));
        copy(__DIR__.'/stubs/sass/_variables.scss', resource_path('assets/sass/_variables.scss'));
    }
}
