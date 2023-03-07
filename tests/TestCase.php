<?php

namespace Micromus\ServiceSwagger\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Micromus\ServiceSwagger\ServiceSwaggerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Micromus\\ServiceSwagger\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            ServiceSwaggerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-service-swagger_table.php.stub';
        $migration->up();
        */
    }
}
