<?php

namespace Uchup07\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the provided services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the provided services.
     */
    public function register()
    {
        $generators = [
            'command.make.module'            => \Uchup07\Modules\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \Uchup07\Modules\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \Uchup07\Modules\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \Uchup07\Modules\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \Uchup07\Modules\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \Uchup07\Modules\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \Uchup07\Modules\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \Uchup07\Modules\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \Caffeinated\Modules\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \Caffeinated\Modules\Console\Generators\MakeTestCommand::class,
            'command.make.module.job'        => \Caffeinated\Modules\Console\Generators\MakeJobCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
