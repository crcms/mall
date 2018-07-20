<?php

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Faker\Generator as Faker;
use function CrCms\Foundation\App\Helpers\module_factory;

/**
 * @return \Illuminate\Database\Eloquent\FactoryBuilder
 */
function mall_factory()
{
    $arguments = func_get_args();

    array_unshift($arguments, __DIR__ . '/../database/factories');

    return module_factory(...$arguments);
}