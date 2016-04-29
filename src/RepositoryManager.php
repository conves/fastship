<?php

/**
 * Created by PhpStorm.
 * User: corneliu
 * Date: 29.04.2016
 * Time: 16:21
 */
namespace FastShip;

use FastShip\Repositories\CsvParcelRepository;
use FastShip\Repositories\EloquentParcelRepository;

use Illuminate\Support\Manager;

class RepositoryManager extends Manager
{
    /**
     * Create an instance of the Csv repository
     *
     * @return \FastShip\Repositories\CsvParcelRepository
     */
    protected function createCsvRepositoryDriver()
    {
        return new CsvParcelRepository();
    }

    /**
     * Create an instance of the Eloquent repository
     *
     * @return \FastShip\Repositories\EloquentParcelRepository
     */
    protected function createEloquentRepositoryDriver()
    {
        return new EloquentParcelRepository();
    }

    /**
     * Get the default driver
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        if ($this->app['config']['storage.storage'] == 'csv') {
            return 'CsvRepository';
        }
        return 'EloquentRepository';
    }
}