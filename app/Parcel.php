<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
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
