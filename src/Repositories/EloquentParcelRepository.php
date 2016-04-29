<?php
/**
 * Created by PhpStorm.
 * User: corneliu
 * Date: 29.04.2016
 * Time: 13:49
 */

namespace FastShip\Repositories;

use FastShip\Models\ParcelEloquentModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class EloquentParcelRepository implements ParcelRepository
{
    public function findByTrackingCode($code)
    {
        try {
            $parcel = ParcelEloquentModel::where('tracking_code', $code)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return null;
        }
        return $parcel;
    }
}