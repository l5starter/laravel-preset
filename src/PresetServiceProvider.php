<?php

namespace WiwatSrt\LaravelPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class PresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('bootstrap4', function ($command) {
            Preset::install() ;
            
            $command->info('All finished! Please compile your assets, and you are all set to go!');
        });
    }
}
