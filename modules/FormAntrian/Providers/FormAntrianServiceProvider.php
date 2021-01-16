<?php

namespace Modules\FormAntrian\Providers;

use Illuminate\Database\Eloquent\Factory;
use Laravolt\Support\Base\BaseServiceProvider;

class FormAntrianServiceProvider extends BaseServiceProvider
{
    public function getIdentifier()
    {
        return 'form-antrian';
    }

    public function register()
    {
        $file = $this->packagePath("config/{$this->getIdentifier()}.php");
        $this->mergeConfigFrom($file, "modules.{$this->getIdentifier()}");
        $this->publishes([$file => config_path("modules/{$this->getIdentifier()}.php")], 'config');

        $this->config = collect(config("modules.{$this->getIdentifier()}"));
    }

    protected function menu()
    {
        app('laravolt.menu.sidebar')->register(function ($menu) {
            $menu->modules
                ->add('Form Antrian', route('modules::form-antrian.index'))
                ->data('icon', 'file alternate outline')
                ->data('permission', $this->config['permission'] ?? [])
                ->active('modules/form-antrian/*');
        });
    }
}
