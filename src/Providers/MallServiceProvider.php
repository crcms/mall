<?php

namespace CrCms\Mall\Providers;

use CrCms\Foundation\App\Providers\ModuleServiceProvider;

/**
 * Class MallServiceProvider
 * @package CrCms\category\src\Providers
 */
class MallServiceProvider extends ModuleServiceProvider
{
    /**
     * @var string
     */
    protected $basePath = __DIR__ . '/../../';

    /**
     * @var string
     */
    protected $name = 'mall';

    /**
     *
     */
    public function boot(): void
    {
        parent::boot();

        $this->publishes([
            $this->basePath . 'config/config.php' => config_path("{$this->name}.php"),
            $this->basePath . 'resources/lang' => resource_path("lang/vendor/{$this->name}"),
        ]);
    }

    /**
     * @return void
     */
    protected function repositoryListener(): void
    {
    }
}