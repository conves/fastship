<?php

namespace FastShip\Models;

use Illuminate\Database\Eloquent\Model;

class ParcelEloquentModel extends Model implements Parcel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parcel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tracking_code', 'delivery_date'];
}
