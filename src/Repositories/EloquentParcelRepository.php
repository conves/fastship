<?php
/**
 * Created by PhpStorm.
 * User: corneliu
 * Date: 29.04.2016
 * Time: 13:49
 */

namespace FastShip\Repositories;

use FastShip\Models\ParcelEloquentModel;


class EloquentParcelRepository implements ParcelRepository
{
    public function findByTrackingCode($code)
    {
        return ParcelEloquentModel::where('trackingCode', $code)->firstOrFail();
    }
}