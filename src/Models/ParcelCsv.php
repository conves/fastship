<?php
/**
 * Created by PhpStorm.
 * User: corneliu
 * Date: 29.04.2016
 * Time: 14:47
 */

namespace FastShip\Models;


class ParcelCsv
{
    public $trackingCode;

    public $deliveryDate;

    /**
     * Convert the model instance to JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_merge(get_object_vars($this));
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}